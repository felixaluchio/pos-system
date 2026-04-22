
---

# 🧾 POS System (PHP & MySQL)

A simple **Point of Sale (POS) system** built using PHP and MySQL for managing products, sales, and users in a small business environment.

---

## 🚀 Features

* 🛒 Product management (Add, View, Update, Delete)
* 💰 Sales processing system
* 👤 User login & logout system
* 📊 Simple dashboard navigation
* 🧾 Transaction handling
* 🎨 UI built with Bootstrap 5

---

## 🛠️ Technologies Used

* PHP (Server-side logic)
* MySQL (Database)
* HTML5 & CSS3
* Bootstrap 5
* JavaScript (basic interactivity)

---

## 🗄️ Database Connection

The system connects to a MySQL database using:

```php id="readme-db"
$server = "localhost";
$username = "root";
$password = "";
$database = "pos";
```

Make sure you have created a database named **pos** in phpMyAdmin.

---

## 📁 Project Structure

```
POS/
│
├── index.php        → Dashboard
├── login.php        → Login system
├── logout.php       → Logout functionality
├── products.php     → Product management
├── sale.php         → Sales processing
├── users.php        → User management
├── dbcon.php        → Database connection
├── links.php        → Shared UI components
└── bootstrap/       → Frontend framework files
```

---

## ▶️ How to Run the Project

1. Install **XAMPP**

2. Move project folder to:

   ```
   C:\xampp\htdocs\POS
   ```

3. Start:

   * Apache
   * MySQL

4. Open browser:

   ```
   http://localhost/POS
   ```

5. Create database:

   * Name: `pos`
   * Import tables if SQL file is available

---

## 📌 Future Improvements

* 📦 Inventory tracking system
* 📊 Sales reports & analytics
* 🧾 Receipt printing system
* 👥 Role-based access (Admin/Cashier)
* ☁️ Online/cloud database integration
* 📱 Mobile-friendly UI improvements

---

## 👤 Author

**Felix Aluchio**
📧 [felixaluchio@gmail.com](mailto:felixaluchio@gmail.com)

---

⭐ *“Built as a learning project to practice real-world PHP and MySQL development.”*

---


