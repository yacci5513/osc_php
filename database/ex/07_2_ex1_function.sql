-- 1. 데이터 타입 변환 함수
-- CAST ( 값 AS 데이터형식)
-- CONVERT ( 값, 데이터형식)
SELECT CAST (1234 AS CHAR(4));
SELECT CONVERT (1234, CHAR(4));

-- 2. 제어 흐름 함수
-- IF(수식, 참일 때, 거짓일 때) : 수식이 참 또는 거짓에 따라 결과를 분기하는 함수
SELECT e.emp_no, if(e.gender='M', '남자', '여자') AS gender-
FROM employees AS e;

-- IFNULL(수식1, 수식2) : 수식1이 NULL이면 수식2를 출력하고, NULL이 아니면 수식1을 반환
SELECT IFNULL(NULL, '수식2');

-- NULLIF(수식1, 수식2) : 수식1과 수식2가 같으면 NULL을 출력하고, 다르면 수식1을 반환