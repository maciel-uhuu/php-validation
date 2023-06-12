# Instale as dependências
`composer install`<br />
# Configurando o .env
Copie o .env.example e renomeie para .env, depois rode o comando `php artisan key:generate`

Configure a consulta com o banco de dados no .env

### Para uso no docker
```
DB_CONNECTION=mysql
DB_HOST=database
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=admin
DB_PASSWORD=admin@123456
```
### Para uso local, adapte as conexões a sua instalação do MySQL ou Mariadb.
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```
# Rodando com docker
Execute o comando <br />
`docker compose up -d` <br />
depois rode as migrations<br />
`docker exec app php artisan migrate --force` <br />
`docker exec app php artisan db:seed --force` <br />
OBS: --force é para rodar mesmo se env tiver para produção

Depois acesse a url **http://localhost** e pronto você já tem acesso ao sistema

# Rodando local
Execute as migrations `php artisan migrate`<br />
Execute as seeders `php artisan db:seed`<br />
Depois  rode o serve em Laravel `php artisan serve` <br />


# Acesso com o usuário da admin gerado na seed
email `admin@admin.com` <br />
senha `admin123456`
