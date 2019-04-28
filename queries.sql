INSERT INTO category
(cat_name, class)
VALUES ("Доски и лыжи", "boards"),
      ("Крепления", "attachment"),
      ("Ботинки", "boots"),
      ("Одежда", "clothing"),
      ("Инструменты", "tools"),
      ("Разное", "other");

INSERT INTO user
(email, user_name, password, avatar, contacts)
VALUES ("firstuser@mail.ru", "First User", "password123", "img/avatar.jpg", "Адрес: Москва, Красная площадь, 2. Телефон: +79052138767"),
      ("second@mail.ru", "Second User", "password456", "img/avatar.jpg", "Адрес: Санкт-Петербург, пр. Ленина 7. Телефон: +79052138768"),
      ("petrpetrov@mail.ru", "Petr Petrov", "password321", "img/avatar.jpg", "Адрес: Владивосток, ул. Строителей 4, кв. 27. Телефон: +79052138769"),
      ("mihail@mail.ru", "Михаил", "password098", "img/avatar.jpg", "Адрес: Ярославль, Красная площадь, 3. Телефон: +79052138770"),
      ("google@mail.ru", "Представитель Гугл", "passwordGoogle", "img/avatar.jpg", "Адрес: New York, ул. Свободы, 11. Телефон: +79052138790");

INSERT INTO lot
(user_id, cat_id, lot_name, lot_description, img, start_price, completion_date, bet_rate)
VALUES (2, 1, "2014 Rossignol District Snowboard", "Хороший сноуборд", "img/lot-1.jpg", 10999, '2019-08-23 15:00:00', 100),
       (5, 1, "DC Ply Mens 2016/2017 Snowboard", "Легкий маневренный сноуборд, готовый дать жару в любом парке, растопив снег мощным щелчкоми четкими дугами. Стекловолокно Bi-Ax, уложенное в двух направлениях, наделяет этот снаряд отличной гибкостью и отзывчивостью, а симметричная геометрия в сочетании с классическим прогибом кэмбер позволит уверенно держать высокие скорости. А если к концу катального дня сил совсем не останется, просто посмотрите на Вашу доску и улыбнитесь, крутая графика от Шона Кливера еще никого не оставляла равнодушным.", "img/lot-2.jpg", 159999, '2019-07-03 21:30:00', 1000),
       (3, 2, "Крепления Union Contact Pro 2015 года размер L/XL", "Нормальные крепления", "img/lot-3.jpg", 8000, '2019-06-12 11:00:00', 200),
       (1, 3, "Ботинки для сноуборда DC Mutiny Charocal", "Хорошие ботинки, берите", "img/lot-4.jpg", 10999, '2019-05-30 16:25:00', 300),
       (4, 4, "Куртка для сноуборда DC Mutiny Charocal", "Теплая и надежная куртка, хорошо кататься", "img/lot-5.jpg", 7500, '2019-06-15 10:00:00', 100),
       (5, 6, "Маска Oakley Canopy", "Не пропускает ветер и защищает от солнца. Что надо", "img/lot-6.jpg", 5400, '2019-09-01 09:00:00', 150);

INSERT INTO rate
(user_id, lot_id, rate)
VALUES (1, 1, 15999),
       (2, 1, 16999);

# получить все категории
SELECT cat_name
FROM category;

# получить самые новые, открытые лоты. Каждый лот должен включать название, стартовую цену, ссылку на изображение, цену, название категории
SELECT lot.id AS lot_id, lot.date_add AS starting_date, lot.lot_name AS title, lot.start_price AS lot_start_price, lot.img AS picture, rate.MAX(rate) AS price, category.cat_name AS category
FROM lot
LEFT JOIN rate ON lot.id = rate.lot_id
JOIN category ON lot.cat_id = category.id
WHERE lot.completion_date > NOW()
GROUP BY lot.id, lot.date_add, lot.lot_name, lot.start_price, lot.img, category.cat_name
ORDER BY lot.date_add DESC;

# показать лот по его id. Получите также название категории, к которой принадлежит лот
SELECT lot.id AS lot_id, lot.lot_name AS title, category.cat_name AS category
FROM lot
JOIN category ON lot.cat_id = category.id;

# обновить название лота по его идентификатору
UPDATE lot
SET lot_name = "Куртка для сноуборда (и не только) DC Mutiny Charocal"
WHERE id = 5;

# получить список самых свежих ставок для лота по его идентификатору
SELECT *
FROM rate
WHERE lot_id = 1
ORDER BY id DESC;
