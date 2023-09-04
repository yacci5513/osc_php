-- 숫자 데이터 형식
-- INT : 4byte 정수, 범위 -21억 ~ +21억
-- BIGINT : 8byte 정수, 범위 +900경 ~ -900경
-- FLOAT : 4byte 실수, 소수점 아래 7자리까지 표현
-- DOUBLE : 8byte 실수, 소수점 아래 15자리까지 표현
-- DECIMAL : 5~15byte, 소수점 아래 자리를 지정가능 DECIMAL(6, 2)= xxxx.xx

-- 문자 데이터 형식
-- CHAR(n) : 1~255byte, n만큼 고정길이를 가지는 문자열
-- VARCHAR(n) : 1~65535byte, n만큼 가변길이를 가지는 문자열 - CHAR과 필요에따라 쓸수 있도록
-- LONGTEXT : 최대 4GB, text 데이터 값을 저장 
-- LONGBLOB : 최대 4GB, BLOB 데이터 값을 저장
-- ENUM(값1, 값2, 값3, ....) : 정해진 값만 입력 가능하도록 하는 데이터 형식 - UPDATE INSERT 속도로 인해 웬만하면 CHAR을 쓰고 설계서상에서 여기엔 뭐만 쓰도록 한다.

-- 날짜 및 시간 데이터 형식
-- DATE : 3byte, 'YYYYY-MM-DD' 1001-01-01 ~ 9999-12-31 날짜까지 저장
-- DATETIME : 8byte, 'YYYY-MM-DD hh:mi:ss' , 1001-01-01 00:00:00 ~ 9999-12-31 23:59:59 시간까지 저장 - 용량 고려해서 사용 할것
-- TIMESTAMP : 4byte, 'YYYY-MM-DD hh:mi:ss' , 1001-01-01 00:00:00 ~ 9999-12-31 23:59:59 시간까지 저장
-- ** 주의 **
-- DATETIME : 서버 시간에 상관없이 고정되는 데이터  타입
-- TIMESTAMP : 서버 시간에 따라 유동적으로 변하는 데이터 타입

-- JSON 데이터 형식 8byte 예)
-- '{
-- 	emp_no: 500000,
-- 	birth_date: 2023-01-01
-- }'
-- 