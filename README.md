Project presentation video link= https://drive.google.com/file/d/1sXX10s3vghTBflioA36bK0O1wauoMCAp/view?usp=sharing

# EzyProduct

<p align="center">
  <strong>A modern, professional product management and catalog system built with Laravel</strong>
</p>

<p align="center">
  <a href="#-features">Features</a> •
  <a href="#-tech-stack">Tech Stack</a> •
  <a href="#-installation">Installation</a> •
  <a href="#-usage">Usage</a> •
  <a href="#-api-documentation">API</a> •
  <a href="#-project-structure">Structure</a>
</p>

---

## 📋 Overview

**EzyProduct** is a comprehensive product management and e-commerce catalog system designed with modern Laravel architecture principles. It provides a clean, intuitive interface for managing products and categories while offering REST APIs for programmatic access.

Whether you're building a small product catalog or a larger e-commerce platform, EzyProduct provides a solid foundation with best practices in code organization, separation of concerns, and user experience.

---

## ✨ Features

- **🛍️ Product Management** - Create, read, and manage products with detailed information
- **📂 Category Organization** - Organize products into logical categories with one-to-many relationships
- **🔍 Search & Filter** - Search products by name and sort by price for better discovery
- **📊 Dashboard Analytics** - View at-a-glance statistics including total products, categories, and stock levels
- **🎨 Responsive UI** - Modern, mobile-friendly interface built with Tailwind CSS v4
- **🔌 REST API** - JSON endpoints for programmatic access to products and details
- **✅ Form Validation** - Built-in request validation with clear error messaging
- **📝 Audit Logging** - Comprehensive logging of product creation and system events
- **⚡ Performance** - Optimized database queries with eager loading and pagination

---

## 🛠️ Tech Stack

### Backend

- **Framework:** Laravel 11+
- **Language:** PHP 8.2+
- **Database:** MySQL/PostgreSQL/SQLite
- **ORM:** Eloquent
- **Validation:** Laravel Request Validation

### Frontend

- **Build Tool:** Vite with Laravel Plugin
- **CSS Framework:** Tailwind CSS v4
- **Templating:** Blade PHP
- **HTTP Client:** Axios
- **Admin Template:** SB Admin (CSS/JS)

### Development

- **Testing:** PHPUnit
- **Package Manager:** Composer
- **Build:** Vite
- **Code Quality:** Pint (Laravel Code Style)

---

## 📦 Installation

### Prerequisites

- PHP 8.2 or higher
- Composer
- Node.js 18+ and npm
- MySQL or compatible database
- Git (optional)

### Steps

1. **Clone or Extract the Project**

    ```bash
    cd ezyproduct
    ```

2. **Install PHP Dependencies**

    ```bash
    composer install
    ```

3. **Install Frontend Dependencies**

    ```bash
    npm install
    ```

4. **Environment Configuration**

    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

5. **Configure Database**
   Edit `.env` and set your database credentials:

    ```
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=ezyproduct
    DB_USERNAME=root
    DB_PASSWORD=
    ```

6. **Run Migrations**

    ```bash
    php artisan migrate
    ```

7. **Build Frontend Assets**

    ```bash
    npm run build
    ```

    For development with hot reload:

    ```bash
    npm run dev
    ```

8. **Start Development Server**
    ```bash
    php artisan serve
    ```
    Access the application at `http://localhost:8000`

---

## 🚀 Usage

### Dashboard

Visit the home page to access the dashboard with key statistics:

- Total products in inventory
- Total product categories
- Overall stock levels

### Products

- **View All:** Navigate to `/products` to see all products
- **Create:** Click "Add Product" to create a new product with validation
- **Search:** Use the search bar to find products by name
- **Sort:** Sort products by price (ascending/descending)
- **Details:** Click on a product to view full details

### Categories

Visit `/categories` to browse all product categories and their associated products.

---

## 🔌 API Documentation

### Base URL

```
http://localhost:8000/api/products
```

### Endpoints

#### List All Products

```http
GET /products/api/list
```

**Response:**

```json
{
    "success": true,
    "data": [
        {
            "id": 1,
            "name": "Product Name",
            "price": "99.99",
            "stock": 50,
            "category_id": 1,
            "created_at": "2026-06-20T10:30:00Z",
            "updated_at": "2026-06-20T10:30:00Z"
        }
    ]
}
```

#### Get Product Details

```http
GET /products/api/{id}
```

**Response:**

```json
{
    "success": true,
    "data": {
        "id": 1,
        "name": "Product Name",
        "price": "99.99",
        "stock": 50,
        "category_id": 1,
        "category": {
            "id": 1,
            "name": "Category Name"
        },
        "created_at": "2026-06-20T10:30:00Z",
        "updated_at": "2026-06-20T10:30:00Z"
    }
}
```

---

## 📁 Project Structure

```
ezyproduct/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── DashboardController.php      # Dashboard statistics
│   │   │   ├── ProductController.php        # Product CRUD & APIs
│   │   │   └── CategoryController.php       # Category listing
│   │   ├── Requests/
│   │   │   └── StoreProductRequest.php      # Product validation
│   │   └── Services/
│   │       ├── ProductService.php           # Product business logic
│   │       └── CategoryService.php          # Category business logic
│   ├── Models/
│   │   ├── Product.php                      # Product model with relationships
│   │   ├── Category.php                     # Category model
│   │   └── User.php                         # Authentication user
│   └── Repositories/
│       ├── ProductRepository.php            # Product data access
│       └── CategoryRepository.php           # Category data access
├── database/
│   ├── migrations/                          # Database schema
│   ├── seeders/                             # Database seeders
│   └── factories/                           # Model factories for testing
├── routes/
│   ├── web.php                              # Web routes (HTML & APIs)
│   └── console.php                          # CLI commands
├── resources/
│   ├── views/
│   │   ├── layouts/                         # Layout templates
│   │   ├── dashboard/                       # Dashboard pages
│   │   ├── products/                        # Product pages
│   │   ├── categories/                      # Category pages
│   │   └── components/                      # Reusable Blade components
│   ├── css/
│   │   └── app.css                          # Global styles
│   └── js/
│       ├── app.js                           # Main JS entry
│       └── bootstrap.js                     # Bootstrap configuration
├── config/                                  # Configuration files
├── storage/                                 # File storage & logs
├── tests/                                   # Unit & feature tests
├── vite.config.js                           # Vite configuration
├── composer.json                            # PHP dependencies
├── package.json                             # Node dependencies
└── artisan                                  # Laravel CLI tool
```

---

## 🏗️ Architecture

EzyProduct follows a **layered architecture pattern** for clean code organization and maintainability:

```
Request
   ↓
Route
   ↓
Controller (HTTP Request Handling)
   ↓
Service (Business Logic)
   ↓
Repository (Data Access)
   ↓
Model (Eloquent ORM)
   ↓
Database
```

### Key Principles

- **Separation of Concerns:** Each layer has a single responsibility
- **Dependency Injection:** Loose coupling through constructor injection
- **Repository Pattern:** Abstract database operations
- **Request Validation:** Dedicated validation classes
- **Error Handling:** Comprehensive logging and error management

---

## 📊 Database Schema

### Categories Table

```sql
CREATE TABLE categories (
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255),
    created_at TIMESTAMP,
    updated_at TIMESTAMP
);
```

### Products Table

```sql
CREATE TABLE products (
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    category_id BIGINT NOT NULL,
    name VARCHAR(255),
    price DECIMAL(10,2) DEFAULT 0,
    stock BIGINT UNSIGNED DEFAULT 0,
    created_at TIMESTAMP,
    updated_at TIMESTAMP,
    FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE CASCADE
);
```

---

## 🧪 Testing

Run the test suite:

```bash
php artisan test
```

Run with coverage:

```bash
php artisan test --coverage
```

---

## 🐛 Troubleshooting

### Database Connection Error

- Verify `.env` database credentials
- Ensure database exists and is running
- Run `php artisan migrate`

### Assets Not Loading

- Run `npm run build` (production) or `npm run dev` (development)
- Clear cache: `php artisan cache:clear`

### Port 8000 Already in Use

Use a different port:

```bash
php artisan serve --port=8001
```

---

## 📝 Code Style

This project uses Laravel Pint for code formatting:

```bash
./vendor/bin/pint
```

---

## 📄 License

This project is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).

---

## 🤝 Contributing

Contributions are welcome! Please follow these guidelines:

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/amazing-feature`)
3. Commit changes (`git commit -m 'Add amazing feature'`)
4. Push to branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

---

## 💬 Support

For issues, questions, or suggestions:

- Check existing [Issues](../../issues)
- Create a new issue with detailed description
- Include steps to reproduce and environment details

---

## 📚 Additional Resources

- [Laravel Documentation](https://laravel.com/docs)
- [Tailwind CSS Documentation](https://tailwindcss.com/docs)
- [Vite Documentation](https://vitejs.dev)
- [Eloquent ORM Guide](https://laravel.com/docs/eloquent)

---

<p align="center">
  <strong>Built with ❤️ using Laravel</strong>
</p>
