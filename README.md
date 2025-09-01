Laravel Project

This is a Laravel-based web application that allows you to manage products and rules. Follow the steps below to set up and run the application locally.

Prerequisites

Before you begin, ensure you have the following installed:

PHP >= 7.4

Composer

MySQL or another supported database

Project Setup

1. Clone the repository

Clone this repository to your local machine:

git clone <repository-url>
cd <project-folder>

2. Install PHP dependencies

Run the following command to install the PHP dependencies via Composer:

composer install

3. Set up your environment file

Copy the .env.example file to .env:

cp .env.example .env

4. Configure your environment

Edit the .env file to configure your database settings:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_username
DB_PASSWORD=your_password

5. Generate the application key

Run this command to generate a new application key:

php artisan key:generate

6. Run database migrations

Make sure your database is set up, then run the migrations to create necessary tables:

php artisan migrate

7. Start the development server

You can start the Laravel development server by running:

php artisan serve

The application will be available at http://localhost:8000.

Routes

After the application is running, you can access the following pages:

Products page: http://localhost:8000/product-list
Rules page: http://localhost:8000/rule-list
