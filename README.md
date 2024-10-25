# CodeIgniter 4 Project

## Table of Contents

1. [Clone the Repository](#clone-the-repository)
2. [Update Dependencies with Composer](#update-dependencies-with-composer)
3. [Setting Up the Environment (.env)](#setting-up-the-environment-env)
4. [Run Database Migrations](#run-database-migrations)
5. [Seeding the Database](#seeding-the-database)

---

## Clone the Repository

To clone the repository, follow these steps:

```bash
git clone https://github.com/handoko207/surat_fakultas
cd your-repo-name
```

---

## Update Dependencies with Composer

After cloning the repository, install or update the dependencies using Composer:

```bash
composer install
```

If you need to update the dependencies:

```bash
composer update
```

---

## Setting Up the Environment (.env)

1. Copy the `.env` example file to create your own `.env` configuration:

   ```bash
   cp env .env
   ```

2. Open the `.env` file and configure your environment settings (such as database connection, base URL, and more).

### Example of database configuration:

```ini
# .env file
app.NameApplication = 'Persuratan Fakultas'

database.default.hostname = localhost
database.default.database = your_database_name
database.default.username = your_username
database.default.password = your_password
database.default.DBDriver = MySQLi
```

Make sure to adjust the values according to your setup.

---

## Run Database Migrations

To migrate the database, run the following command:

```bash
php spark migrate
```

This command will apply all the migrations to set up your database tables.

---

## Seeding the Database

To populate the database with initial data, you can run the seeder:

```bash
php spark db:seed ProgramStudi
php spark db:seed MasterUser
```

---

## Additional Information

- For development purposes, you can run the built-in server using:

  ```bash
  php spark serve
  ```

- To clear cache or configurations, use:

  ```bash
  php spark cache:clear
  ```

---

## Contact Information

If you have any questions or suggestions, feel free to contact me:

- Email: handoko207@gmail.com
- GitHub: [handoko207](https://github.com/handoko207)

## Support & Donations

If you find this project useful and would like to support its development, you can donate:

- PayPal: [Paypal](paypal.me/handoko207)
- Buy Me a Coffee: [Saweria](https://saweria.co/handoko207)

Thank you for your support!
