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

### 📄 Export Invoice to PDF
Generate invoice as PDF
Downloadable and printable receipt

---

### 📧 Email Notification
* Invoice is automatically sent to the logged-in user's email after checkout
* Uses SMTP (Mailtrap / Gmail)

---

## 🛠️ Tech Stack

* Laravel 12
* PHP 8.2
* MySQL
* Bootstrap 5
* Laravel Breeze
* DomPDF (for PDF export)

---

## ⚙️ Installation Guide

### 1. Clone Repository

```bash
git clone  https://github.com/Benaya1947/pt-chipichapa.git
cd pt-chipichapa
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

### 8. Configure Email (IMPORTANT)

This project supports sending invoice emails after checkout.

You must configure your own email service in the .env file.

🔹 Option 1: Mailtrap (Recommended for Testing)

  * Register/Login at https://mailtrap.io
  * Go to Home → Sending → API Tokens
  * Click Create Token
  * Copy credentials

MAIL_MAILER=smtp
MAIL_HOST=live.smtp.mailtrap.io
MAIL_PORT=587
MAIL_USERNAME=api
MAIL_PASSWORD=your_api_token
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=your_verified_mailtrap_email
MAIL_FROM_NAME="${APP_NAME}"

📌 Notes:

* Uses API Token, not username/password
* Can send email to real inbox (e.g., Gmail)
* You must verify your sending domain or use Mailtrap demo email


🔹 Option 2: Gmail SMTP (Real Email)

MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=your_email@gmail.com
MAIL_PASSWORD=your_app_password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=your_email@gmail.com
MAIL_FROM_NAME="${APP_NAME}"

📌 Important:
Each user who clones this project must configure their own SMTP credentials.

---

### 9. Run Application

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
6. Receive email invoice
7. View / download invoice

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
* Email feature requires SMTP configuration

---

## ✨ Future Improvements

* Update cart quantity (+ / - button)
* Remove item from cart
* Search & filter products
* Improve UI/UX design

---

## 👨‍💻 Author

Developed by: **Benaya Christandena Alfa**

---
