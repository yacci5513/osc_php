-- UPDATE의 기본 구조
-- UPDATE 테이블명
-- SET ( 컬럼1 = 값1, 컬럼2 = 값2)
-- WHERE 조건
-- ** 추가설명 : 조건을 적지않을 경우 모든 레코드가 수정됩니다.
--  					실수를 방지하기위해 WHERE절을 먼저 작성하고 SET절을 작성하는 습관을 들이면 좋음.

UPDATE  titles
SET title = 'ceo'		
WHERE emp_no = 500000;

-- 50만번UPDATE  titles

UPDATE  titles
SET title = 'Staff'	
WHERE emp_no = 500000;


UPDATE salaries
set salary = 25000		
WHERE emp_no = 500000;

SELECT *
FROM salaries
WHERE emp_no = 500000;


rollback


-- 500000번  사원의 직급을 'staff', 연봉을 '25000' 으로 수정해 주세요