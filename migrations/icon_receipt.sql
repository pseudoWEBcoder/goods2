CREATE TABLE icon_receipt
(
    id         integer NOT NULL
        CONSTRAINT icon_receipt_pk
            PRIMARY KEY AUTOINCREMENT,
    icon_id    int
        REFERENCES icons,
    receipt_id int
        REFERENCES receipt
);


