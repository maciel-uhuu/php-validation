# PHP Validation - Uhuu
sistema de gerenciamento de clientes

## Tecnologias 
- PHP
- Laravel
- MySQL
- Docker
- Typescript
- React
- JWT

## Funcionalidades
- Autenticação
- Criar/Listar/Deletar/Editar Usuários 
- Filtrar usuários
- Paginação e ordenação
- Desativação de usuários

## Front end - Login
![uhuu](https://github.com/maciel-uhuu/php-validation/assets/60657968/24b79372-71e6-44e1-b340-ddbeb348bced)

## Inicialização - Frontend
- Acesse a pasta 'frontend' e instale as dependências
```bash
yarn 
```

- Crie o arquivo .env
<p>
  O projeto tem um arquivo .env.example com as variaveis necesssárias para o projeto funcionar. Porém o RECAPTCHA funcionar é necessário criar 
 sua chave <a href="https://www.google.com/recaptcha/admin/create">aqui</a>.
 
Aqui está um <a href="https://blog.logrocket.com/implement-recaptcha-react-application/">exemplo</a>.
</p>

- Inicie o projeto
```bash
yarn dev
```

## Inicialização - Backend
- Rode o docker compose
```bash
docker-compose up -d
```

- Aguarde o banco de dados inicializar completamente e rode as migrations
```bash
docker exec uhuu php artisan migrate
```



