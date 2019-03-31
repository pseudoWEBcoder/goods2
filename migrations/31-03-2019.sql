CREATE TABLE item_statuses

(

  id      INTEGER

    primary key

  autoincrement,

  text    text,

  color   text,

  icon    text,

  updated int

);
ALTER TABLE items
  ADD COLUMN status_id;
DROP INDEX index_foreignkey_items_receipt;
CREATE INDEX index_foreignkey_items_receipt
  ON "items" (receipt_id);
CREATE TABLE "items_history"
(
  id       INTEGER PRIMARY KEY AUTOINCREMENT,
  items_id INTEGER,
  time     INTEGER,
  text     TEXT,
  diff     TEXT,
  CONSTRAINT items_history_items_id_fk FOREIGN KEY (items_id) REFERENCES items (id)
);
CREATE INDEX index_foreignkey_items_history_items
  ON "items_history" (items_id);
UPDATE main.items
set status_id = 3
WHERE "commit" IS NOT NULL;