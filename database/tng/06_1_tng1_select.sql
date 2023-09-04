-- 0904
-- 1.직책 테이블의 모든 정보를 조회해 주세요
SELECT * FROM titles;

-- 2.급여가 60,000이하인 사원의 사번을 조회해 주세요
SELECT emp_no
FROM salaries
WHERE salary <= 60000;

-- 3.급여가 60,000에서 70,000인 사원의 사번을 조회해 주세요
SELECT emp_no
FROM salaries
WHERE salary >= 60000 AND salary <=70000;

-- 4.사원번호가 10001,10005인 사원의 모든 정보를 조회해 주세요
SELECT *
FROM employees
WHERE emp_no IN (10001, 10005);

-- 5.직급명에 "Engineer"가 포함된 사원의 사번과 직급을 조회해 주세요
SELECT emp_no, title
FROM titles
WHERE title LIKE ('%Engineer%');


-- 6.사원 이름을 오름차순으로 정렬해서 조회해 주세요
SELECT first_name
FROM employees
ORDER BY first_name ASC;

-- 7.사원별 급여의 평균을 조회해 주세요
SELECT emp_no, AVG(salary)
FROM salaries
GROUP BY emp_no;

-- 8.사원별 급여의 평균이 30000~50000인, 사원번호와 평균급여를 조회해 주세요
SELECT emp_no, AVG(salary) AS salary_avg
FROM salaries
GROUP BY emp_no
HAVING salary_avg >= 30000 AND salary_avg <= 50000;

-- 9.사원별 급여 평균이 70000이상인, 사원의 사번 이름 성 성별을 조회해 주세요
SELECT emp.emp_no, emp.last_name, emp.first_name, emp.gender
FROM employees AS emp,(SELECT emp_no, AVG(salary) AS salary_avg
	FROM salaries
	GROUP BY emp_no
	HAVING salary_avg>=70000) AS sal
WHERE sal.emp_no = emp.emp_no;

SELECT *
FROM employees AS emp inner JOIN salaries AS sal
ON emp.emp_no = sal.emp_no;

-- 10. 현재 직책이 'Senior Engineer'인 사원의 사원번호와 성을 조회해 주세요
SELECT emp.emp_no, emp.last_name
FROM employees AS emp
WHERE emp.emp_no IN (SELECT tit.emp_no FROM titles AS tit WHERE tit.title = 'Senior Engineer' AND tit.to_date >= NOW());
