-- WHERE 조건이 불안하면 SELECT 먼저 쳐서 확인하기
-- DELETE를 위한 departments에 값 추가
INSERT INTO departments(dept_no, dept_name)
	VALUES ('d010', 'parr');
	
-- 추가된 값 확인
SELECT * FROM departments ORDER BY dept_no ASC;

-- 데이터 삭제
DELETE FROM departments
WHERE dept_no='d010';

-- 사원정보테이블에서 사원번호가 500001 이상인 사원의 데이터를 모두 삭제해주세요.
DELETE FROM employees
WHERE emp_no>=500001;

-- 삭제된 값 확인
select * FROM employees ORDER BY emp_no DESC;