# Drive-in Theater App

## Table of Contents
* [General Info](#general-info)
* [Description](#description)
* [Screenshot](#screenshot)
* [Technologies](#technologies)
* [Setup](#setup)
* [Docker Setup](#docker-setup)
* [Running](#running)
* [Status](#status)
* [Created](#created)

## General Info

The Drive-in Theater application is a Laravel and React-based platform that allows users to explore and book tickets for drive-in movie screenings. It provides features for movie management, screening schedules, and booking systems within a modern, user-friendly interface.

## Description

The Drive-in Theater app allows users to view available movies, schedule screenings, and book tickets for drive-in movie experiences. The backend is built using Laravel 10, while the frontend leverages ReactJS for an interactive user experience. The application also features RESTful APIs for seamless data interaction between the backend and frontend.

## Screenshot

![Drive-in Theater Screenshot](./public/img/drive-in-theater-screenshot.jpg)

## Technologies

+ Laravel 10
+ PHP 8
+ ReactJS
+ MySQL
+ Tailwind CSS (with Node.js and Vite)
+ Docker
+ Adminer DB management
+ PHP Debug Bar

## Setup

Clone the repository:

```bash
git clone https://github.com/ivorszaniszlo/drive-in-theater.git
```

Navigate to the project directory:

```bash
cd drive-in-theater
```

Install backend and frontend dependencies:

```bash
docker-compose exec app composer install
cd frontend
npm install
```

Set up environment variables:

```bash
cp .env.example .env
php artisan key:generate
```

Set up the database and run migrations:

```bash
docker-compose exec app php artisan migrate --seed
```

### Docker Setup

Build and run the Docker containers:

```bash
docker-compose up --build
```

## Running

Serve the application:

```bash
docker-compose exec app php artisan serve
```

For frontend development, run the following command to start Vite or other frontend bundlers in development mode:

```bash
cd frontend
npm run dev
```

Access the application at `http://localhost:8000`.

## Status

Active

## Created

2024