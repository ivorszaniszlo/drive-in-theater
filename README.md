
# Drive-in Theater App

## Table of Contents

- [General Info](#general-info)
- [Description](#description)
- [Screenshot](#screenshot)
- [Technologies](#technologies)
- [Setup](#setup)
  - [Frontend Setup](#frontend-setup)
  - [Docker Setup](#docker-setup)
  - [Database Setup](#database-setup)
- [Running](#running)
  - [Database Running](#database-running)
- [Status](#status)
- [Created](#created)

## General Info

The Drive-in Theater application is a Laravel and React-based platform that allows users to explore and book tickets for drive-in movie screenings. It provides features for movie management, screening schedules, and a booking system within a modern, user-friendly interface.

## Description

The Drive-in Theater app allows users to view available movies, schedule screenings, and book tickets for drive-in movie experiences. The backend is built using Laravel 10, while the frontend leverages ReactJS for an interactive user experience. The application also features RESTful APIs for seamless data interaction between the backend and frontend.

## Screenshot

![Drive-in Theater Screenshot](./public/img/drive-in-theater-screenshot.jpg)

## Technologies

- Laravel 10
- PHP 8
- ReactJS
- MySQL
- Tailwind CSS (with Node.js and Vite)
- Docker
- Adminer (Database management)
- PHP Debug Bar

## Setup

### Clone the Repository

```bash
git clone https://github.com/ivorszaniszlo/drive-in-theater.git
```

### Backend Setup

Navigate to the project directory and install backend dependencies:

```bash
cd drive-in-theater
docker-compose exec app composer install
```

### Frontend Setup

Navigate to the frontend directory and install dependencies:

```bash
cd frontend
npm install
```

### Environment Setup

Set up environment variables:

```bash
cp .env.example .env
docker-compose exec app php artisan key:generate
```

### Database Setup

Set up the database and run migrations:

```bash
docker-compose exec app php artisan migrate --seed
```

To access the database, you can use Adminer by navigating to `http://localhost:8081`. Use the following credentials:
- **System**: MySQL
- **Server**: mysql
- **Username**: root
- **Password**: root
- **Database**: laravel_10_drive_in_theater



### Install PHP Debug Bar

```bash
docker-compose exec app composer require barryvdh/laravel-debugbar --dev
```

### Set Up React Application

If you need to create a new React application (only do this if not already present):

```bash
docker-compose exec app npx create-react-app frontend
```

### Docker Setup

Build and run the Docker containers:

```bash
docker-compose up --build
```

## Running

### Backend

Serve the Laravel backend application:

```bash
docker-compose exec app php artisan serve --host=0.0.0.0 --port=80
```

### Frontend

Serve the React frontend application:

```bash
docker-compose exec app npm start --prefix frontend
```

Access the backend at `http://localhost:8000` and the frontend at `http://localhost:3000`.

For frontend development, start the Vite development server by running:

```bash
docker-compose exec app npm run dev --prefix frontend
```

Access the application at `http://localhost:8000`.

### Database Running

To ensure the database is running correctly, use the following command to connect to the database container:

```bash
docker-compose exec mysql mysql -u root -p
```

## Status

Active

## Created

2024
