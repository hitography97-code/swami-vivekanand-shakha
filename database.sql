CREATE DATABASE IF NOT EXISTS swami_vivekanand_shakha;

USE swami_vivekanand_shakha;

CREATE TABLE IF NOT EXISTS students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    student_id VARCHAR(20) UNIQUE NOT NULL,
    full_name VARCHAR(100) NOT NULL,
    dob DATE NOT NULL,
    gender VARCHAR(20) NOT NULL,
    parent_name VARCHAR(100) NOT NULL,
    parent_mobile VARCHAR(15) NOT NULL,
    mobile VARCHAR(15),
    address TEXT NOT NULL,
    school_name VARCHAR(150),
    class_name VARCHAR(50),
    division VARCHAR(20),
    batch VARCHAR(50),
    joining_date DATE NOT NULL,
    hobbies VARCHAR(255),
    skills VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS attendance (
    id INT AUTO_INCREMENT PRIMARY KEY,
    student_id INT NOT NULL,
    attendance_date DATE NOT NULL,
    status ENUM('Present','Absent','Leave') NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    UNIQUE(student_id, attendance_date),

    FOREIGN KEY (student_id)
    REFERENCES students(id)
    ON DELETE CASCADE
);