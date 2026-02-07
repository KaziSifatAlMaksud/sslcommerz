# SSLCommerz Payment Gateway Integration (Laravel 8)

This project is a complete **SSLCommerz Payment Gateway integration using Laravel 8**, designed for eCommerce websites and online payment systems.  
It provides a secure, clean, and scalable payment flow that can be easily integrated into any Laravel-based eCommerce application.

---

## 🚀 Features

- SSLCommerz payment gateway integration
- Built with Laravel 8
- Secure online payment processing
- Sandbox and Live mode support
- Handles payment success, failure, and cancel callbacks
- Easy integration with eCommerce checkout systems
- Clean and maintainable Laravel code structure

---

## 🛠️ Technologies Used

- Laravel 8
- PHP 7.4 or higher
- MySQL
- HTML, CSS, JavaScript
- SSLCommerz API

---

## ⚙️ Installation & Setup

### 1️⃣ Clone the Repository

git clone https://github.com/KaziSifatAlMaksud/sslcommerz.git
</hr>
2️⃣ Go to Project Directory
cd sslcommerz
</hr>
3️⃣ Install Dependencies
composer install
</hr>
4️⃣ Create Environment File
cp .env.example .env

</hr>
5️⃣ Generate Application Key
php artisan key:generate

6️⃣ Configure Database
Update the following in your .env file:
DB_DATABASE=your_database_name
DB_USERNAME=your_database_user
DB_PASSWORD=your_database_password

Then run migrations (if available):
php artisan migrate
</hr>
## 🔐 SSLCommerz Configuration

SSLCOMMERZ_STORE_ID=your_store_id
SSLCOMMERZ_STORE_PASSWORD=your_store_password
SSLCOMMERZ_MODE=sandbox   # sandbox or live
</hr>
Callback URLs
Configure the following URLs in your SSLCommerz dashboard and project:
Success URL
Fail URL
Cancel URL
</hr>
▶️ Run the Project
Start the Laravel development server:
php artisan serve
</hr>
Open your browser and visit:
http://127.0.0.1:8000
</hr>
🧪 Testing Payments
Use SSLCommerz Sandbox credentials for testing
Test payment success, failure, and cancel flows
Always validate transaction data returned by SSLCommerz

</hr>
🛒 eCommerce Use Cases
This payment integration can be used for:
Product checkout systems
Online stores
Service-based payment systems
Custom Laravel eCommerce applications
Order and invoice payments

</hr>

📂 Project Structure (Overview)

app/
routes/
resources/
database/
config/
public/

📄 License
This project is open-source and intended for educational and development purposes only.

---

If you want next:
- ✅ **Bangla README**
- ✅ **Laravel 9 / 10 version**
- ✅ **Order & Payment database schema**
- ✅ **Client-friendly documentation**

Just tell me — happy to help 🚀


```bash
