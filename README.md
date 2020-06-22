# Simple-User-Crud-Symfony-4

# Requirements:

- PHP 7.2+
- Composer

# Installation:

1- Check you db User and password in .env file

2- Create the database : (change the name of db in .env file if you want):
pp bin/console doctrine:database:create 

3- Lanch the migration script :
php bin/console doctrine:migrations:migrate 

5- Install bundles requirements:
composer install

4 Change The Access to rgister an admin user in the file config/packages/security.yaml:
Uncomment this line         - { path: ^/register, roles: ROLE_ADMIN }

6 After you register you first admin user you can comment it again :)



 

