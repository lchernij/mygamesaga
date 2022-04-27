# My Game Saga

## Resume

## Requirements

This installation is based in Ubuntu 22 OS.

### General

#### PHP 8.1 and dependencies

- `sudo apt install php8.1-cli php8.1-curl php8.1-xml`

#### Composer 2

- `sudo apt install composer`

#### Generate Application Key

- `php artisan key:generate`

### Postgresql 

To install version 14, just run this command: 

- `sudo apt instal postgresql`

I Recommend to set a password to user `postgres` using this commands:

- `sudo -u postgres psql`
- `\password postgres`
- `\q`

To start postgresql, use this command:

- `sudo service postgresql start`