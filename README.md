# Luna Records

Loja de Discos.

## Pré-requisitos

- [Docker](https://docs.docker.com/engine/install/ubuntu/) 20.10 ou superior
- [docker-compose](https://docs.docker.com/compose/install/) 2.15 ou superior

## Instalação

Faça o clone do repositório no seu ambiente onde o projeto será executado.

```bash
git clone git@github.com:vctrtvfrrr/luna-records.git
cd luna-records
```

Agora, precisamos definir as variáveis de ambiente e configurações de cada serviço que será executado.

### docker compose

Vamos começar pelas variáveis do docker compose:

```bash
# Diretório 'root'
cp .env.example .env # Duplique o arquivo de exemplo
vim .env # Abra o arquivo para edição
```

Aqui podemos definir o ambiente em que o projeto será executado. Altere a variável `SERVER_ENV` para `production`, caso queira executar o projeto em modo de produção.

### API

Para definir as variáveis de ambiente da API, navegue até o diretório `api`, duplique o arquivo de exemplo e abra-o para edição:

```bash
# Diretório 'api'
cd api
cp .env.example .env
vim .env
```

Neste arquivo você deverá configurar muitos dados para o ambiente de desenvolvimento, mas recomendo manter tudo como está e seguir com as variáveis padrão.
Para o ambiente de produção, altere a variável `APP_ENV` para `production` e `APP_DEBUG` para `false`.

### WEB

Para definir as variáveis de ambiente da interface WEB, navegue até a pasta `web`, na raiz do projeto, duplique o arquivo de exemplo e abra-o para edição:

```bash
# Diretório 'web'
cd web
cp .env.example .env
vim .env
```

Neste arquivo você deverá configurar as URLs de acesso à API. É recomendado manter os valores existentes, tanto em ambiente local como em produção.

### NGINX

Da mesma forma que nos serviços anteriores, no NGINX precisamos definir as variáveis de ambiente:

```bash
# Diretório 'nginx'
cd nginx
cp .env.example .env
```

Neste arquivo também é recomendado manter os valores existentes, alterando apenas a variável `INTERCEPT_ERRORS` para o valor `on`, em ambiente de produção.

## Executando

O projeto utiliza o `docker-compose` como orquestrador dos containers Docker.

Para executar o projeto pela primeira vez, precisamos iniciar o banco de dados antes dos demais serviços (o primeiro start é um pouco mais demorado). Para isso vamos execurar:

```bash
docker compose up -d mariadb
```

Em seguida, podemos simplesmente fazer o start de todos os demais serviços:

```bash
docker-compose up -d
```

Se todas as variáveis de ambiente tiverem sido configuradas corretamente e não ocorrer nenhum problema durante o processo de montagem das imagens, ao final do processo o projeto estará disponível através da seguinte URL: https://localhost.

## Licença

_Luna Records_ é uma loja fictícia e um projetode portfólio. Seu código-fonte é aberto e licenciado sob os termos da MIT. Para saber mais leia a [licença](LICENSE).
