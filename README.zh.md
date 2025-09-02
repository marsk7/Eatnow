# **EatNow** 🍴  
[English](README.md) | [中文](README.zh.md)
> **一个基于二维码的点餐系统，打造无缝的用餐体验**

[![License](https://img.shields.io/github/license/marsk7/eatnow)](LICENSE)  
[![Version](https://img.shields.io/badge/version-1.0.0-blue)](https://github.com/marsk7/eatnow/releases)  
[![GitHub stars](https://img.shields.io/github/stars/marsk7/eatnow)](https://github.com/marsk7/eatnow/stargazers)  
<!-- [Live Demo](http://et-now.com/) | [Documentation](#) -->
---

## 📌 **项目简介**

**EatNow** 是一款现代化的网络应用，旨在简化餐厅的点餐流程。顾客可以通过扫描桌面上的二维码来查看菜单、下单、支付；餐厅员工则可以高效地管理订单并实时监控餐厅运作。

---

## 🎯 **核心功能**

- **二维码点餐**: 顾客通过二维码即可快速进入菜单。  
- **动态菜单管理**: 支持实时更新菜品、价格及库存。  
- **订单跟踪**: 顾客与后厨实时同步订单状态。  
- **支付集成**: 提供安全快捷的在线支付方式。  
- **后台管理面板**: 支持订单、菜单及用户角色的管理。  
- **自适应设计**: 支持桌面端、平板及移动端的无缝体验。

---

## 🛠️ **技术栈**

| **技术**    | **说明**                     |
|--------------------|-------------------------------------|
| **前段**       | HTML, CSS, JavaScript              |
| **后段**        | PHP, CodeIgniter                   |
| **数据库**       | MySQL                              |
| **服务器**         | Nginx                              |
| **容器化** | Docker + Docker Swarm             |
| **云端部署** | Google Cloud Platform (GCP)       |

---

## 🚀 **快速开始**

### **1. 环境依赖s**

- 已安装 Docker 和 Docker Compose
- 已配置 MySQL 数据库
- 已安装并配置 CodeIgniter 框架

### **2. 克隆仓库**

```bash
git clone https://github.com/marsk7/eatnow.git
cd eatnow
```
启用聊天机器人功能时，需要生成 OpenAI API Key 并在 .env 文件末尾添加：
```bash
OPENAI_API_KEY=sk-xxxx...
```

### **3. 构建并运行**

```bash
docker-compose up -d
```

### **4. 访问应用**

- **前端界面**: http://localhost
- **后台管理**: http://localhost/admin
  <!--
  - Default Admin Credentials:  
    - **Username**: `admin`  
    - **Password**: `password123`
    -->

---

## 📂 **项目结构**

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

## 📸 **界面截图**

### **首页**
![Home Page](https://github.com/user-attachments/assets/75042cd0-2af9-4bf5-997b-4e59ff36f028)

### **菜单页**
![Menu Page](https://github.com/user-attachments/assets/7411788f-9f0d-4c67-b1cb-6d12af8f2823)

### **聊天机器人**
![Admin Dashboard](https://github.com/user-attachments/assets/39355057-fba4-4ef9-b0ad-5a25b4fcf62e)

### **后台管理面板**
![Admin Dashboard](https://github.com/user-attachments/assets/b783d06c-7343-4395-82c9-9eb75def702f)

---

## 🧩 **贡献指南**

欢迎大家为 EatNow 项目贡献代码！请遵循以下步骤：

1. Fork仓库.
2. 创建新分支:  
   ```bash
   git checkout -b feature/your-feature
   ```
3. 修改代码并提交:  
   ```bash
   git commit -m "Add your feature"
   ```
4. 推送分支:  
   ```bash
   git push origin feature/your-feature
   ```
5. 提交 Pull Request.

---

## 📄 **开源许可证**

本项目基于 MIT License 开源协议，详情请参见 [LICENSE](LICENSE) 文件.

---

## 🌟 **致谢**

- 灵感来源：餐厅运营的数字化与高效化需求
- 特别感谢 Mado Restaurant Brisbane

---

## 📝 **联系方式**

如有任何问题或需要支持，请联系：  
📧 Email: [marsk27@163.com](mailto:marsk27@163.com)  
📌 GitHub: [marsk7](https://github.com/marsk7)  
