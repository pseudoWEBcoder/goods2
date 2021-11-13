CREATE TABLE item_category (
    id          INTEGER PRIMARY KEY,
    item_id     INTEGER,
    category_id INTEGER
);

PRAGMA foreign_keys = 0;

CREATE TABLE sqlitestudio_temp_table AS SELECT *
                                          FROM item_category;

DROP TABLE item_category;

CREATE TABLE item_category (
    id          INTEGER PRIMARY KEY AUTOINCREMENT,
    item_id     INTEGER,
    category_id INTEGER
);

INSERT INTO item_category (
                              id,
                              item_id,
                              category_id
                          )
                          SELECT id,
                                 item_id,
                                 category_id
                            FROM sqlitestudio_temp_table;

DROP TABLE sqlitestudio_temp_table;

PRAGMA foreign_keys = 1;
