# Assignment – URL Shortener (Laravel)

This project is a Laravel-based URL Shortener application developed.  
It allows users to convert long URLs into short URLs and redirect them to the original URLs.

---

## ⚙️ Prerequisites
Ensure the following are installed on your system:
- PHP 8.2 or higher
- Composer
- MySQL
- XAMPP
- Git

---

## 🚀 How to Run the Project on Local System

### 1️⃣ Clone the Repository
```bash

# Clone the repository
git clone https://github.com/imrahul050/assignment-urlshortner.git

# Go to project directory
cd assignment-urlshortner

# Install PHP dependencies
composer install

# Create environment file
cp .env.example .env

# Generate application key
php artisan key:generate

# Run migrations and seeders
php artisan migrate --seed

# Start Laravel development server
php artisan serve

# Open in browser
http://127.0.0.1:8000
