# **EatNow** 🍴  
[English](README.md) | [中文](README.zh.md)
> **A QR-based ordering system for a seamless dining experience.**

[![License](https://img.shields.io/github/license/marsk7/eatnow)](LICENSE)  
[![Version](https://img.shields.io/badge/version-1.0.0-blue)](https://github.com/marsk7/eatnow/releases)  
[![GitHub stars](https://img.shields.io/github/stars/marsk7/eatnow)](https://github.com/marsk7/eatnow/stargazers)  
<!-- [Live Demo](http://et-now.com/) | [Documentation](#) -->
---

## 📌 **Project Overview**

**EatNow** is a modern web application designed to simplify the ordering process in restaurants. Customers can scan QR codes at their tables to access the menu, place orders, and make payments, while restaurant staff can efficiently manage orders and monitor operations.

---

## 🎯 **Features**

- **QR Code-Based Ordering**: Instant access to the menu via QR codes.  
- **Dynamic Menu Management**: Easy updates for food items, prices, and availability.  
- **Order Tracking**: Real-time updates for customers and kitchen staff.  
- **Payment Integration**: Secure and quick online payment options.  
- **Admin Panel**: Manage orders, menu items, and user roles.  
- **Responsive Design**: Works seamlessly on desktops, tablets, and mobile devices.

---

## 🛠️ **Tech Stack**

| **Technology**    | **Description**                     |
|--------------------|-------------------------------------|
| **Frontend**       | HTML, CSS, JavaScript              |
| **Backend**        | PHP, CodeIgniter                   |
| **Database**       | MySQL                              |
| **Server**         | Nginx                              |
| **Containerization** | Docker + Docker Swarm             |
| **Cloud Deployment** | Google Cloud Platform (GCP)       |

---

## 🚀 **Getting Started**

### **1. Prerequisites**

- Docker and Docker Compose installed.
- MySQL database configured.
- CodeIgniter framework set up locally.

### **2. Clone Repository**

```bash
git clone https://github.com/marsk7/eatnow.git
cd eatnow
```
To enable chatbot function, generate OpenAI APIKEY and add it at the end of .env file
```bash
OPENAI_API_KEY=sk-xxxx...
```

### **3. Build and Run**

```bash
docker-compose up -d
```

### **4. Access Application**

- **Frontend**: http://localhost
- **Admin Panel**: http://localhost/admin
  <!--
  - Default Admin Credentials:  
    - **Username**: `admin`  
    - **Password**: `password123`
    -->

---

## 📂 **Project Structure**

```plaintext
eatnow/
├── app/                # CodeIgniter application files
│   ├── Controllers/    # MVC controllers
│   ├── Models/         # Business logic
│   └── Views/          # Frontend templates
├── docker/             # docker config files
│   ├── mysql/          # MySQL Dockerfile
│   ├── nginx/          # NginX Dockerfile
│   ├── php/            # PHP Dockerfile
│   └── phpmyadmin/     # phpMyAdmin Dockerfile
├── public/             # Static files (images)
├── writable/           # Logs and sessions
├── backup.sql/         # SQL scripts for database initialization
├── docker-compose.yml  # Docker Compose configuration
└── README.md           # Project documentation
```

---

## 📸 **Screenshots**

### **Home Page**
![Home Page](https://github.com/user-attachments/assets/75042cd0-2af9-4bf5-997b-4e59ff36f028)

### **Menu Page**
![Menu Page](https://github.com/user-attachments/assets/7411788f-9f0d-4c67-b1cb-6d12af8f2823)

### **Chatbot Page**
![Admin Dashboard](https://github.com/user-attachments/assets/39355057-fba4-4ef9-b0ad-5a25b4fcf62e)

### **Admin Dashboard**
![Admin Dashboard](https://github.com/user-attachments/assets/b783d06c-7343-4395-82c9-9eb75def702f)

---

## 🧩 **Contributing**

We welcome contributions to make EatNow even better! Follow these steps:

1. Fork the repository.
2. Create a new branch:  
   ```bash
   git checkout -b feature/your-feature
   ```
3. Make your changes and commit:  
   ```bash
   git commit -m "Add your feature"
   ```
4. Push to the branch:  
   ```bash
   git push origin feature/your-feature
   ```
5. Open a Pull Request.

---

## 📄 **License**

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.

---

## 🌟 **Acknowledgements**

- Inspired by the need for efficient restaurant management.
- Special thanks to Mado Restaurant Brisbane.

---

## 📝 **Contact**

For questions or support, reach out at:  
📧 Email: [marsk27@163.com](mailto:marsk27@163.com)  
📌 GitHub: [marsk7](https://github.com/marsk7)  
