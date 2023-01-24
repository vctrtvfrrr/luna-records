FROM nginx:alpine
RUN apk add --no-cache openssl curl rsync && \
    curl -fsSL -o /usr/local/bin/shdotenv https://github.com/ko1nksm/shdotenv/releases/latest/download/shdotenv && \
    chmod +x /usr/local/bin/shdotenv
WORKDIR /app
COPY . .
RUN sed -i 's/\r//g' ./start-container.sh && chmod +x ./start-container.sh
EXPOSE 80 443
ENTRYPOINT ["./start-container.sh"]
