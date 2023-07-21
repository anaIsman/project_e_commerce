
CREATE TABLE users (id_user INT(11) AUTO_INCREMENT NOT NULL PRIMARY KEY,
              last_name VARCHAR(250) NOT NULL,
              first_name VARCHAR(250) NOT NULL,
              birthday DATE NOT NULL,
              password INT(100) NOT NULL,
              email VARCHAR(100) UNIQUE NOT NULL,
              admin TINYINT(1) NOT NULL 
              );
              

CREATE TABLE products (id_product INT(11) AUTO_INCREMENT NOT NULL PRIMARY KEY,
                       product_name VARCHAR(100) NOT NULL,
                       description TEXT NOT NULL,
                       product_quantity INT(11) NOT NULL,
                       product_picture VARCHAR(70) NOT NULL,
                       product_price INT(11) NOT NULL,
                       id_category INT(11) NOT NULL,
                       CONSTRAINT fk_categories FOREIGN KEY (id_category)REFERENCES categories(id_category)
                       );


CREATE TABLE orders (id_order INT(11) AUTO_INCREMENT NOT NULL PRIMARY KEY,
                     date_order DATETIME DEFAULT CURRENT_TIMESTAMP,
                     description TEXT NOT NULL,
                     CONSTRAINT fk_orders FOREIGN KEY (id_user) REFERENCES users(id_user)
                     );

CREATE TABLE categories (id_category INT(11) AUTO_INCREMENT NOT NULL PRIMARY KEY,
                         name_category VARCHAR(250) NOT NULL
                         );



CREATE TABLE product_order ( quantity INT(11) NOT NULL,
                       CONSTRAINT fk_products FOREIGN KEY (id_product) REFERENCES products (id_product),
                       CONSTRAINT fk_orders FOREIGN KEY (id_order) REFERENCES orders (id_order)
                       );
                     