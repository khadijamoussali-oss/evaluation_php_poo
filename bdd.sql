CREATE DATABASE games CHARSET utf8mb4;

USE games;

CREATE TABLE console (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
    `name` VARCHAR(50) NOT NULL,
    manufacturer VARCHAR(50) NOT NULL
);

CREATE TABLE video_game (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
    title VARCHAR(50) NOT NULL,
    `type` VARCHAR(50) NOT NULL,
    publish_at DATE NOT NULL,
    id_console INT NOT NULL,
    FOREIGN KEY (id_console) REFERENCES console(id)
);

INSERT INTO console (`name`, manufacturer) VALUES
    ("PlayStation 5", "Sony"),
    ("Xbox Series X", "Microsoft"),
    ("Switch", "Nintendo"),
    ("Steam Deck", "Valve");
    
SELECT id, title, `type`, publish_at, id_console FROM video_game;