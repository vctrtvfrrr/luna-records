#!/usr/bin/env sh

NGINX="/usr/sbin/nginx"
CONFPATH="/etc/nginx"
CERTPATH="./config/certificates/default"

fail_if_error() {
	[ $1 != 0 ] && {
		unset PASSPHRASE
		exit 10
	}
}

generate_auto_signed_certificate() {
	mkdir -p $(dirname $CERTPATH)

	# Generate a passphrase
	export PASSPHRASE=$(
		head -c 500 /dev/urandom | tr -dc a-z0-9A-Z | head -c 128
		echo
	)

	# Gera a chave privada do servidor
	openssl genrsa -des3 -out $CERTPATH.key -passout env:PASSPHRASE 2048
	fail_if_error $?

	# Gera o CSR
	openssl req \
		-new \
		-batch \
		-subj "/CN=localhost" \
		-key $CERTPATH.key \
		-out $CERTPATH.csr \
		-passin env:PASSPHRASE
	fail_if_error $?

	cp $CERTPATH.key $CERTPATH.key.org
	fail_if_error $?

	# Remove a senha, assim não precisamos digitá-la novamente o tempo todo
	openssl rsa \
		-in $CERTPATH.key.org \
		-out $CERTPATH.key \
		-passin env:PASSPHRASE
	fail_if_error $?

	# Gera um novo certificado válido por 10 anos
	openssl x509 \
		-req \
		-days 3650 \
		-in $CERTPATH.csr \
		-signkey $CERTPATH.key \
		-out $CERTPATH.crt
	fail_if_error $?
}

generate_config_files() {
	eval "$(shdotenv --dialect php)"

	for template in $(find src -type f); do
		dest=$(echo $template | sed -e "s|^src/|config/|g")
		mkdir -p $(dirname "${dest}")
		envsubst "$(printf '${%s} ' $(env | cut -d'=' -f1))" < $template > $dest
	done

	chown -R $(stat -c "%u:%g" ./src) ./config

	rsync -av "./config/" "${CONFPATH}/"
	$NGINX -t
}

if [ $# -gt 0 ]; then
	exec "$@"
else

	if [[ ! -f "$CERTPATH.crt" || ! -f "$CERTPATH.key" ]]; then
		generate_auto_signed_certificate
	fi

	generate_config_files

	$NGINX -g "daemon off;"
fi
