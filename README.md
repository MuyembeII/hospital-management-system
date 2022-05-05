# Hospital Management System

###Database Configuration
- In the project root folder, open file named .env file. All application environment properties are set in here

`DB_CONNECTION=mysql`
`DB_HOST=127.0.0.1`
`DB_PORT=3306`
`DB_DATABASE=hms_db`
`DB_USERNAME=root`
`DB_PASSWORD=`

### How to start the application
Run the following command in your root folder **_php artisan serve_**

##NOTE 
Run migration command anytime you make changes to a file **_php artisan migrate_**

### Create seeder commands for registrar module
`php artisan make:seeder UserSeeder`

# Installation Guide
    
    Execute the Following Command
        php artisan generate:key
        php artisan migrate
        php artisan serve
        php artisan db:seed

When done, check here -> http://localhost:8000/hms

 
