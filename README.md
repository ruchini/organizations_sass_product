# Laravel Project - Organizational Management System

Welcome to the Organizational Management System, a Laravel-based web application for managing organizations, locations, and devices within your company.

## Table of Contents

- [Features](#features)
- [Installation](#installation)
- [Usage](#usage)

## Features

- **Organizations Management**: Create, list, and view details of organizations.
- **Locations Management**: Add, list, and view locations associated with organizations.
- **Devices Management**: Record device details and associate them with locations.
- **Validation and Error Handling**: Proper validation for data input and error handling.
- **User-Friendly Interface**: A clean and intuitive user interface for easy navigation.

## Installation

Follow these steps to get the project up and running on your local machine:

1. Clone the repository:
   ```sh
   git clone git@github.com:ruchini/organizations_sass_product.git
   cd organization-product
2. Install Composer Dependencies:
    ```sh
    composer install
3. Set Up Environment Variables:

   - Copy the .env.example file to .env and configure your database settings.
   - Generate an application key:

   ```sh 
   php artisan key:generate

4. Run Database Migrations and Seed the Database::
    ```sh
    php artisan migrate --seed
5. Serve the Application::
    ```sh
    php artisan serve
6. Visit http://localhost:8000 in your web browser.

## Usage
   - Access the application by visiting the URL where you've served the project (e.g., http://localhost:8000).
   - Click on "Add Organization" to create a new organization.
   - Add locations and devices within organizations as needed.
   - View and manage organizations, locations, and devices within the system.


