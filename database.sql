CREATE DATABASE jkt48_db;
USE jkt48_db;

CREATE TABLE members (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    generasi VARCHAR(20) NOT NULL,
    tanggal_lahir DATE NOT NULL,
    foto VARCHAR(255),
    deskripsi TEXT
);