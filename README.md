# E-Diaristas

Sistema administrativo de serviços para diaristas, preparado para portfolio.

## Visão geral

- Painel administrativo com autenticação.
- Cadastro e edição de usuários.
- Cadastro e edição de serviços com valores e tempos.
- Configurado para funcionar com SQLite localmente.

## Tech stack

- Laravel 9
- PHP 8
- Bootstrap 5
- Vite
- SQLite

## Instalação

1. Clone o repositório:

```bash
git clone https://github.com/GuilhermeCamargoL/e-diaristas.git
cd e-diaristas
```

2. Instale dependências PHP:

```bash
composer install
```

3. Instale dependências front-end:

```bash
npm install
```

4. Copie o arquivo de ambiente:

```bash
copy .env.example .env
```

5. Crie o arquivo SQLite:

```bash
type nul > database\database.sqlite
```

6. Gere a chave de aplicativo:

```bash
php artisan key:generate
```

7. Execute migrações e seeders:

```bash
php artisan migrate --seed
```

8. Execute o servidor:

```bash
php artisan serve
npm run dev
```

## Configuração SQLite

O projeto usa SQLite por padrão para facilitar o uso em portfólio.

No arquivo `.env`, certifique-se de ter:

```dotenv
DB_CONNECTION=sqlite
DB_DATABASE=database/database.sqlite
```

## Login padrão

- Email: `admin@admin.com`
- Senha: `123123`

## Observações

- O arquivo `database/database.sqlite` já está configurado para uso local.
- Não é necessário configurar MySQL para desenvolvimento.
