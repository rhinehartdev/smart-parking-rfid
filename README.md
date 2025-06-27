# 🚗 RFID Parking Lot – IoT-Based Attendance and Parking System

A commissioned Internet of Things (IoT) project that integrates RFID, ESP32, and a web server to automatically manage vehicle attendance in a smart parking lot. This system logs check-in and check-out events in real time, and provides web-based control to register, edit, or delete users.

---

## 🧠 Project Summary

This system uses an RFID reader module connected to an ESP32 microcontroller to scan RFID tags and send the data via HTTP requests to a PHP-based server. A MySQL database records the attendance logs and user details, which are then displayed on a web dashboard for monitoring.

---

## 🛠️ Technologies Used

- 🧩 **ESP32 (30-pin)** – Microcontroller handling RFID scanning and HTTP requests  
- 🧲 **MFRC522 RFID Module** – Scans RFID tags for user identification  
- 🪪 **RFID Tags** – Used to identify registered vehicles or individuals  
- 🌐 **HTTP Protocols** – For communication between ESP32 and the server  
- 💻 **PHP & MySQL** – Backend for storing logs and managing users  
- 🖥️ **HTML/CSS** – Frontend web interface for interaction and monitoring

---

## 🔧 Main Features

- ✅ Automatic check-in and check-out logging via RFID scan  
- ✅ Real-time updates displayed on a local web server  
- ✅ Add, edit, or delete users directly from the dashboard  
- ✅ Communication over HTTP POST requests from ESP32  
- ✅ Backend powered by PHP + MySQL for data persistence

---

## 🧪 Testing & Validation

The system was tested for:
- Accurate scanning of RFID tags using the MFRC522 module  
- Correct transmission of RFID data to the PHP server using HTTP POST  
- Successful storage and retrieval of records in the MySQL database  
- Real-time web interface updates for every check-in/check-out event  
- Functionality of add, edit, and delete operations in the user management panel

---

## 📁 Project Structure
```
📁 RFID-Parking-Lot/
├── CHECK_IN_OUT.ino ← ESP32 check-in/out logic
├── RFID_SCAN.ino ← RFID scan and send to server
├── parking_lot_db.sql ← MySQL database structure

Web Interface and Server Files
├── index.php ← Landing/login page
├── index_web.php ← Main dashboard UI
├── login.php / login_user.php ← Login logic
├── logout.php ← Logout script
├── dashboard.php ← Dashboard routing
├── style.css ← Page styling

Registration & User Management
├── register.php / register_user.php
├── edit_registration.php
├── update_registration.php
├── delete_registration.php
├── view_registrations.html
├── fetch_registrations.php

RFID Communication Handler
├── rfid-data.php ← Handles POST data from ESP32
├── rfid-display.php ← Displays current scans
```

## 🚀 How to Run This Project

1. 📦 Install and start **XAMPP** (Apache + MySQL)
2. 🗃️ Import `parking_lot_db.sql` into **phpMyAdmin**
3. 📁 Place all files in the `htdocs/` directory inside your XAMPP folder
4. 🖥️ Visit `http://localhost/index.php` to use the system
5. 📡 Connect your ESP32 to the same Wi-Fi network and upload `.ino` files via Arduino IDE
6. 🔗 Make sure to update your ESP32 IP target in the `.ino` files to match the server IP

---

## 👨‍💻 Developer Info

**Main Programmer:** Rhinehart Dejucos  
**GitHub Profile:** [@rhinehartdev](https://github.com/rhinehartdev)

> This system was commissioned as a complete RFID-based smart parking solution using IoT and local web technology.
---

## 📝 License

This project was commissioned and is provided for educational and portfolio demonstration purposes.

---


