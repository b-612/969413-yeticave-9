CREATE DATABASE yeti_cave

DEFAULT CHARACTER SET utf8;
USE yeti_cave;

CREATE TABLE category (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(128) UNIQUE,
  code VARCHAR(64) UNIQUE
);

CREATE UNIQUE INDEX category_id ON category(id);
CREATE UNIQUE INDEX category_name ON category(name);

CREATE TABLE user (
  id INT AUTO_INCREMENT PRIMARY KEY,
  reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  email VARCHAR(128) NOT NULL UNIQUE,
  name VARCHAR(128) NOT NULL UNIQUE,
  password VARCHAR(128),
  avatar VARCHAR(512),
  contacts VARCHAR(1000)
);

CREATE UNIQUE INDEX user_id ON user(id);
CREATE UNIQUE INDEX user_email ON user(email);
CREATE INDEX user_name ON user(name);
CREATE INDEX reg_date ON user(reg_date);
CREATE FULLTEXT INDEX user_contacts ON user(contacts);

CREATE TABLE lot (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT,
  FOREIGN KEY(user_id) REFERENCES user(id),
  cat_id INT,
  FOREIGN KEY(cat_id) REFERENCES category(id),
  winner_id INT UNSIGNED,
  date_add TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  name VARCHAR(256),
  description VARCHAR(1000),
  img VARCHAR(512),
  start_price INT UNSIGNED,
  completion_date TIMESTAMP,
  bet_rate TINYINT UNSIGNED
);

CREATE UNIQUE INDEX lot_id ON lot(id);
CREATE INDEX lot_date ON lot(date_add);
CREATE FULLTEXT INDEX name_description ON lot(name,description);
CREATE INDEX lot_start_price ON lot(start_price);
CREATE INDEX lot_completion_date ON lot(completion_date);
CREATE INDEX lot_bet_rate ON lot(bet_rate);

CREATE TABLE rate (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    FOREIGN KEY(user_id) REFERENCES user(id),
    lot_id INT,
    FOREIGN KEY(lot_id) REFERENCES lot(id),
    date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    rate INT UNSIGNED
);

CREATE UNIQUE INDEX rate_id ON rate(id);
CREATE INDEX rate_date ON rate(date);
CREATE INDEX rate_rate ON rate(rate);
