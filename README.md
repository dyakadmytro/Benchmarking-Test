# Benchmarking Test Project

Welcome to the Benchmarking Test project! 🚀

This Laravel-based project is designed to showcase your development skills as you tackle various tasks and implement key functionalities. Below, you'll find instructions on how to set up and run the project effortlessly.

## Getting Started

Follow these steps to get the project up and running on your local environment:

### 1. Clone the Repository

```bash
git clone https://github.com/dyakadmytro/Benchmarking-Test.git Benchmarking
```
### Initialize Submodules
```bash
git submodule init
git submodule update
```

### 2. Configuration

#### Laravel Environment File

Copy the environment file for Laradock from `docker-config/.env.example` to `laradock/.env`.

#### Docker Compose Configuration

Copy the Docker Compose configuration file from `docker-config/docker-compose.yml` to `laradock/docker-compose.yml`.

### 3. Build and Start Containers

Navigate to the `laradock` directory and build the necessary containers:

```bash
cd laradock
docker-compose build workspace php-fpm nginx mariadb redis
```

Now, start the containers using the following command:

```bash
docker-compose up -d workspace php-fpm nginx mariadb redis
```

### 4. Container Configuration

Open the workspace container and configure the `.env` file as needed. You can access the workspace container using:

```bash
docker-compose exec workspace bash
```

### 5. Configuration Caching

Inside the workspace container, run the following commands to cache the Laravel configuration:

```bash
php artisan config:cache
php artisan test
```
