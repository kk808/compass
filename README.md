-- Active: 1788842050105@@127.0.0.1@3306@ci_tasks
# CodeIgniter 4 Application Starter

## What is CodeIgniter?

CodeIgniter is a PHP full-stack web framework that is light, fast, flexible and secure.
More information can be found at the [official site](https://codeigniter.com).

This repository holds a composer-installable app starter.
It has been built from the
[development repository](https://github.com/codeigniter4/CodeIgniter4).

More information about the plans for version 4 can be found in [CodeIgniter 4](https://forum.codeigniter.com/forumdisplay.php?fid=28) on the forums.

You can read the [user guide](https://codeigniter.com/user_guide/)
corresponding to the latest version of the framework.

## Installation & updates

`composer create-project codeigniter4/appstarter` then `composer update` whenever
there is a new release of the framework.

When updating, check the release notes to see if there are any changes you might need to apply
to your `app` folder. The affected files can be copied or merged from
`vendor/codeigniter4/framework/app`.

## Setup

Copy `env` to `.env` and tailor for your app, specifically the baseURL
and any database settings.

## Local Development

After cloning the repository, install the Composer dependencies:

On Windows, ensure that the PHP configuration used by Composer and the CLI
enables the `intl`, `zip`, and `mysqli` extensions. Run `php --ini` to find the
active `php.ini`, then uncomment these lines if they are disabled:

```ini
extension=intl
extension=zip
extension=mysqli
```

```bash
composer install
```

### Database setup and seeding

Run PHP locally and MySQL in Docker. Start Docker Desktop with Linux containers
enabled. If you already have a MySQL container, start it and use its published
port, database name, and credentials in `.env` below.

For a new development database, run this command once. These example passwords
are for local development:

```powershell
docker run --name ic4-mysql -e MYSQL_ROOT_PASSWORD=local_root_password -e MYSQL_DATABASE=compass -e MYSQL_USER=root -e MYSQL_PASSWORD=root -p 127.0.0.1:3306:3306 -v ic4-mysql-data:/var/lib/mysql -d mysql:8.4
```

The image creates the `compass` database and user on first startup. Database files
persist in the `ic4-mysql-data` volume. Wait until `docker logs ic4-mysql`
shows that MySQL is ready for connections before running migrations.

For subsequent sessions, start the existing container with
`docker start ic4-mysql`; stop it with `docker stop ic4-mysql`.
Initialization variables only apply to an empty data directory; changing them
does not update credentials in an existing volume.

If `.env` does not exist, copy the `env` template (PowerShell):

```powershell
Copy-Item env .env
```

Update these settings in `.env`, removing any leading `#`. Replace the example
values if you are using an existing container. The database user must have
permission to create tables and read and write records in the `compass` database.

```ini
CI_ENVIRONMENT = development
app.baseURL = 'http://localhost:8080/'

database.default.hostname = 127.0.0.1:3306
database.default.database = compass
database.default.username = root
database.default.password = root
database.default.DBDriver = MySQLi
database.default.port = 3306
```

If host port 3306 is already in use, publish `127.0.0.1:3307:3306` instead and set
`database.default.port = 3307`.

From the project root on your host machine, create the tables, check migration
status, and insert the sample tasks:

```bash
php spark migrate
php spark migrate:status
php spark db:seed TaskSeeder

# rollback
php spark migrate:rollback
```

The migration creates the `tasks` table. `TaskSeeder` inserts these three records:

| Title | Status |
| --- | --- |
| Learn PHP basics | Pending |
| Build a controller | Completed |
| Forms in PHP | Completed |

Each seeder run inserts three additional records, so run it once for the initial
sample data. Migrations create tables inside the configured database; they do not
create the MySQL database itself.

Start the local development server with:

```bash
php spark serve
```

The application will be available at `http://localhost:8080`. Open
`http://localhost:8080/tasks` to view and manage the database records.

If the database connection fails, check `docker ps` and `docker logs ic4-mysql`,
then confirm that the host, published port, credentials, and database name in
`.env` match your container. If the
`tasks` table is missing, run `php spark migrate` before seeding.

### Local Development with Docker Compose

Install Docker Desktop with Linux containers enabled, then run from the project root:

```bash
docker compose up --build -d
```

Open `http://localhost:8080`. Stop any existing `php spark serve` process first
if it is using port 8080. Local PHP and Composer installations are not required.

Compose runs PHP 8.3 with Apache in development mode. Changes in `app/` and
`public/` are reflected immediately through bind mounts. Dependencies are installed
in the image; rerun the build command after changing `composer.json`,
`composer.lock`, the Dockerfile, or `apache.conf`. This uses the Dockerfile's
production dependencies, so PHPUnit and other development packages are not included.

Runtime files persist in the `app-writable` Docker volume. App configuration can
be added under `environment` in `compose.yaml`; the project's `env` template and
local `.env` file are not loaded into the container.

The current Compose file starts only the PHP app. To connect it to the MySQL
container above through Docker Desktop's host, add these entries under the
`app` service's `environment` mapping in `compose.yaml`:

```yaml
      database.default.hostname: host.docker.internal
      database.default.database: compass
      database.default.username: compass
      database.default.password: local_compass_password
      database.default.DBDriver: MySQLi
      database.default.port: 3306
```

Use your MySQL container's credentials and published host port. Recreate the app
and run migrations and seeding inside it (skip seeding if this database already
has the sample records):

```bash
docker compose up -d
docker compose exec app php spark migrate
docker compose exec app php spark db:seed TaskSeeder
```

Open `http://localhost:8080/tasks` to see the records. Inside the app container,
`127.0.0.1` refers to the app itself, so use `host.docker.internal` for this setup.

View logs or stop the app:

```bash
docker compose logs -f app
docker compose down
```

## Important Change with index.php

`index.php` is no longer in the root of the project! It has been moved inside the *public* folder,
for better security and separation of components.

This means that you should configure your web server to "point" to your project's *public* folder, and
not to the project root. A better practice would be to configure a virtual host to point there. A poor practice would be to point your web server to the project root and expect to enter *public/...*, as the rest of your logic and the
framework are exposed.

**Please** read the user guide for a better explanation of how CI4 works!

## Repository Management

We use GitHub issues, in our main repository, to track **BUGS** and to track approved **DEVELOPMENT** work packages.
We use our [forum](http://forum.codeigniter.com) to provide SUPPORT and to discuss
FEATURE REQUESTS.

This repository is a "distribution" one, built by our release preparation script.
Problems with it can be raised on our forum, or as issues in the main repository.

## Server Requirements

PHP version 8.2 or higher is required, with the following extensions installed:

- [intl](http://php.net/manual/en/intl.requirements.php)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)

> [!WARNING]
> - The end of life date for PHP 7.4 was November 28, 2022.
> - The end of life date for PHP 8.0 was November 26, 2023.
> - The end of life date for PHP 8.1 was December 31, 2025.
> - If you are still using below PHP 8.2, you should upgrade immediately.
> - The end of life date for PHP 8.2 will be December 31, 2026.

Additionally, make sure that the following extensions are enabled in your PHP:

- json (enabled by default - don't turn it off)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php) if you plan to use MySQL
- [mysqli](http://php.net/manual/en/mysqli.installation.php) if you plan to use MySQL through CodeIgniter's MySQLi driver
- [libcurl](http://php.net/manual/en/curl.requirements.php) if you plan to use the HTTP\CURLRequest library
