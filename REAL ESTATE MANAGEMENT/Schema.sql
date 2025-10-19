CREATE DATABASE IF NOT EXISTS realestate;
USE realestate;

CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) UNIQUE,
  password VARCHAR(255)
);

CREATE TABLE properties (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(100),
  description TEXT,
  price DECIMAL(12,2),
  address VARCHAR(255),
  image VARCHAR(255),
  type VARCHAR(50),
  bedrooms INT,
  bathrooms INT,
  size INT,
  posted_by INT,
  FOREIGN KEY (posted_by) REFERENCES users(id)
);

CREATE TABLE contacts (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100),
  email VARCHAR(100),
  message TEXT,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);