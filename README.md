# 📊 Lead Management System

A powerful and flexible Lead Management System built using **Laravel**. This application streamlines the process of capturing, tracking, and converting leads efficiently — complete with automated email communication, admin dashboard, role-based access, and more.

---

## 🚀 Features

- 🔐 Secure user authentication and authorization
- 📬 Integrated email system (SMTP, notifications)
- 📁 Lead capture form with validation
- 📈 Dashboard analytics (Leads, Status, Timeline)
- 📊 Lead filtering, searching, and sorting
- 🧑‍💼 Admin panel with CRUD operations
- 📤 Bulk email to selected leads
- 📎 File upload for lead attachments
- 🗃️ Role-based permissions (Admin, Manager, Agent)
- 📄 Export leads to PDF/Excel
- 🌐 Responsive UI using Laravel Blade + Bootstrap

---

## 🛠️ Built With

- **Laravel** 10+
- **PHP** 8.x
- **MySQL**
- **Bootstrap 5**
- **Laravel Mail**
- **Laravel Excel** (Maatwebsite)
- **Spatie Roles & Permissions**
- **Laravel Livewire / Alpine.js** *(if used)*

---

## 📦 Installation

```bash
git clone https://github.com/abirhasan1299/Lead-Management.git
cd Lead-Management

# Install dependencies
composer install
npm install && npm run dev

# Environment setup
cp .env.example .env
php artisan key:generate

# Set up your DB credentials in .env
php artisan migrate --seed

# Start local server
php artisan serve

# Mail Configuration
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=your_username
MAIL_PASSWORD=your_password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=admin@example.com
MAIL_FROM_NAME="${APP_NAME}"
