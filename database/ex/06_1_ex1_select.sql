USE employees;

SELECT * FROM dept_emp;
SELECT COUNT(*) FROM salaries;
SELECT first_name, last_name FROM employees;
SELECT emp_no AS 번호, title AS 직책 FROM titles;
SELECT * FROM employees ORDER BY emp_no DESC;
SELECT * FROM employees WHERE first_name='Mary';
SELECT * FROM employees WHERE first_name='Mary' AND emp_no BETWEEN 10005 AND 22000 ;
SELECT * FROM employees WHERE first_name LIKE('Ge%');
SELECT * FROM employees WHERE first_name LIKE('%Ge%');
SELECT * FROM titles WHERE title LIKE ('%staff%');
SELECT * FROM employees ORDER BY first_name DESC, last_name, birth_date ASC;
SELECT DISTINCT * FROM salaries;

SELECT * FROM salaries WHERE to_date >= 20230901;
SELECT SUM(salary) AS salary_sum FROM salaries WHERE to_date >= 20230901;
SELECT MAX(salary), MIN(salary), COUNT(emp_no) FROM salaries WHERE to_date >= 20230901;
SELECT COUNT(emp_no) AS 사원수 FROM employees WHERE first_name = 'Mary';

SELECT title, COUNT(title) FROM titles WHERE to_date >= 20230801  GROUP BY title;

SELECT CONCAT(first_name, ' ', last_name) AS fullname FROM employees;

SELECT emp_no, birth_date, CONCAT(first_name, ' ', last_name) AS fullname
FROM employees
WHERE gender = 'F'
ORDER BY fullname ASC;

SELECT * FROM employees ORDER BY emp_no LIMIT 10 OFFSET 10;

SELECT emp_no, salary FROM salaries WHERE to_date >= 20230901 ORDER BY salary DESC LIMIT 5;

SELECT *
FROM dept_manager
WHERE emp_no = (SELECT emp_no FROM dept_manager WHERE to_date >= 20230901 AND dept_no = 'd002');


-- 현재 급여가 가장 높은 사원의 사번과 풀네임을 가져오세요
SELECT
	emp_no
	, CONCAT(first_name, ' ', last_name) AS fullname
FROM employees
WHERE emp_no = (
	SELECT emp_no 
	FROM salaries
	WHERE to_date >= 20230901
	ORDER BY salary DESC
	LIMIT 1
);

-- 서브쿼리의 결과가 복수일 때 사용방법
-- d001 부서에 속한적이 있는 사원의 사번과 풀네임을 출력
SELECT
	emp_no
	, CONCAT(first_name, ' ', last_name) AS fullname
FROM employees
WHERE emp_no IN (
	SELECT emp_no 
	FROM dept_manager
	WHERE dept_no = 'd001'
);

-- 현재 직책이 Senior Engineer인 사원의 사번과 생일을 ㅊ풀력해주세요
SELECT
	emp_no
	, birth_date
FROM employees
WHERE emp_no IN (
	SELECT emp_no 
	FROM titles
	WHERE title = 'Senior Engineer' AND to_date >= 20230901
);

-- 현재 매니저 직을 하고 있는 사람의 모든 dept_emp의 정보
SELECT * 
FROM dept_emp 
WHERE (emp_no, dept_no) IN 
	(SELECT emp_no, dept_no 
	FROM dept_manager 
	WHERE to_date >= NOW()
);

-- SELECT절에 사용하는 서브 쿼리
-- 사원의 현재 급여, 현재 급여를 받기 시작한 일자, 풀 네임을 출력해주세요
SELECT
	sal.salary
	, sal.from_date
	, (SELECT CONCAT(emp.first_name, ' ', emp.last_name) AS full_name
		FROM employees AS emp
		WHERE sal.emp_no= emp.emp_no
		) AS full_name
FROM salaries AS sal
WHERE sal.to_date >= NOW();

-- FROM절에 오는 서브 쿼리
SELECT  emp.*
FROM (SELECT *
	FROM employees
	WHERE gender = 'M'
	) AS emp;
