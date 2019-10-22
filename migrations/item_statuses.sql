--
-- Файл сгенерирован с помощью SQLiteStudio v3.2.1 в Вт окт 22 16:45:53 2019
--
-- Использованная кодировка текста: System
--
PRAGMA foreign_keys = off;
BEGIN TRANSACTION;
  
DROP TABLE item_statuses IF  EXISTS ;
-- Таблица: item_statuses
CREATE TABLE item_statuses (
    id      INTEGER PRIMARY KEY AUTOINCREMENT,
    text    TEXT,
    color   TEXT,
    icon    TEXT,
    updated INT
);

INSERT INTO item_statuses (
                              id,
                              text,
                              color,
                              icon,
                              updated
                          )
                          VALUES (
                              2,
                              'свежесоздано',
                              '',
                              '',
                              1553993526
                          );

INSERT INTO item_statuses (
                              id,
                              text,
                              color,
                              icon,
                              updated
                          )
                          VALUES (
                              3,
                              'OK',
                              'success',
                              'glyphicon glyphicon-ok-circle',
                              1553996074
                          );

INSERT INTO item_statuses (
                              id,
                              text,
                              color,
                              icon,
                              updated
                          )
                          VALUES (
                              4,
                              'fail',
                              'danger',
                              'glyphicon glyphicon-remove',
                              1553996101
                          );

INSERT INTO item_statuses (
                              id,
                              text,
                              color,
                              icon,
                              updated
                          )
                          VALUES (
                              5,
                              'открыто',
                              'info',
                              'glyphicon glyphicon-folder-open',
                              1571327765
                          );

INSERT INTO item_statuses (
                              id,
                              text,
                              color,
                              icon,
                              updated
                          )
                          VALUES (
                              6,
                              'этикетка наклеена',
                              'warning',
                              'glyphicon glyphicon-barcode',
                              1571404339
                          );


COMMIT TRANSACTION;
PRAGMA foreign_keys = on;
