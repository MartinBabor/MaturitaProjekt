CREATE DATABASE IF NOT EXISTS had;
USE had;

CREATE TABLE hraci (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(25) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    score INT DEFAULT 0
);


CREATE TABLE TopHraci (
    poradi INT AUTO_INCREMENT PRIMARY KEY,
    odehrano DATETIME DEFAULT NOW(),
    id INT NOT NULL,
    score INT NOT NULL,
    FOREIGN KEY (id) REFERENCES hraci(id)
);
select * from hraci;
DESC hraci;