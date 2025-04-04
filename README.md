# **SkillXpert** 🏆  
### **A Skill-Sharing Platform**  

SkillXpert is a web-based platform where users can connect, exchange skills, and collaborate through **live video sessions, chat, and skill matchmaking**.  

---

## **🌟 Features**  
### **👤 User Dashboard**  
✔ **Profile Management** – Update user profiles.  
✔ **Skill Exchange Requests** – Request and accept skill exchanges.  
✔ **Upcoming Live Sessions** – View scheduled sessions.  
✔ **Chatbox & Video Calls** – Built-in chat and video calling.  
✔ **Skill Posting & Search** – Post and find relevant skills.  
✔ **Pricing Plans** – Flexible subscription models.  

### **🔐 Authentication**  
✔ **Email & Password Login**  
✔ **Google, Facebook, LinkedIn Login**  
✔ **Forgot Password Feature**  

### **🛠 Admin Dashboard**  
✔ **User Management** – View, edit, and delete users.  
✔ **Message Management** – View and reply to messages.  
✔ **Skill Management** – Monitor posted skills.  
✔ **Website Analytics** – Trends & usage statistics.  

---

## **🛠 Tech Stack**  
- **Frontend:** HTML, CSS, JavaScript, Bootstrap  
- **Backend:** PHP & MySQL  
- **Live Video Calls:** Jitsi Meet API  
- **Real-time Chat:** WebSockets/Firebase  
- **Authentication:** OAuth (Google, Facebook, LinkedIn)  

---

## **🚀 Installation Guide**  
1️⃣ Clone the Repository  
```bash
 git clone https://github.com/improperboy/skillxpert.git
 cd skillxpert
```
2️⃣ Setup Database  
- Create a database named **skillxpert** in phpMyAdmin.  
- Import `database.sql`.  
3️⃣ Configure `config.php`:  
```php
<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "skillxpert";
$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
```
4️⃣ Start the Server  
```bash
 php -S localhost:8000
```
Or use **XAMPP** to start Apache & MySQL.  

---

## **📌 To-Do Features**  
✅ AI-Based Skill Recommendations  
✅ Mobile App Version  

---

## **📧 Contact**  
For queries, email: **support@skillxpert.com**  

---

## **📜 License**  
MIT License © 2025 SkillXpert  

---

