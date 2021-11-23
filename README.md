# Installation
Run `composer require dizatech/post` to install package.

After installing the package it is necessary to run `php artisan migrate` to create necessary database structure.

Next we should run `php artisan vendor:publish` to copy necessary files from package to project.

Package behaviour could be modified using partameters defined in `config/dizatech_post.php` file.
