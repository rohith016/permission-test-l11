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
