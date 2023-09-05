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
WHERE dp.to_date >=NOW();
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

-- 6 현재 각 부서의 부서장의 부서명, 풀네임, 입사일을 출력해주세요
SELECT dpms.dept_name, CONCAT(emp.first_name, ' ', emp.last_name) AS fullname, emp.hire_date
FROM employees AS emp
	INNER JOIN dept_manager AS dpm
		ON emp.emp_no = dpm.emp_no
		AND dpm.to_date >= NOW()
	INNER JOIN dept_emp AS dp
		ON dpm.emp_no = dp.emp_no
	INNER JOIN departments AS dpms
		ON dp.dept_no = dpms.dept_no
;

-- 7 현재 직책이 staff인 사원의 현재 전체 평균 월급을 출력해주세요
SELECT tit.title, avg(sal.salary)
FROM salaries AS sal
	INNER JOIN titles AS tit
		ON sal.emp_no = tit.emp_no
		AND tit.title = 'Staff'
		AND tit.to_date >= NOW()
WHERE sal.to_date >= NOW()
;

-- 8 부서장직을 역임했던 모든 사원의 풀네임과 입사일, 사번, 부서번호를 출력해주세요
SELECT CONCAT(emp.first_name, ' ', emp.last_name) AS fullname, emp.hire_date, emp.emp_no, dpm.dept_no
FROM employees AS emp
	INNER JOIN dept_manager AS dpm
		ON emp.emp_no=dpm.emp_no
;

-- 9.현재 각 직급별 평균월급중 60000이상인 직급의 직급명 평균월급(정수)를 내림차순으로 출력해주세요
SELECT tit.title, floor(AVG(sal.salary)) AS sal_avg
FROM titles AS tit
	INNER JOIN salaries AS sal
		ON tit.emp_no = sal.emp_no
		AND sal.to_date >= NOW()
		AND tit.to_date >= NOW()
GROUP BY tit.title HAVING avg(sal.salary) >= 60000
ORDER BY sal_avg DESC
;

-- 10.현재 성별이 여자인 사원들의 직급별 사원수를 출력
SELECT tit.title, COUNT(emp.gender)
FROM employees AS emp
	INNER JOIN titles AS tit
	ON emp.emp_no = tit.emp_no
	AND tit.to_date >= NOW()
	AND emp.gender = 'f'
GROUP BY tit.title
;

-- 퇴사한 여직원의 수

SELECT COUNT(*)
FROM (SELECT sal1.emp_no FROM salaries AS sal1
	EXCEPT
	SELECT DISTINCT sal2.emp_no FROM salaries AS sal2 WHERE sal2.to_date = 99990101) AS sal3
	INNER JOIN employees AS emp
		ON sal3.emp_no=emp.emp_no
			AND emp.gender = 'F'
;

SELECT COUNT(*)
FROM (SELECT sal1.emp_no FROM salaries AS sal1
	EXCEPT
	SELECT DISTINCT sal2.emp_no FROM salaries AS sal2 WHERE sal2.to_date = 99990101) AS sal3
	INNER JOIN employees AS emp
		ON sal3.emp_no=emp.emp_no
			AND emp.gender = 'M'
;