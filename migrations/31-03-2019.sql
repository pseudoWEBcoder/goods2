UPDATE comment
SET time = NULL, text = 'коммент', items_id = 4402
WHERE id = 19;
INSERT INTO comment (id, time, text, items_id) VALUES (20, NULL, 'rjvvttyn', 4402);
INSERT INTO comment (id, time, text, items_id) VALUES (21, NULL, '123133', 4402);
INSERT INTO comment (id, time, text, items_id) VALUES (22, NULL, 'комментарий', 4402);
INSERT INTO comment (id, time, text, items_id) VALUES (23, 1553989544, 'написать кеоммент', 4402);
INSERT INTO comment (id, time, text, items_id) VALUES (24, 1553990476, 'нормально пишутся комменты  чо  ', 4402);
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
INSERT INTO item_statuses (id, text, color, icon, updated) VALUES (2, 'свежесоздано', '', '', 1553993526);
INSERT INTO item_statuses (id, text, color, icon, updated) VALUES (3, 'OK', 'success', '', 1553996074);
INSERT INTO item_statuses (id, text, color, icon, updated) VALUES (4, 'fail', 'danger', '', 1553996101);
ALTER TABLE items
  ADD COLUMN status_id;
DROP INDEX index_foreignkey_items_receipt;
UPDATE items
SET status_id = 3
WHERE id = 1;
UPDATE items
SET status_id = 3
WHERE id = 2;
UPDATE items
SET status_id = 3
WHERE id = 79;
UPDATE items
SET status_id = 3
WHERE id = 2955;
UPDATE items
SET status_id = 3
WHERE id = 2960;
UPDATE items
SET status_id = 3
WHERE id = 3664;
UPDATE items
SET status_id = 3
WHERE id = 3708;
UPDATE items
SET status_id = 3
WHERE id = 3776;
UPDATE items
SET status_id = 3
WHERE id = 3887;
UPDATE items
SET status_id = 3
WHERE id = 3897;
UPDATE items
SET status_id = 3
WHERE id = 3898;
UPDATE items
SET status_id = 3
WHERE id = 3929;
UPDATE items
SET status_id = 3
WHERE id = 3930;
UPDATE items
SET status_id = 3
WHERE id = 3931;
UPDATE items
SET status_id = 3
WHERE id = 3932;
UPDATE items
SET status_id = 3
WHERE id = 3940;
UPDATE items
SET status_id = 3
WHERE id = 3951;
UPDATE items
SET status_id = 3
WHERE id = 3952;
UPDATE items
SET status_id = 3
WHERE id = 3953;
UPDATE items
SET status_id = 3
WHERE id = 3954;
UPDATE items
SET status_id = 3
WHERE id = 3957;
UPDATE items
SET status_id = 3
WHERE id = 3958;
UPDATE items
SET status_id = 3
WHERE id = 3959;
UPDATE items
SET status_id = 3
WHERE id = 3965;
UPDATE items
SET status_id = 3
WHERE id = 3966;
UPDATE items
SET status_id = 3
WHERE id = 3968;
UPDATE items
SET status_id = 3
WHERE id = 3969;
UPDATE items
SET status_id = 3
WHERE id = 3973;
UPDATE items
SET status_id = 3
WHERE id = 3974;
UPDATE items
SET status_id = 3
WHERE id = 3975;
UPDATE items
SET status_id = 3
WHERE id = 3976;
UPDATE items
SET status_id = 3
WHERE id = 3980;
UPDATE items
SET status_id = 3
WHERE id = 3981;
UPDATE items
SET status_id = 3
WHERE id = 3982;
UPDATE items
SET status_id = 3
WHERE id = 3988;
UPDATE items
SET status_id = 3
WHERE id = 3989;
UPDATE items
SET status_id = 3
WHERE id = 3991;
UPDATE items
SET status_id = 3
WHERE id = 4001;
UPDATE items
SET status_id = 3
WHERE id = 4016;
UPDATE items
SET status_id = 3
WHERE id = 4017;
UPDATE items
SET status_id = 3
WHERE id = 4028;
UPDATE items
SET status_id = 3
WHERE id = 4040;
UPDATE items
SET status_id = 3
WHERE id = 4044;
UPDATE items
SET status_id = 3
WHERE id = 4051;
UPDATE items
SET status_id = 3
WHERE id = 4054;
UPDATE items
SET status_id = 3
WHERE id = 4090;
UPDATE items
SET status_id = 3
WHERE id = 4093;
UPDATE items
SET status_id = 3
WHERE id = 4094;
UPDATE items
SET status_id = 3
WHERE id = 4095;
UPDATE items
SET status_id = 3
WHERE id = 4096;
UPDATE items
SET status_id = 3
WHERE id = 4101;
UPDATE items
SET status_id = 3
WHERE id = 4106;
UPDATE items
SET status_id = 3
WHERE id = 4107;
UPDATE items
SET status_id = 3
WHERE id = 4108;
UPDATE items
SET status_id = 3
WHERE id = 4111;
UPDATE items
SET status_id = 3
WHERE id = 4112;
UPDATE items
SET status_id = 3
WHERE id = 4113;
UPDATE items
SET status_id = 3
WHERE id = 4114;
UPDATE items
SET status_id = 3
WHERE id = 4115;
UPDATE items
SET status_id = 3
WHERE id = 4119;
UPDATE items
SET status_id = 3
WHERE id = 4122;
UPDATE items
SET status_id = 3
WHERE id = 4124;
UPDATE items
SET status_id = 3
WHERE id = 4126;
UPDATE items
SET status_id = 3
WHERE id = 4129;
UPDATE items
SET status_id = 3
WHERE id = 4132;
UPDATE items
SET status_id = 3
WHERE id = 4139;
UPDATE items
SET status_id = 3
WHERE id = 4146;
UPDATE items
SET status_id = 3
WHERE id = 4152;
UPDATE items
SET status_id = 3
WHERE id = 4154;
UPDATE items
SET status_id = 3
WHERE id = 4155;
UPDATE items
SET status_id = 3
WHERE id = 4161;
UPDATE items
SET status_id = 3
WHERE id = 4173;
UPDATE items
SET status_id = 3
WHERE id = 4175;
UPDATE items
SET status_id = 3
WHERE id = 4176;
UPDATE items
SET status_id = 3
WHERE id = 4177;
UPDATE items
SET status_id = 3
WHERE id = 4178;
UPDATE items
SET status_id = 3
WHERE id = 4179;
UPDATE items
SET status_id = 3
WHERE id = 4184;
UPDATE items
SET status_id = 3
WHERE id = 4185;
UPDATE items
SET status_id = 3
WHERE id = 4186;
UPDATE items
SET status_id = 3
WHERE id = 4188;
UPDATE items
SET status_id = 3
WHERE id = 4191;
UPDATE items
SET status_id = 3
WHERE id = 4192;
UPDATE items
SET status_id = 3
WHERE id = 4193;
UPDATE items
SET status_id = 3
WHERE id = 4196;
UPDATE items
SET status_id = 3
WHERE id = 4198;
UPDATE items
SET status_id = 3
WHERE id = 4201;
UPDATE items
SET status_id = 3
WHERE id = 4202;
UPDATE items
SET status_id = 3
WHERE id = 4203;
UPDATE items
SET status_id = 3
WHERE id = 4204;
UPDATE items
SET status_id = 3
WHERE id = 4205;
UPDATE items
SET status_id = 3
WHERE id = 4208;
UPDATE items
SET status_id = 3
WHERE id = 4209;
UPDATE items
SET status_id = 3
WHERE id = 4210;
UPDATE items
SET status_id = 3
WHERE id = 4211;
UPDATE items
SET status_id = 3
WHERE id = 4212;
UPDATE items
SET status_id = 3
WHERE id = 4214;
UPDATE items
SET status_id = 3
WHERE id = 4215;
UPDATE items
SET status_id = 3
WHERE id = 4216;
UPDATE items
SET status_id = 3
WHERE id = 4217;
UPDATE items
SET status_id = 3
WHERE id = 4221;
UPDATE items
SET status_id = 3
WHERE id = 4223;
UPDATE items
SET status_id = 3
WHERE id = 4224;
UPDATE items
SET status_id = 3
WHERE id = 4226;
UPDATE items
SET status_id = 3
WHERE id = 4227;
UPDATE items
SET status_id = 3
WHERE id = 4228;
UPDATE items
SET status_id = 3
WHERE id = 4229;
UPDATE items
SET status_id = 3
WHERE id = 4260;
UPDATE items
SET status_id = 3
WHERE id = 4261;
UPDATE items
SET status_id = 3
WHERE id = 4265;
UPDATE items
SET status_id = 3
WHERE id = 4266;
UPDATE items
SET status_id = 3
WHERE id = 4289;
UPDATE items
SET status_id = 3
WHERE id = 4290;
UPDATE items
SET status_id = 3
WHERE id = 4291;
UPDATE items
SET status_id = 3
WHERE id = 4292;
UPDATE items
SET status_id = 3
WHERE id = 4294;
UPDATE items
SET status_id = 3
WHERE id = 4296;
UPDATE items
SET status_id = 3
WHERE id = 4297;
UPDATE items
SET status_id = 3
WHERE id = 4298;
UPDATE items
SET status_id = 3
WHERE id = 4299;
UPDATE items
SET status_id = 3
WHERE id = 4300;
UPDATE items
SET status_id = 3
WHERE id = 4321;
UPDATE items
SET status_id = 3
WHERE id = 4322;
UPDATE items
SET status_id = 3
WHERE id = 4323;
UPDATE items
SET status_id = 3
WHERE id = 4326;
UPDATE items
SET status_id = 3
WHERE id = 4332;
UPDATE items
SET status_id = 3
WHERE id = 4333;
UPDATE items
SET status_id = 3
WHERE id = 4334;
UPDATE items
SET status_id = 3
WHERE id = 4335;
UPDATE items
SET status_id = 3
WHERE id = 4337;
UPDATE items
SET status_id = 3
WHERE id = 4342;
UPDATE items
SET modifiers = '', properties = ''
WHERE id = 4356;
UPDATE items
SET status_id = 3
WHERE id = 4357;
UPDATE items
SET "commit" = NULL
WHERE id = 4358;
UPDATE items
SET status_id = 3
WHERE id = 4359;
UPDATE items
SET status_id = 3
WHERE id = 4361;
UPDATE items
SET status_id = 3
WHERE id = 4363;
UPDATE items
SET status_id = 3
WHERE id = 4365;
UPDATE items
SET "commit" = NULL
WHERE id = 4368;
UPDATE items
SET status_id = 3
WHERE id = 4369;
UPDATE items
SET status_id = 3
WHERE id = 4370;
UPDATE items
SET status_id = 3
WHERE id = 4375;
UPDATE items
SET status_id = 3
WHERE id = 4376;
UPDATE items
SET status_id = 3
WHERE id = 4377;
UPDATE items
SET "commit" = NULL
WHERE id = 4388;
UPDATE items
SET status_id = 3
WHERE id = 4390;
UPDATE items
SET status_id = 3
WHERE id = 4393;
UPDATE items
SET status_id = 3
WHERE id = 4394;
UPDATE items
SET status_id = 3
WHERE id = 4396;
UPDATE items
SET modifiers = '', properties = '', "commit" = 1554002431, status_id = 3
WHERE id = 4402;
UPDATE items
SET "commit" = 1553999816, status_id = 3
WHERE id = 4403;
UPDATE items
SET "commit" = NULL, status_id = 4
WHERE id = 4404;
/*DELETE FROM items WHERE id=4405;
DELETE FROM items WHERE id=4406;
DELETE FROM items WHERE id=4407;
DELETE FROM items WHERE id=4408;
DELETE FROM items WHERE id=4409;
DELETE FROM items WHERE id=4410;
DELETE FROM items WHERE id=4411;
DELETE FROM items WHERE id=4412;
DELETE FROM items WHERE id=4413;
DELETE FROM items WHERE id=4414;
DELETE FROM items WHERE id=4415;
DELETE FROM items WHERE id=4416;
DELETE FROM items WHERE id=4417;
DELETE FROM items WHERE id=4418;
DELETE FROM items WHERE id=4419;
DELETE FROM items WHERE id=4420;
DELETE FROM items WHERE id=4421;
DELETE FROM items WHERE id=4422;
DELETE FROM items WHERE id=4423;
DELETE FROM items WHERE id=4424;
DELETE FROM items WHERE id=4425;
DELETE FROM items WHERE id=4426;
DELETE FROM items WHERE id=4427;
DELETE FROM items WHERE id=4428;
DELETE FROM items WHERE id=4429;
DELETE FROM items WHERE id=4430;
DELETE FROM items WHERE id=4431;
DELETE FROM items WHERE id=4432;
DELETE FROM items WHERE id=4433;
DELETE FROM items WHERE id=4434;
DELETE FROM items WHERE id=4435;
DELETE FROM items WHERE id=4436;
DELETE FROM items WHERE id=4437;
DELETE FROM items WHERE id=4438;
DELETE FROM items WHERE id=4439;
DELETE FROM items WHERE id=4440;
DELETE FROM items WHERE id=4441;
DELETE FROM items WHERE id=4442;
DELETE FROM items WHERE id=4443;
DELETE FROM items WHERE id=4444;
DELETE FROM items WHERE id=4445;
DELETE FROM items WHERE id=4446;
DELETE FROM items WHERE id=4447;
DELETE FROM items WHERE id=4448;
DELETE FROM items WHERE id=4449;
DELETE FROM items WHERE id=4450;
DELETE FROM items WHERE id=4451;
DELETE FROM items WHERE id=4452;
DELETE FROM items WHERE id=4453;
DELETE FROM items WHERE id=4454;
DELETE FROM items WHERE id=4455;
DELETE FROM items WHERE id=4456;
DELETE FROM items WHERE id=4457;
DELETE FROM items WHERE id=4458;
DELETE FROM items WHERE id=4459;
DELETE FROM items WHERE id=4460;
DELETE FROM items WHERE id=4461;
DELETE FROM items WHERE id=4462;
DELETE FROM items WHERE id=4463;
DELETE FROM items WHERE id=4464;
DELETE FROM items WHERE id=4465;
DELETE FROM items WHERE id=4466;
DELETE FROM items WHERE id=4467;
DELETE FROM items WHERE id=4468;
DELETE FROM items WHERE id=4469;
DELETE FROM items WHERE id=4470;
DELETE FROM items WHERE id=4471;
DELETE FROM items WHERE id=4472;
DELETE FROM items WHERE id=4473;
DELETE FROM items WHERE id=4474;
DELETE FROM items WHERE id=4475;
DELETE FROM items WHERE id=4476;
DELETE FROM items WHERE id=4477;
DELETE FROM items WHERE id=4478;
DELETE FROM items WHERE id=4479;
DELETE FROM items WHERE id=4480;
DELETE FROM items WHERE id=4481;
DELETE FROM items WHERE id=4482;
DELETE FROM items WHERE id=4483;
DELETE FROM items WHERE id=4484;
DELETE FROM items WHERE id=4485;
DELETE FROM items WHERE id=4486;
DELETE FROM items WHERE id=4487;
DELETE FROM items WHERE id=4488;
DELETE FROM items WHERE id=4489;
DELETE FROM items WHERE id=4490;
DELETE FROM items WHERE id=4491;
DELETE FROM items WHERE id=4492;
DELETE FROM items WHERE id=4493;
DELETE FROM items WHERE id=4494;
DELETE FROM items WHERE id=4495;
DELETE FROM items WHERE id=4496;
DELETE FROM items WHERE id=4497;
DELETE FROM items WHERE id=4498;
DELETE FROM items WHERE id=4499;
DELETE FROM items WHERE id=4500;
DELETE FROM items WHERE id=4501;
DELETE FROM items WHERE id=4502;
DELETE FROM items WHERE id=4503;
DELETE FROM items WHERE id=4504;
DELETE FROM items WHERE id=4505;
DELETE FROM items WHERE id=4506;
DELETE FROM items WHERE id=4507;
DELETE FROM items WHERE id=4508;
DELETE FROM items WHERE id=4509;
DELETE FROM items WHERE id=4510;
DELETE FROM items WHERE id=4511;*/
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
INSERT INTO items_history (id, items_id, time, text, diff) VALUES
  (1, 4402, 1553997741, '/web/index.php?r=items%2Fupdate&id=4402&_=1553997647388',
   '{"attributes":{"id":4402,"created":"1553475056","updated":"1553475056","quantity":"1","price":"17900","name":"\u0421\u0418\u0413\u0410\u0420\u0415\u0422\u042b \u041f\u0410\u0420\u041b\u0410\u041c\u0415\u041d\u0422 \u041f\u041b\u0410\u0422\u0418\u041d\u0423\u041c \u0411\u041b\u042e 1\u041f\u0410\u0427\u041a\u0410                          ","nds_sum":"","nds_rate":"","sum":"17900","receipt_id":"543","nds18":"2983","nds10":"","calculation_type_sign":"","calculation_subject_sign":"","modifiers":"","nds_no":"","payment_type":"","nds":"","nds_calculated10":"","nds_calculated18":"","properties":"","payment_agent_by_product_type":"","product_type":"","excise":"","commit":"1553985124","status_id":"2"},"dirtyAttributes":{"created":"1553475056","updated":"1553475056","price":"17900","nds_sum":"","nds_rate":"","sum":"17900","receipt_id":"543","nds18":"2983","nds10":"","calculation_type_sign":"","calculation_subject_sign":"","nds_no":"","payment_type":"","nds":"","nds_calculated10":"","nds_calculated18":"","payment_agent_by_product_type":"","product_type":"","excise":"","commit":"1553985124","status_id":"2"}}');
INSERT INTO items_history (id, items_id, time, text, diff) VALUES
  (2, 4402, 1553998235, '/web/index.php?r=items%2Fupdate&id=4402&_=1553997647389',
   '{"attributes":{"id":4402,"created":"1553475056","updated":"1553475056","quantity":"1","price":"17900","name":"\u0421\u0418\u0413\u0410\u0420\u0415\u0422\u042b \u041f\u0410\u0420\u041b\u0410\u041c\u0415\u041d\u0422 \u041f\u041b\u0410\u0422\u0418\u041d\u0423\u041c \u0411\u041b\u042e 1\u041f\u0410\u0427\u041a\u0410                          ","nds_sum":"","nds_rate":"","sum":"17900","receipt_id":"543","nds18":"2983","nds10":"","calculation_type_sign":"","calculation_subject_sign":"","modifiers":"","nds_no":"","payment_type":"","nds":"","nds_calculated10":"","nds_calculated18":"","properties":"","payment_agent_by_product_type":"","product_type":"","excise":"","commit":"1553985124","status_id":"4"},"changedAttributes":{"created":1553475056,"updated":1553475056,"price":17900,"nds_sum":null,"nds_rate":null,"sum":17900,"receipt_id":543,"nds18":2983,"nds10":null,"calculation_type_sign":null,"calculation_subject_sign":null,"nds_no":null,"payment_type":null,"nds":null,"nds_calculated10":null,"nds_calculated18":null,"payment_agent_by_product_type":null,"product_type":null,"excise":null,"commit":1553985124,"status_id":2}}');
INSERT INTO items_history (id, items_id, time, text, diff) VALUES
  (3, 4403, 1553998755, '/web/index.php?r=items%2Fcommit&id=4403&_=1553997647391',
   '{"new":{"commit":1553998754,"status_id":3},"old":{"commit":null,"status_id":null}}');
INSERT INTO items_history (id, items_id, time, text, diff) VALUES
  (4, 4403, 1553998762, '/web/index.php?r=items%2Fdelete&id=4403',
   '{"new":{"commit":null},"old":{"commit":1553998754}}');
INSERT INTO items_history (id, items_id, time, text, diff) VALUES
  (5, 4402, 1553999396, '/web/index.php?r=items%2Fcommit&id=4402&status=fail&_=1553999388411',
   '{"new":{"commit":1553999396},"old":{"commit":1553985124}}');
INSERT INTO items_history (id, items_id, time, text, diff) VALUES
  (6, 4403, 1553999816, '/web/index.php?r=items%2Fcommit&id=4403&_=1553999733501',
   '{"new":{"commit":1553999816},"old":{"commit":null}}');
INSERT INTO items_history (id, items_id, time, text, diff) VALUES
  (7, 4402, 1554002431, '/web/index.php?r=items%2Fcommit&id=4402&_=1554001370578',
   '{"new":{"commit":1554002431},"old":{"commit":1553999396}}');
INSERT INTO items_history (id, items_id, time, text, diff) VALUES
  (8, 4404, 1554002460, '/web/index.php?r=items%2Fcommit&id=4404&status=fail&_=1554001370579',
   '{"new":{"commit":1554002460,"status_id":4},"old":{"commit":null,"status_id":null}}');
INSERT INTO items_history (id, items_id, time, text, diff) VALUES
  (9, 4404, 1554002470, '/web/index.php?r=items%2Fdelete&id=4404',
   '{"new":{"commit":null},"old":{"commit":1554002460}}');
INSERT INTO items_history (id, items_id, time, text, diff) VALUES
  (10, 4356, 1554002487, '/web/index.php?r=items%2Fupdate&id=4356&_=1554001370581',
   '{"new":{"created":"1553212101","updated":"1553212101","price":"131766","nds_sum":"2723","nds_rate":"1","sum":"16339","receipt_id":"542","nds18":"","nds10":"","calculation_type_sign":"4","calculation_subject_sign":"1","modifiers":"","nds_no":"","payment_type":"","nds":"","nds_calculated10":"","nds_calculated18":"","properties":"","payment_agent_by_product_type":"","product_type":"","excise":"","commit":"1553485461","status_id":""},"old":{"created":1553212101,"updated":1553212101,"price":131766,"nds_sum":2723,"nds_rate":1,"sum":16339,"receipt_id":542,"nds18":null,"nds10":null,"calculation_type_sign":4,"calculation_subject_sign":1,"modifiers":null,"nds_no":null,"payment_type":null,"nds":null,"nds_calculated10":null,"nds_calculated18":null,"properties":null,"payment_agent_by_product_type":null,"product_type":null,"excise":null,"commit":1553485461,"status_id":3}}');
CREATE INDEX index_foreignkey_items_history_items
  ON "items_history" (items_id);
DELETE FROM receipt
WHERE id = 544;
DELETE FROM receipt
WHERE id = 545;
DELETE FROM receipt
WHERE id = 546;
DELETE FROM receipt
WHERE id = 547;
DELETE FROM receipt
WHERE id = 548;
DELETE FROM receipt
WHERE id = 549;
DELETE FROM receipt
WHERE id = 550;
DELETE FROM receipt
WHERE id = 551;
DELETE FROM receipt
WHERE id = 552;
DELETE FROM sqlite_sequence
WHERE rowid = 2;
UPDATE sqlite_sequence
SET seq = 543
WHERE rowid = 3;
UPDATE sqlite_sequence
SET seq = 24
WHERE rowid = 4;
/*INSERT INTO sqlite_sequence (rowid, name, seq) VALUES (7, 'items', 4404);
INSERT INTO sqlite_sequence (rowid, name, seq) VALUES (8, 'item_statuses', 4);
INSERT INTO sqlite_sequence (rowid, name, seq) VALUES (10, 'items_history', 10);*/
