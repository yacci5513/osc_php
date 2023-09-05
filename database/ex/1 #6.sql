-- 1
SELECT emp.emp_no, CONCAT(emp.first_name, ' ', emp.last_name) AS fullname, tit.title
FROM employees AS emp
	INNER JOIN titles AS tit
		ON emp.emp_no = tit.emp_no
;

-- 2
SELECT emp.emp_no, emp.gender, sal.salary
FROM employees AS emp
	INNER JOIN salaries AS sal
		ON emp.emp_no = sal.emp_no
		AND sal.to_date>=NOW()
;

-- 3
SELECT emp.emp_no, CONCAT(emp.first_name, ' ', emp.last_name) AS fullname, sal.salary
FROM employees AS emp
	INNER JOIN salaries AS sal
		ON emp.emp_no = sal.emp_no
WHERE emp.emp_no=10001
;

-- 4
SELECT emp.emp_no, CONCAT(emp.first_name, ' ', emp.last_name) AS fullname, dpms.dept_name
FROM employees AS emp
	INNER JOIN dept_emp AS dp
		ON emp.emp_no = dp.emp_no
	INNER JOIN departments AS dpms
		ON dp.dept_no = dpms.dept_no
;

-- 5
SELECT emp.emp_no, CONCAT(emp.first_name, ' ', emp.last_name) AS fullname, sal.salary
FROM employees AS emp
	INNER JOIN salaries AS sal
		ON emp.emp_no = sal.emp_no
		AND sal.to_date>=NOW()
ORDER BY sal.salary DESC
LIMIT 10
;

-- 6
SELECT dpms.dept_name, CONCAT(emp.first_name, ' ', emp.last_name) AS fullname, emp.hire_date
FROM employees AS emp
	INNER JOIN dept_manager AS dpm
		ON emp.emp_no = dpm.emp_no
		AND dpm.to_date = 99990101
	INNER JOIN dept_emp AS dp
		ON dpm.emp_no = dp.emp_no
	INNER JOIN departments AS dpms
		ON dp.dept_no = dpms.dept_no
;

-- 7
SELECT avg(sal.salary)
FROM salaries AS sal
	INNER JOIN titles AS tit
		ON sal.emp_no = tit.emp_no
		AND tit.title = 'Staff'
WHERE sal.to_date >= NOW()
;

-- 8
SELECT CONCAT(emp.first_name, ' ', emp.last_name) AS fullname, emp.hire_date, emp.emp_no, dpm.dept_no
FROM employees AS emp
	INNER JOIN dept_manager AS dpm
	ON emp.emp_no=dpm.emp_no
;

-- 9
SELECT tit.emp_no, AVG(sal.salary)
FROM titles AS tit
	INNER JOIN salaries AS sal
		ON tit.emp_no = sal.emp_no
		GROUP BY tit.title
		HAVING avg(sal.salary) >= 60000
;
-- 현재 각 직급별 평균월급중 60000이상인 직급의 직급명 평균월급(정수)를 내림차순으로 출력해주세요
-- 셩별이 여자인 사원들의 직급별 사원수를 출력