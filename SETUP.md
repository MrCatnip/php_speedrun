# Setup Guide

End-to-end configuration to run this project from a clean machine.
Target environment: **Ubuntu 24.04 (WSL2)**, **PHP 8.4+**, **MySQL 8**.

---

## 1. PHP 8.4+

Ubuntu 24.04 ships PHP 8.3 by default. To get 8.4+ add the `ondrej/php` PPA:

```bash
sudo add-apt-repository ppa:ondrej/php -y
sudo apt update
sudo apt install php8.5 php8.5-cli php8.5-common php8.5-mbstring php8.5-xml php8.5-curl -y

# make `php` point to 8.5 (both versions can coexist)
sudo update-alternatives --set php /usr/bin/php8.5

php -v   # verify: PHP 8.5.x
```

> Switch versions anytime with `sudo update-alternatives --config php`.

## 2. Composer (official build)

Do **not** use the `apt` package — it lags behind and throws deprecation
warnings on PHP 8.4+. Install the official binary:

```bash
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php composer-setup.php
sudo mv composer.phar /usr/local/bin/composer
rm composer-setup.php

hash -r          # clear bash's cached command paths
composer --version
```

## 3. Project dependencies

```bash
composer install     # reads composer.json, sets up autoloader + dev tools into vendor/
```

This installs the dev tooling (PHP-CS-Fixer, PHPStan) and generates the PSR-4
autoloader. No re-run needed when editing/adding classes — only after changing
the `autoload` section of `composer.json`.

## 4. MySQL server + PHP driver

```bash
sudo apt update
sudo apt install mysql-server php8.5-mysql -y

mysql --version              # verify server
php -m | grep pdo_mysql      # verify PHP can talk to MySQL
```

Start the server:

```bash
sudo service mysql start
sudo service mysql status    # should be "active (running)"
```

## 5. Database, schema & app user

**Create the database, table, and seed data** (idempotent — safe to re-run):

```bash
sudo mysql < database/schema.sql
```

**Create a dedicated app user** (never connect as root from code):

```bash
sudo mysql <<'SQL'
CREATE USER IF NOT EXISTS 'cms_user'@'localhost' IDENTIFIED BY 'cms_password';
GRANT ALL PRIVILEGES ON cms.* TO 'cms_user'@'localhost';
FLUSH PRIVILEGES;
SQL
```

Verify:

```bash
mysql -u cms_user -p'cms_password' -e "SELECT * FROM cms.pages;"
```

## 6. Environment configuration

Credentials live in `.env` (git-ignored), never in code.

```bash
cp .env.example .env
```

Then edit `.env` to match your setup:

```
DB_HOST=127.0.0.1
DB_PORT=3306
DB_NAME=cms
DB_USER=cms_user
DB_PASSWORD=cms_password
```

`config/config.php` reads these into the app; `Database.php` uses them to open
the PDO connection.

## 7. Run the app

```bash
php -S localhost:8000 -t public
```

- Front controller (`public/index.php`) is the single entry point.
- `-t public` keeps everything outside `public/` private.

Visit:

| URL | Response |
|-----|----------|
| `http://localhost:8000/`      | HTML home page |
| `http://localhost:8000/pages` | pages as JSON, from MySQL |

## Tooling (optional)

```bash
composer format         # auto-format code (PHP-CS-Fixer / PSR-12)
composer format:check   # check formatting only (CI)
composer lint           # static analysis (PHPStan)
```

---

## Troubleshooting

| Symptom | Fix |
|---------|-----|
| `bash: composer: No such file or directory` after install | `hash -r` (stale shell cache) |
| Composer deprecation spam on PHP 8.4+ | You're on the apt Composer — install the official one (step 2) |
| `Database connection failed` | Is MySQL running? (`sudo service mysql start`) Do `.env` creds match the app user? |
| `could not find driver` | `php8.5-mysql` not installed (step 4) |
| `Access denied for user 'cms_user'` | Re-run the GRANT in step 5; confirm password matches `.env` |
