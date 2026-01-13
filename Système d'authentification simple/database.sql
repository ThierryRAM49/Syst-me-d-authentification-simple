

/* création de la base de données */
CREATE DATABASE tp_auth;

/* utilisation de la base de données */
USE tp_auth;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL, 
    
    -- Argon2 produit des hashs longs (souvent ~95 chars)
    hashsalt VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);