# Plataforma para gerenciamento de Clientes

## Como rodar o projeto

```
# Clone o repositório
$ git clone git@github.com:thalesmengue/olivas.git

# Instale as dependências
$ composer install
$ npm install

# Copie o arquivo .env
$ cp .env.example .env

# Configure as credências do banco de dados no arquivo .env, bem como
as credências de envio de e-mail e configuração da fila.

# Gere a chave da aplicação
$ php artisan key:generate

# Execute as migrations
$ php artisan migrate

# Rode a aplicação
$ php artisan serve
$ npm run dev

# Execute o servidor de fila
$ php artisan queue:work
```

## Como usar a API

A API foi desenvolvida utilizando o Laravel Sanctum para autenticação via token. Assim, ao passar um usuário logado
para a rota de login da API, será retornado um token que autenticará o usuário e possibilitará acessar as rotas de busca.

Request esperado
```json
{
    "email": "admin@admin.com",
    "senha": "123456"
}
```

Response esperada
```json
{
    "user": {
        "id": 1,
        "name": "Admin",
        "email": "admin@admin.com",
        "email_verified_at": null,
        "created_at": "2023-05-05T04:56:15.000000Z",
        "updated_at": "2023-05-05T04:56:15.000000Z"
    },
    "token": "1|yTsgJmDAHi9valbz8kdGHWGp2YPr4vEpacxb96m2"
}
```

### Rotas API

| Método HTTP | Endpoint          | Descrição                                                          |
|-------------|-------------------|--------------------------------------------------------------------|
| POST        | `/api/login`      | Concede ao usuário registrado o token para acessar as demais rotas |
| GET         | `/clients/`       | Retorna os clientes do usuário autenticado                         |
| GET         | `/clients/{name}` | Retorna os clientes com busca por nome pela URL                    |

## Tecnologias
- [PHP 8.1](https://www.php.net/)
- [Laravel 10](https://laravel.com/)
- [Livewire](https://laravel-livewire.com/)
- [TailwindCSS](https://tailwindcss.com/)
