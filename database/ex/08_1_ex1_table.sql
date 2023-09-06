-- DDL
-- DDL은 트랜잭션 제어가 불가능하니 조심해서 사용할 것
-- 어차피 권한도 없을 가능성이 큼 신입: CRUD.. DML만 사용
-- PK(Primary Key) : 기본 키
-- NULL 불가, 중복 불가
-- auto increment
-- FK(Foreign Key) : 외래 키

-- ERD 상에서는 FK로 연결 하지만 현업에서는 FK를 물리적 설계를 하지 않는 경우도 있음
-- check 제약조건 현업에서는 적극적으로 사용하지 않는다

-- 회원 정보 테이블:회원번호, ID, 이름, 주소
-- 주문리스트 테이블: 회원번호,주문번호,상품번호,수량,결제 금액
-- 상품리스트 테이블: 상품번호, 상품명,상품가격
-- 포인트 테이블: 회원번호, 포인트
-- 식별관계와 비식별관계 차이 : 참조하는 테이블에서 PK로 쓸건지 안쓸건지 차이
CREATE DATABASE if NOT exists mem;
USE mem;
CREATE TABLE IF NOT EXISTS mem.members (
	mem_no INT PRIMARY KEY AUTO_INCREMENT
	,id VARCHAR(30) UNIQUE NOT NULL
   ,mem_name VARCHAR(30) NOT NULL
	,addr VARCHAR(100) NOT NULL
);

CREATE TABLE IF NOT EXISTS mem.points (
	mem_no INT PRIMARY KEY
	,pt INT NOT NULL DEFAULT(0)
	,CONSTRAINT fk_points_mem_no FOREIGN KEY(mem_no)
	REFERENCES members(mem_no) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS mem.products (
	product_no INT PRIMARY KEY
	,product_name VARCHAR(50) NOT NULL
	,product_price INT NOT NULL
);

CREATE TABLE IF NOT EXISTS mem.orders (
	order_no INT PRIMARY KEY
	,mem_no INT	NOT NULL
	,product_no INT NOT NULL
	,order_cnt INT NOT NULL
	,total_pay INT NOT NULL
	,CONSTRAINT fk_orders_mem_no FOREIGN KEY(mem_no)
	REFERENCES members(mem_no) ON DELETE CASCADE
	,CONSTRAINT fk_orders_product_no FOREIGN KEY(product_no)
	REFERENCES products(product_no) ON DELETE NO ACTION
);

INSERT INTO members(id,mem_name,addr)
VALUES ('admin','meerkat','korea deagu');
INSERT INTO points(mem_no)
VALUES (1);

-- ALTER
ALTER TABLE members ADD COLUMN age INT NOT NULL;
-- not null로 설정하면 원래 있던 데이터 값 조절 필요하니  조심
ALTER TABLE members MODIFY COLUMN mem_name VARCHAR(50) NOT null;
-- DBMS 마다 데이터타입 줄일때 오라클의 경우 에러를 뱉을수도 있다고 함(*아마도) ! ex)  varchar(50) -> varchar(30)
ALTER TABLE members DROP COLUMN age;
-- DROP
-- DROP TABLE points;
-- TRUNCATE
-- TRUNCATE TABLE members;

SELECT * FROM members;
SELECT * FROM points;