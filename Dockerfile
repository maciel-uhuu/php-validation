# ====== Backend ======
FROM webdevops/php-nginx:8.1
ENV WEB_DOCUMENT_ROOT=/app/public
WORKDIR /app

# Copiando o projeto com o usuário e grupo
# usados para a execução da aplicação
COPY --chown=application:application --from=front-build /app /app

# Instalando as dependências do laravel
RUN composer install

EXPOSE 80
