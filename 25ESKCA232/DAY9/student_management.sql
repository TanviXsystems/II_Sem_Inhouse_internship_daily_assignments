CREATE DATABASE student_management;

USE student_management;

CREATE TABLE students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(150) UNIQUE NOT NULL,
    branch VARCHAR(50),
    cgpa DECIMAL(3,2),
    phone VARCHAR(15),
    city VARCHAR(60),
    photo VARCHAR(255),
    address TEXT,
    course VARCHAR(100),
    date_registered TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);