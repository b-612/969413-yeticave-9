CREATE DATABASE yeti_cave

DEFAULT CHARACTER SET utf8;
USE yeti_cave;

CREATE TABLE categories (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(128),
  class VARCHAR(64) UNIQUE
);

CREATE UNIQUE INDEX category_name ON categories(name);

CREATE TABLE user (
  id INT AUTO_INCREMENT PRIMARY KEY,
  reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  email VARCHAR(128) NOT NULL UNIQUE,
  user_name VARCHAR(128) NOT NULL,
  password VARCHAR(128),
  url VARCHAR(512),
  contacts VARCHAR(1000)
);

CREATE TABLE lot (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT,
  FOREIGN KEY(user_id) REFERENCES user(id),
  category_id INT,
  FOREIGN KEY(category_id) REFERENCES categories(id),
  winner_id INT,
  FOREIGN KEY(winner_id) REFERENCES user(id),
  date_add TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  name VARCHAR(256),
  description VARCHAR(1000),
  url VARCHAR(512),
  price INT UNSIGNED,
  completion_date TIMESTAMP,
  bet_rate SMALLINT
);

CREATE FULLTEXT INDEX idx_name_description ON lot(name, description);
CREATE INDEX idx_win_id_compl_date ON lot(winner_id, completion_date);
CREATE INDEX idx_lot_by_date_add ON lot(category_id, date_add DESC);


CREATE TABLE rate (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    FOREIGN KEY(user_id) REFERENCES user(id),
    lot_id INT,
    FOREIGN KEY(lot_id) REFERENCES lot(id),
    date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    rate INT
);
