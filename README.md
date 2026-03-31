# 🏢 PT ChipiChapa - Web-Based Product Management & Sales System

## 📌 Overview

This project is a web-based product management and sales application developed for **PT ChipiChapa**.

The system allows:

* **Admin** to manage products and categories
* **User** to browse products, add items to cart, and perform checkout

This project is built using **Laravel** and implements a complete flow from product listing → cart → checkout → invoice.

---

## 🚀 Features

### 🔐 Authentication & Role

* Login & Register (Laravel Breeze)
* Role-based access:

  * **Admin**
  * **User**
* Default role: **User**

---

### 🛍️ Product Management (Admin)

* Add new product
* Edit product
* Delete product
* Upload product image
* Assign category to product
* Pagination enabled

---

### 🗂️ Category Management (Admin)

* Add category
* Edit category
* Delete category
* Pagination enabled

---

### 🛒 Cart System (User)

* Add to cart (session-based)
* Quantity auto-increment
* Cart counter in navbar

---

### 🧾 Invoice System

* Checkout from cart
* Auto-generate invoice number
* Store invoice & invoice items in database
* Display invoice in receipt format

---

## 🛠️ Tech Stack

* Laravel
* PHP
* MySQL
* Bootstrap 5
* Laravel Breeze

---

## ⚙️ Installation Guide

### 1. Clone Repository

```bash
git clone https://github.com/your-username/your-repo-name.git
cd your-repo-name
```

---

### 2. Install Dependencies

```bash
composer install
npm install
npm run dev
```

---

### 3. Setup Environment

```bash
cp .env.example .env
```

---

### 4. Configure Database

Edit `.env`:

```env
DB_CONNECTION=mysql
DB_DATABASE=finalproject
DB_USERNAME=root
DB_PASSWORD=
```

---

### 5. Generate App Key

```bash
php artisan key:generate
```

---

### 6. Run Migration & Seeder

```bash
php artisan migrate --seed
```

---

### 7. Storage Link (IMPORTANT for images)

```bash
php artisan storage:link
```

---

### 8. Run Application

```bash
php artisan serve
```

Access the app at:

```
http://127.0.0.1:8000
```

---

## 🔁 Routing Flow

* `/` → redirect to `/dashboard`
* `/dashboard` → Product list
* `/invoice` → Cart page
* `/invoice/{id}` → Invoice detail
* `/checkout` → Checkout process (POST)

---

## 👥 Demo Accounts

### 👨‍💼 Admin

* Email: `admin@gmail.com`
* Password: `123456`

### 👤 Users

* Total: 10 seeded users + 1 registered user
* Example:

  * Email: `user@gmail.com`
  * Password: `123456`

---

## 📂 Storage

Product images are stored in:

```
storage/app/public/images
```

Accessed via:

```
public/storage/images/filename.jpg
```

---

## 📊 Project Flow

### User Flow:

1. Register / Login
2. Browse products
3. Add to cart
4. Open cart
5. Checkout
6. View invoice

### Admin Flow:

1. Login
2. Manage products
3. Manage categories

---

## ⚠️ Notes

* `.env` file is not included (security reason)
* Make sure database is created before running migration
* Run `php artisan storage:link` to display images properly
* Cart is stored in **session**, not database
* Product images are not included in the repository.
* Please upload images manually after running the project.

---

## ✨ Future Improvements

* Update cart quantity (+ / - button)
* Remove item from cart
* Search & filter products
* Export invoice to PDF

---

## 👨‍💻 Author

Developed by: **Benaya Christandena Alfa**

---