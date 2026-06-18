# ⚔️ RPG To-Do List 🛡️

Organize your daily tasks as if they were epic quests in a classic RPG! This is a task management web application (*To-Do List*) built with PHP following the MVC (Model-View-Controller) architecture, featuring a retro gaming aesthetic.

---

## 🚀 Features

* **Retro RPG Aesthetics:** Pixel-art style interface and visual components reminiscent of classic video game menus.
* **Quest Management (CRUD):** Create, view, edit, and delete your pending "quests" (tasks).
* **Responsive Design:** Fully adapted for both mobile and desktop screens via Tailwind CSS.

---

## 🛠️ Technologies

* **Backend:** PHP 8 
* **Frontend:** HTML5, Tailwind CSS
* **Data Storage:** JSON (File-based data persistence)
* **Recommended Local Server:** XAMPP 

---

## 📁 Project Structure

Main structure:

```text
├── app/
│   ├── controllers/
│   │     └── TaskController.php          
│   ├── models/
│   │     └── TaskModel.php           
│   └── views/            
│       ├── layouts/
│       │     └── layout.phtml       
│       └── scripts/
│              └── task/
│                  ├── create.phtml
│                  ├── edit.phtml
│                  ├── index.phtml
│                  └── show.phtml    
├── config/
│   └── routes.php
├── data/
│   └── tasks.json             
├── lib/
│   └── base/
│       ├── Controller.php
│       ├── Router.php
│       └── View.php                  
├── web/
│   ├── images/
│   └── index.php                
│
└── README.md
```

---

## Usage
## 🚀 Installation

1. Clone the repository:

```bash
git clone https://github.com/miriamsanc/Tasca-S3.03---App-TO-DO.git
```

2. Configure the Web Server (XAMPP)
Since the application's entry point is inside the web/ folder, make sure your local server points to it, or access it directly through the browser URL.

3. Run it in your Browser
Open the XAMPP Control Panel, start the Apache module, and visit:

```
http://localhost/rpg-todo-list/web/
```


---

## 📸 Preview

### Index
<img width="1563" height="872" alt="Home" src="https://github.com/user-attachments/assets/007be806-04e7-494d-be37-f03cb5596683" />

<img width="1840" height="852" alt="Home2" src="https://github.com/user-attachments/assets/97b5c511-0790-40b1-bd26-851527082f94" />


### Create Task

<img width="1484" height="950" alt="create" src="https://github.com/user-attachments/assets/72c22c31-64bc-46d6-afaa-a0346887299c" />


### Edit Task

<img width="1372" height="945" alt="edit" src="https://github.com/user-attachments/assets/9650d643-ea9b-4eeb-a938-0427c626e3ec" />


### Show Task

<img width="1415" height="746" alt="show" src="https://github.com/user-attachments/assets/444275a3-4868-4b98-a691-baa9e31d666d" />








