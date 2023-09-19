
-- INSERT 데이터 추가
INSERT INTO employees(emp_no, birth_date, first_name, last_name, gender, hire_date)
	VALUES (500002, 19910101, 'Meerkat', 'Green', 'M', 99990101);

-- 데이터 타입 변경
SELECT DATE_FORMAT(NOW(), '%Y-%m-%d') AS formatted_date;

-- 500000번 사원의 급여 데이터를 삽입해주세요.
INSERT INTO salaries (emp_no, salary, FROM_date, to_date)
	VALUES (500000, 10000, DATE_FORMAT(NOW(), '%Y-%m-%d'), 99990101);

-- 500000만번 사원의 소속 부서 데이터를 삽입해주세요
INSERT INTO dept_emp (emp_no, dept_no, from_date, to_date)
	VALUES (500000, 'd009', DATE_FORMAT(NOW(), '%Y-%m-%d'), 99990101);

-- 500000만번 사원의 직급 데이터를 삽입해주세요
INSERT INTO titles (emp_no, title, from_date, to_date)
	VALUES (500000, 'Engineer', DATE_FORMAT(NOW(), '%Y-%m-%d'), 99990101);

SELECT * FROM titles ORDER BY emp_no DESC limit 5;

SELECT * FROM employees order by emp_no DESC;