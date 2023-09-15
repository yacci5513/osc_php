-- DELETE의 기본 구조
-- DELETE FORM 테이블명
-- WHERE 조건
-- **추가설명 : 조건을 적지않을 경우 모든 레코드가 삭제 됩니다. 
--  			실수를 방지하기위해 WHERE절을 먼저 작성하고 DELETE FROM 절을 작성합니다.
INSERT INTO departments (
	dept_to
	,dept_name )
VALUES (
	'd010'
	,'new'
	);
SELECT * FROM departments;

DELETE FROM
WHERE dept_no = 'd010';

SELECT dept_no = 'd010';

SELECT * FROM departments;

-- 사원정보테이블에서 사원 번호가 500001이상인 사원의 데이터를 모두 삭제해주세요.

DELETE FROM employees
WHERE emp_no >= 500001 ;

COMMIT;