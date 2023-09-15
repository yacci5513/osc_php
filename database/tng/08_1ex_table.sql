CREATE DATABASE user_information;
USE user_information;


CREATE TABLE user_information (
    user_no INT PRIMARY KEY AUTO_INCREMENT,
    user_id VARCHAR(30) UNIQUE NOT NULL,
    user_name VARCHAR(30) NOT NULL,
    addr VARCHAR(100) NOT NULL
);


CREATE TABLE points (
    user_no INT PRIMARY KEY,
    pt INT NOT NULL DEFAULT (0),
    CONSTRAINT fk_points_user_no FOREIGN KEY (user_no)
        REFERENCES user_information(user_no) ON DELETE CASCADE
);


CREATE TABLE product_list (
    pro_no INT PRIMARY KEY,
    pro_name VARCHAR(300) NOT NULL,
    po_price INT NOT NULL
);

CREATE TABLE order_list (
    user_no INT,
    order_number INT PRIMARY KEY,
    p_cnt INT NOT NULL,
    total_pay INT NOT NULL,
    pro_no INT UNIQUE NOT NULL,
    NO INT NOT NULL,
    CONSTRAINT fk_pro_no FOREIGN KEY (pro_no)
        REFERENCES product_list(pro_no) ON DELETE CASCADE,
    CONSTRAINT fk_order_list_user_no FOREIGN KEY (user_no)
);
    INSERT INTO user_information (user_id, user_name, addr)
    VALUES ('admin','blackcat','korea seoul');
    
    INSERT INTO points(user_no)
    VALUES(1);
    
   ALTER TABLE user_information ADD COLUMN age INT NOT NULL;
   
   ALTER TABLE user_information modify COLUMN user_name VARCHAR(50);  
   
   ALTER TABLE user_information drop COLUMN age;
   
   TRUNCATE TABLE user_information;
   
   
   