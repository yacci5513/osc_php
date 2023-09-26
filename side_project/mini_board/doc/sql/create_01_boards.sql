USE mini_board;
CREATE TABLE IF NOT EXISTS boards (
	b_id INT PRIMARY KEY AUTO_INCREMENT
	,b_title VARCHAR(100) NOT NULL
	,b_content VARCHAR(1000) NOT NULL
	,b_create_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
	,b_delete_flag CHAR(1) NOT NULL DEFAULT '0'
	,b_delete_at DATETIME DEFAULT NULL
);
