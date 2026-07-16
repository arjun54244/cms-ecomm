<p align="center">
  <img src="https://raw.githubusercontent.com/arjun54244/cms-ecomm/main/page.png" alt="Jaipur Heritage – CMS E-Commerce Banner" width="100%">
</p>

<h1 align="center">🛍️ Jaipur Heritage – CMS E-Commerce Platform</h1>

<p align="center">
  A full-featured <strong>Laravel 13</strong> CMS &amp; E-Commerce platform for premium women's ethnic wear,<br>
  powered by <strong>Filament v5</strong> admin panel, <strong>Razorpay</strong> payments, and a rich storefront.
</p>

<p align="center">
  <a href="https://github.com/arjun54244/cms-ecomm">
    <img src="https://img.shields.io/badge/GitHub-cms--ecomm-181717?style=for-the-badge&logo=github" alt="GitHub Repo">
  </a>
  <img src="https://img.shields.io/badge/Laravel-13-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" alt="Laravel 13">
  <img src="https://img.shields.io/badge/Filament-v5-F59E0B?style=for-the-badge&logo=laravel&logoColor=white" alt="Filament v5">
  <img src="https://img.shields.io/badge/PHP-8.3+-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP 8.3+">
  <img src="https://img.shields.io/badge/Razorpay-Payment-02042B?style=for-the-badge&logo=razorpay&logoColor=white" alt="Razorpay">
  <img src="https://img.shields.io/badge/License-MIT-green?style=for-the-badge" alt="MIT License">
</p>

---

## 📖 About the Project

**Jaipur Heritage** is a premium women's ethnic wear e-commerce website built on **Laravel 13** with a fully integrated CMS. It provides:

- A beautiful **customer-facing storefront** for browsing and purchasing ethnic wear (lehengas, salwar suits, etc.)
- A powerful **Filament v5 admin panel** for managing products, categories, orders, blogs, FAQs, banners, and testimonials
- **Razorpay payment gateway** integration for secure online payments
- **PDF invoice generation** via DomPDF
- **SEO-optimized** pages with dynamic meta tags

---

## ✨ Features

### 🛒 Storefront

| Feature | Description |
|---|---|
| **Home Page** | Dynamic banner slider, featured category tabs, lookbook section, testimonials, newsletter |
| **Shop** | Product listing with category filters, search, and pagination |
| **Product Page** | Image gallery, color/size variants, Add to Cart & Buy Now |
| **Cart** | Session-based cart with quantity management |
| **Checkout** | Address form with Razorpay payment integration |
| **Order Success** | Order confirmation with PDF invoice download |
| **Blog** | CMS-managed blog posts with slug-based routing |
| **FAQs** | Admin-managed frequently asked questions |
| **About / Contact** | Static CMS pages |
| **Custom Pages** | Dynamic pages via `/page/{slug}` |

### 🔧 Admin Panel (Filament v5)

- Product & Category management (with featured toggle, sort order)
- Order management & status tracking
- Banner slider management (image upload)
- Blog post editor
- FAQ manager
- Testimonial manager
- Site settings (logo, site name, contact info)
- PDF invoice generation (DomPDF)

### 💳 Payments

- **Razorpay** payment gateway
- Payment success & failure webhooks
- Secure order creation

---

## 🛠️ Tech Stack

| Layer | Technology |
|---|---|
| **Framework** | Laravel 13 |
| **Admin Panel** | Filament v5 |
| **Frontend** | Blade Templates, Bootstrap 5, Swiper.js |
| **Payment** | Razorpay |
| **PDF** | barryvdh/laravel-dompdf |
| **Database** | MySQL (XAMPP) |
| **Build Tool** | Vite |
| **Queue** | Laravel Queue (database driver) |
| **Storage** | Laravel Storage (local / public disk) |

---

## 🚀 Getting Started

### Prerequisites

- PHP **8.3+**
- Composer
- Node.js & npm
- MySQL (XAMPP recommended on macOS)

### Installation

1. **Clone the repository**
   ```bash
   git clone https://github.com/arjun54244/cms-ecomm.git
   cd cms-ecomm
   ```

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Install Node dependencies**
   ```bash
   npm install
   ```

4. **Configure environment**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Set up the database**

   Create a MySQL database (e.g., `jaipur_heritage`) and update `.env`:
   ```env
   DB_DATABASE=jaipur_heritage
   DB_USERNAME=root
   DB_PASSWORD=
   ```

   Import the included SQL dump:
   ```bash
   mysql -u root jaipur_heritage < ecomm.sql
   ```

   Or run migrations fresh:
   ```bash
   php artisan migrate
   ```

6. **Configure Razorpay** in `.env`:
   ```env
   RAZORPAY_KEY=your_razorpay_key
   RAZORPAY_SECRET=your_razorpay_secret
   ```

7. **Create storage symlink**
   ```bash
   php artisan storage:link
   ```

8. **Run the development server**
   ```bash
   composer run dev
   ```
   This starts the Laravel server, queue listener, Pail log viewer, and Vite dev server concurrently.

---

## 🗂️ Project Structure

```
cms-ecomm/
├── app/
│   ├── Filament/           # Filament admin resources & pages
│   ├── Http/
│   │   └── Controllers/    # ShopController, CheckoutController, BlogController…
│   └── Models/             # Product, Category, Order, Blog, Testimonial…
├── database/
│   ├── migrations/         # All DB migrations
│   └── seeders/
├── public/
│   └── assets/             # CSS, JS, images
├── resources/
│   └── views/
│       ├── layout/         # app.blade.php, header, footer
│       ├── home.blade.php
│       ├── shop.blade.php
│       ├── product.blade.php
│       ├── cart.blade.php
│       ├── checkout.blade.php
│       └── …
├── routes/
│   └── web.php             # All storefront routes
├── ecomm.sql               # Full database dump
└── vite.config.js
```

---

## 🌐 Routes Overview

| Method | URL | Description |
|---|---|---|
| GET | `/` | Home page |
| GET | `/shop` | All products |
| GET | `/category/{slug}` | Category filter |
| GET | `/product/{slug}` | Product detail |
| GET | `/cart` | Shopping cart |
| GET | `/checkout` | Checkout page |
| POST | `/checkout/order` | Place order |
| POST | `/payment/success` | Razorpay success callback |
| GET | `/blogs` | Blog listing |
| GET | `/blog/{slug}` | Blog post detail |
| GET | `/faq` | FAQs |
| GET | `/about` | About page |
| GET | `/contact` | Contact page |
| GET | `/page/{slug}` | Dynamic CMS pages |

---

## 🖼️ Screenshots

<p align="center">
  <img src="https://raw.githubusercontent.com/arjun54244/cms-ecomm/main/page.png" alt="Jaipur Heritage Storefront" width="100%">
</p>

---

## 🤝 Contributing

Contributions are welcome! Please feel free to submit a pull request.

1. Fork the repository
2. Create your feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

---

## 🔒 Security Vulnerabilities

If you discover a security vulnerability, please contact the maintainer directly. All security vulnerabilities will be promptly addressed.

---

## 📄 License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

---

<p align="center">
  Made with ❤️ by <strong>Arjun</strong> · <a href="https://github.com/arjun54244">@arjun54244</a>
</p>
