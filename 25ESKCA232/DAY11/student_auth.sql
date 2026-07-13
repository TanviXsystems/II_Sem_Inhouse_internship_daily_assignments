CREATE DATABASE student_auth;

USE student_auth;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(120) UNIQUE NOT NULL,
    password VARCHAR(100) NOT NULL,
    profile_pic VARCHAR(255) DEFAULT 'avatar.png',
    last_login DATETIME DEFAULT NULL
);

INSERT INTO users(name,email,password,profile_pic)
VALUES
('Tanvi Goyal','tanvi@gmail.com','123456','avatar.png'),
('Rahul Sharma','rahul@gmail.com','rahul123','avatar.png');