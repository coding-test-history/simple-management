SQL_MODE := "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
time_zone := "+00:00";


CREATE TABLE customer (
  id int NOT NULL,
  name text NOT NULL,
  phone text NOT NULL,
  email text NOT NULL,
  address text NOT NULL
) ;


INSERT INTO customer (id, name, phone, email, address) VALUES
(4, 'Customer 05', '083333333333', 'customer03@gmail.com', 'Jl. Customer 03'),
(7, 'qwerty', 'qwerty', 'qwerty', 'qwerty');


CREATE TABLE item (
  id int NOT NULL,
  item_name text NOT NULL,
  price varchar(30) NOT NULL
) ;

CREATE TABLE transaction (
  id int NOT NULL,
  transaction_code int NOT NULL,
  item_id int NOT NULL,
  customer_id int NOT NULL,
  total varchar(30) NOT NULL,
  created_at timestamp NOT NULL DEFAULT current_timestamp()
) ;

CREATE TABLE user (
  id int NOT NULL,
  name text NOT NULL,
  username text NOT NULL,
  password text NOT NULL
) ;

INSERT INTO user (id, name, username, password) VALUES
(1, 'admin', 'administrator', '$2a$12$XIgwOQr360wetb8yoHY3w.ZW9WUS7JaOHuZsOXGwwwVwTT.T5QmWC');

ALTER TABLE customer
  ADD PRIMARY KEY (id);

ALTER TABLE item
  ADD PRIMARY KEY (id);


ALTER TABLE transaction
  ADD PRIMARY KEY (id);


ALTER TABLE user
  ADD PRIMARY KEY (id);


ALTER TABLE customer
  MODIFY id cast(11 as int) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

ALTER TABLE item
  MODIFY id cast(11 as int) NOT NULL AUTO_INCREMENT;

ALTER TABLE transaction
  MODIFY id cast(11 as int) NOT NULL AUTO_INCREMENT;


ALTER TABLE user
  MODIFY id cast(11 as int) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;
