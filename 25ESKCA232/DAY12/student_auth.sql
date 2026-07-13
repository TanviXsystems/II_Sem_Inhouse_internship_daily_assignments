CREATE DATABASE student_auth;

USE student_auth;

CREATE TABLE users(
id INT AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(100) NOT NULL,
email VARCHAR(100) UNIQUE NOT NULL,
password VARCHAR(255) NOT NULL,
profile_pic VARCHAR(255) DEFAULT 'avatar.png',
last_login DATETIME
);

INSERT INTO users(name,email,password)
VALUES
('Tanvi Goyal','tanvi@gmail.com','123456'),
('Rahul Sharma','rahul@gmail.com','rahul123');


CREATE TABLE students(

id INT AUTO_INCREMENT PRIMARY KEY,

student_id VARCHAR(20),

name VARCHAR(100),

branch VARCHAR(100),

course VARCHAR(100),

cgpa DECIMAL(3,2),

email VARCHAR(100)

);

INSERT INTO students(student_id,name,branch,course,cgpa,email)
VALUES

('SKIT001','Aarav Sharma','CSE','B.Tech AI',9.32,'aarav@gmail.com'),

('SKIT002','Diya Gupta','IT','B.Tech',8.90,'diya@gmail.com'),

('SKIT003','Vihaan Mehta','ECE','B.Tech',8.76,'vihaan@gmail.com'),

('SKIT004','Ananya Singh','CSE','B.Tech AI',9.51,'ananya@gmail.com'),

('SKIT005','Rohan Verma','ME','B.Tech',8.10,'rohan@gmail.com'),

('SKIT006','Sneha Kapoor','Civil','B.Tech',8.95,'sneha@gmail.com'),

('SKIT007','Kabir Jain','CSE','B.Tech AI',9.15,'kabir@gmail.com'),

('SKIT008','Ishita Agarwal','IT','B.Tech',8.73,'ishita@gmail.com'),

('SKIT009','Aditya Joshi','ECE','B.Tech',8.41,'aditya@gmail.com'),

('SKIT010','Meera Saxena','CSE','B.Tech AI',9.67,'meera@gmail.com');