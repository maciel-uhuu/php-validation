# php-validation

Teste Técnico

## Como executar o sistema

Copie o arquivo `.env.example` e cole como `.env`. É necessário preencher os campos:

```
RECAPTCHA_SITE_KEY=
RECAPTCHA_SECRET_KEY=
```

Para conseguir as chaves basta abrir o site: https://www.google.com/recaptcha/admin/create

Basta usar o seguinte comando no terminal:

```
./vendor/bin/sail up
```

Isso faz com que a aplicação Laravel execute num container.

Para executar as migrations basta entrar dentro do container onde se encontra o Laravel e executar:

```
php artisan migrate
```

Caso queira popular o banco rapidamente execute:

```
php artisan db:seed
```

Rode esse comando fora do container para instalar dependências:

```
npm i
```

Para renderizar as Views rode sempre esse comando ao iniciar o projeto:

```
npm run dev
```

Para usar a tabela com ordenação a aplicação tem esse pacote:
https://github.com/s-damian/larasort

# Teste para à vaga de Desenvolvedor Full Stack

Olá caro desenvolvedor, nesse teste analisaremos seu conhecimento geral e inclusive velocidade de desenvolvimento.

## Instruções

O desafio consiste em implementar uma aplicação web utilizando o framework PHP Laravel, um banco de dados relacional (Mysql ou Postgres), que terá como finalidade o cadastro de clientes em nossa base de dados.

Sua aplicação deve possuir:

- CRUD de clientes:
  - Criar, editar, excluir e listar cadastros.
- Um cliente pode se cadastrar apenas uma vez e com verificação de recaptcha no momento do cadastro.
- Deve ser ser possível "ativar" e "desativar" o cliente, evitando assim no caso de ¨desativar¨ o mesmo que ele não consiga logar na aplicação.
- Cada CRUD:
  - Deve ser filtrável e ordenável por qualquer campo, e possuir paginação de 20 itens.
  - Deve possuir formulários para criação e atualização de seus cadastros.
  - Deve permitir a deleção de qualquer cliente.
  - Implementar validações de campos obrigatórios e tipos de dados.

## Banco de dados

- O banco de dados deve ser criado ou editado utilizando Migrations do framework Laravel.

## Tecnologias a serem utilizadas

Devem ser utilizadas as seguintes tecnologias:

- HTML
- CSS
- Javascript
- Framework Laravel (PHP)
- Docker (construção do ambiente de desenvolvimento)
- Mysql ou Postgres

## Entrega

- Para iniciar o teste, faça um fork deste repositório; **Se você apenas clonar o repositório não vai conseguir fazer push.**
- Crie uma branch com o seu nome completo;
- Altere o arquivo README.md com as informações necessárias para executar o seu teste (comandos, migrations, seeds, etc);
- Depois de finalizado, envie-nos o pull request;

## Bônus

- API Rest JSON para todos os CRUDS listados acima.
- Permitir deleção em massa de itens nos CRUDs.
- Permitir que o usuário mude o número de itens por página.
- Implementar autenticação de usuário na aplicação.
- Testes unitários

## O que iremos analisar

- Organização do código;
- Aplicação de design patterns;
- Aplicação de testes;
- Separação de módulos e componentes;
- Legibilidade;
- Criação do ambiente com Docker.

### Boa sorte!
