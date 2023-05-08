Instalação do projeto com 
    composer create-project laravel/laravel example-app

Criar e configurar arquivo .env

Criando estrutura do bando de dados;
    php artisan migrate

Criação do controle de usuario com a LIB:

    composer require laravel/ui
    php artisan ui vue --auth
    npm install && npm run build
    
Biblioteca de verificação reCaptcha --Prevenção de SPAM
    composer require anhskohbo/no-captcha

adicionar no .env
    NOCAPTCHA_SITEKEY=6LfKauklAAAAAIZc4JbDssbnpfY8jL9RfCmFyCdZ
    NOCAPTCHA_SECRET=6LfKauklAAAAAImbCBRoBOMGK1Maim5Co-aZDI90

as seguintes keys estão liberadas pros dominios 
http://localhost e http://usercontrol

Componentes da Yajra datatables
    npm i laravel-datatables-vite --save-dev
    composer require yajra/laravel-datatables

Bibliotecas para exportação de dados
    composer require maatwebsite/excel
    composer require barryvdh/laravel-snappy
