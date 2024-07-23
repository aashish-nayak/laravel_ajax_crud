# UserAPI

A Laravel application for managing users with AJAX API.

## Table of Contents

- [Installation](#installation)
- [Configuration](#configuration)
- [Database Setup](#database-setup)
- [Running the Application](#running-the-application)
- [API Endpoints](#api-endpoints)
- [Contributing](#contributing)
- [License](#license)

## Installation

Follow these steps to set up the project locally.

### Prerequisites

- PHP >= 7.4
- Composer
- MySQL or any other supported database

### Steps

1. Clone the repository:
    ```sh
    git clone https://github.com/aashish-nayak/laravel_ajax_crud.git
    cd laravel_ajax_crud
    ```

2. Install the dependencies:
    ```sh
    composer install
    npm install  # Optional, if you have frontend assets
    npm run dev  # Optional, compile frontend assets
    ```

## Configuration

1. Copy the `.env.example` file to `.env`:
    ```sh
    cp .env.example .env
    ```

2. Generate the application key:
    ```sh
    php artisan key:generate
    ```

3. Generate the application key:
    ```sh
    php artisan storage:link
    ```

4. Set up your database configuration in the `.env` file:
    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database_name
    DB_USERNAME=your_database_user
    DB_PASSWORD=your_database_password
    ```

## Database Setup

1. Run the migrations:
    ```sh
    php artisan migrate --seed
    ```

## Running the Application

1. Start the local development server:
    ```sh
    php artisan serve
    ```

2. Access the application at:
    ```
    http://localhost:8000
    ```

## API Endpoints

### Create User

- **URL:** `/api/list`
- **Method:** `POST`
- **Request Parameters:**
    - `name` (string, required)
    - `email` (string, required, unique)
    - `phone` (string, required)
    - `description` (string, required)
    - `profile` (file, optional, image)
    - `role` (string, required)
- **Response:**
    ```json
    {
        "message": "User created successfully",
        "user": {
            "id": 1,
            "name": "John Doe",
            "email": "john@example.com",
            "phone": "1234567890",
            "description": "A description about John",
            "profile": "profiles/profile_image.jpg",
            "role": "Admin",
            "created_at": "2024-01-01T00:00:00.000000Z",
            "updated_at": "2024-01-01T00:00:00.000000Z"
        }
    }
    ```

## Contributing

If you would like to contribute, please follow these steps:

1. Fork the repository.
2. Create a new branch (`git checkout -b feature-branch`).
3. Make your changes.
4. Commit your changes (`git commit -am 'Add new feature'`).
5. Push to the branch (`git push origin feature-branch`).
6. Create a new Pull Request.

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.
