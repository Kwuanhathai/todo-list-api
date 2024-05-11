# To-Do List Back-end Project

# Technologies Used
Laravel: A PHP framework for building web applications.
MySQL: A relational database management system used by Laravel for data storage.
Getting Started
To set up the backend server for your to-do list application, follow these steps:

1.Clone the repository:
git clone https://github.com/Kwuanhathai/todo-list-api.git
2.Navigate to the project directory:
cd todo-list-api
3.Install Composer dependencies:
composer install
4.Copy the .env.example file to .env and configure your database connection settings.
5.Generate a new application key:
php artisan key:generate
6.Run database migrations to create tables:
php artisan migrate
7.Start the Laravel development server:
php artisan serve

# API Endpoints
The backend server provides the following API endpoints:

GET /api/todos: Retrieve all tasks.
POST /api/todos: Create a new task.
GET /api/todos/{id}: Retrieve a specific task.
PUT /api/todos/{id}: Update an existing task.
DELETE /api/todos/{id}: Delete a task.

# Usage
Once the backend server is set up and running, it will serve API requests to the frontend React application. Ensure that the frontend application is configured to communicate with the backend server endpoints.
