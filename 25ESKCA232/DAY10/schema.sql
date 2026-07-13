CREATE DATABASE campus_records;

USE campus_records;

CREATE TABLE learners (
    learner_id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(100) NOT NULL,
    email VARCHAR(120) UNIQUE NOT NULL,
    branch VARCHAR(80) NOT NULL,
    cgpa DECIMAL(3,2) NOT NULL,
    student_status ENUM('Active','Inactive') DEFAULT 'Active',
    photo VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ON UPDATE CURRENT_TIMESTAMP
);