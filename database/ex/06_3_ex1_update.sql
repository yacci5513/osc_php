
-- UPDATE, DELETE할때 WHERE 조건 꼭 쓰고 맞는지 확인하기!
-- 예방하기 위해서 WHERE 부터 쓰는게 좋음
UPDATE titles
SET title = 'CEO'
WHERE emp_no = 500000;

-- 500000번 사원의 직급을 Staff, 연봉을 '25000'
UPDATE titles
SET title = 'Staff'
WHERE emp_no = 500000;

UPDATE salaries
SET salary = 25000
WHERE emp_no = 500000;

SELECT * FROM titles ORDER BY emp_no DESC;
SELECT * FROM salaries ORDER BY emp_no DESC;
