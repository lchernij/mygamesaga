# My Game Saga

## Resume

## Requirements

This installation is based in Ubuntu 22 OS.

### General

#### PHP 8.1 and dependencies

- `sudo apt install php8.1-cli php8.1-curl php8.1-xml php-xdebug`

#### Composer 2

- `sudo apt install composer`

#### Generate Application Key

- `php artisan key:generate`

### PHP unit with coverage

It's needed to enable `xdebug.mode=coverage` in the `php.ini` file.

One way to find where is the php.ini is stored is using the command `php --ini`

If you follow all this instalation guide on Ubuntu 22, the correct place is `/etc/php/8.1/cli/php.ini`

### Postgresql 

To install version 14, just run this command: 

- `sudo apt install postgresql`

I Recommend to set a password to user `postgres` using this commands:

- `sudo -u postgres psql`
- `\password postgres`
- `\q`

To start postgresql, use this command:

- `sudo service postgresql start`

### Redis

To install version 6, just run this command: 

- `sudo apt install redis`

To start redis-server, use this command:

- `sudo service redis-server start`