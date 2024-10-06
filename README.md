# Company Employee Management System

## Table of Contents
- [Introduction](#introduction)
- [Features](#features)
- [Technologies Used](#technologies-used)
- [Installation](#installation)
- [Usage](#usage)
- [API Endpoints](#api-endpoints)

## Introduction

This project is a Company Employee Management System built using Laravel. It allows users to manage company information, employee details, and related functionalities. The application provides an intuitive interface for creating, updating, and viewing company and employee records.

## Features

- **User Authentication**: Secure user login and registration.
- **Company Management**: Create, update, and delete companies.
- **Employee Management**: Add, edit, and remove employees associated with a company.
- **Profile Management**: Upload and manage employee profile pictures.
- **Responsive Design**: User-friendly interface suitable for various devices.

## Technologies Used

- **Backend**: Laravel 9.x
- **Frontend**: HTML, CSS, Bootstrap
- **Database**: MySQL / PostgreSQL
- **Image Processing**: Intervention Image
- **Environment**: PHP 8.x

## Installation

Follow these steps to get a local copy of the project up and running:

1. **Clone the repository:**
   ```bash
   git clone https://github.com/shwephuehmone25/coding-test
2. **Navigate to the project directory:**
    ```bash
    cd coding-test
3. **Install dependencies:**
    ```bash
    composer install
4. **Create a .env file:** Copy the .env.example file to a new file named .env.
    ```bash
    cp .env.example .env
5. **Generate the application key:**
    ```bash
    php artisan key:generate
6. **Create the symbolic link:**   
    ```bash
    php artisan key:generate
7. **Set up the database:**
    Database eg.
    ```bash
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=laravel
    DB_USERNAME=root
    DB_PASSWORD=
8. **Run the migrations:**
    ```bash
    php artisan migrate 
9. **(Optional)** If you want to get dummy data, run this:
    ```bash
    php artisan db:seed 
10. **Start the development server:**
    ```bash
    php artisan serve
Access the application at http://localhost:8000.

## Usage
Once the application is up and running, you can create and manage companies and employees through the web interface.

- **Access the application**: Visit [http://localhost:8000](http://localhost:8000) in your web browser.
- **Login or Register**: Use the authentication feature to log in or register a new account.
- **Manage Companies**: Use the navigation to create, edit, or delete companies.
- **Manage Employees**: Associate employees with companies, upload profiles, and manage employee details.

## API Endpoints

| Method | Endpoint               | Description                       |
|--------|------------------------|-----------------------------------|
| POST   | `/api/companies`       | Create a new company              |
| GET    | `/api/companies`       | Retrieve all companies            |
| GET    | `/api/companies/{id}`  | Retrieve a specific company       |
| PUT    | `/api/companies/{id}`  | Update a specific company         |
| DELETE | `/api/companies/{id}`  | Delete a specific company         |
| POST   | `/api/employees`       | Create a new employee             |
| GET    | `/api/employees`       | Retrieve all employees            |
| GET    | `/api/employees/{id}`  | Retrieve a specific employee      |
| PUT    | `/api/employees/{id}`  | Update a specific employee        |
| DELETE | `/api/employees/{id}`  | Delete a specific employee        |

