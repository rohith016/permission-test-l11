# Laravel Installation 

- composer create-project --prefer-dist laravel/laravel project-name
- composer update/install


# Laravel Breeze Authentication
- composer require laravel/breeze
- php artisan breeze:install
- npm install
- npm run dev
- php artisan serve


# development commands
- php artisan migrate
- php artisan tinker
    - App\Models\User::factory()->count(100)->create(0);
    

# spatie permission

- composer require spatie/laravel-permission
- php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"
- php artisan optimize:clear
- php artisan config:clear
- php artisan migrate
 
```
 // The User model requires this trait
 use HasRoles;
 
```
- php artisan migrate:fresh --seed

- check files on 
    - Database\Seeders\DatabaseSeeder
    - Database\Seeders\RoleSeeder [php artisan make:seeder RoleSeeder]
    - Database\Factories\UserFactory => configure() [check this function]
    - App\Http\Controllers\Auth\RegisteredUserController => store() [line 42]
    - bootstrap\app.php
    - resources\views\layouts\navigation.blade.php
    - routes\web.php

- set permission for role
    - check files on 
        - Database\Seeders\PermissionSeeder
        - Database\Seeders\DatabaseSeeder
        - routes\web.php
        - resources\views\layouts\navigation.blade.php
        - php artisan make:seeder PermissionSeeder 
        - php artisan db:seed --class=PermissionSeeder

    
