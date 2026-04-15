# Cogear Agency - High-End Laravel Portfolio 🚀

Cogear is a premium, modern, and interactive portfolio and software agency platform built taking advantage of Laravel 11 and Tailwind CSS. It features a complete custom CMS to manage services, portfolio projects, career applications, and contact inquiries.

## ✨ Key Features
- **Modern UI/UX:** Responsive utility-first design utilizing Tailwind CSS.
- **Dynamic Portfolios:** Manage projects with custom tech stacks via the admin panel.
- **Career Portal:** Collect job applications with CV PDF uploads natively.
- **Contact Inquiries:** Automated robust mailing queue system via Google SMTP.
- **Admin CMS Dashboard:** Secure backend to review statistics, update CV statuses, and add/remove testimonials dynamically.
- **Interactive Experiences:** Integrated 3D particle backgrounds and GSAP animations.

---

## 🛠️ Requirements
Make sure you have the following installed on your machine:
- PHP >= 8.2
- Composer
- Node.js & NPM
- MySQL, PostgreSQL, or SQLite Workspace

---

## 🚀 Setup & Installation Guide

### Step 1: Install Dependencies
Open your terminal inside the project folder (`example-app`) and run:
```bash
composer install
npm install
```

### Step 2: Set up Environment Variables
Copy the example environment file to create your own configuration:
```bash
cp .env.example .env
```
Open the `.env` file and verify your Database Settings. For a quick local setup, you can use MySQL (XAMPP/Laragon) or SQLite.

### Step 3: Generate Application Key
Generate a unique security key for your Laravel app:
```bash
php artisan key:generate
```

### Step 4: Storage Link
In order to display uploaded project images and CVs, you must link the physical storage folder to the public directory:
```bash
php artisan storage:link
```

### Step 5: Database Migrations & Seeding
Create your database tables and seed them with default dummy data (Admin account, starter portfolio items, etc.):
```bash
php artisan migrate:fresh --seed
```

*(Note: This deletes any existing data and starts fresh. If you just want to migrate without deleting, drop the `:fresh --seed` tags).*

### Step 6: Compile Frontend Assets
To compile TailwindCSS into the final CSS file needed for the browser, run:
```bash
npm run build
```
*(For development, you can use `npm run dev`)*

### Step 7: Run the Application
Finally, start Laravel's local development server:
```bash
php artisan serve
```
Your website is now live at: 👉 **http://127.0.0.1:8000**

---

## 🔐 Admin Panel Details
This application contains a secure backend CMS.
- **Admin Dashboard URL:** [http://127.0.0.1:8000/login](http://127.0.0.1:8000/login)

**Default Seeded Credentials:**
- **Email:** `admin@cogear.agency`
- **Password:** `password`

*(Feel free to create a new user or modify these details inside the `database/seeders/DatabaseSeeder.php`)*

---

## 📧 Email Service (Optional for Local)
The system is pre-configured to use Asynchronous Queues for non-blocking UI form submissions. In the `.env` file, change `QUEUE_CONNECTION` to:
- `sync` (If you want instant delivery but slower form loading).
- `database` (If you want to run `php artisan queue:work` in the background).

By default, emails are saved locally in the `storage/logs/laravel.log` file, or you can supply your actual SMTP credentials under the `MAIL_*` configurations.
