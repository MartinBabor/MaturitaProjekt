CREATE DATABASE IF NOT EXISTS had;
USE had;

CREATE TABLE hraci (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(25) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);



CREATE TABLE TopHraci (
    id INT NOT NULL,
    time datetime NOT NULL default now(),
    score INT NOT NULL,
    FOREIGN KEY (id) REFERENCES hraci(id)
);