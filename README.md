# Simple-User-Crud-Symfony-4

# Requirements:

- PHP 7.2+
- Composer

# Installation:

1- Check your database info (User, password, Port) in .env file

2- Create the database: (change the name of db in .env file if you want):
php bin/console doctrine:database:create 

3- Lanch the migration script :
php bin/console doctrine:migrations:migrate 

5- Install bundles requirements:
composer install

4 Change The Access to rgister the first admin user in the file config/packages/security.yaml:
Uncomment this line: - { path: ^/register, roles: ROLE_ADMIN }

6 After you register your first admin user you can comment it again :)

7 Run the project:
php bin/console server:run





 

