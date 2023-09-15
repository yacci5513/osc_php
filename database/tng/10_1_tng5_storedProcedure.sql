1. 사원 정보테이블에 각자의 정보를 적절하게 넣어주세요.
INSERT INTO employees (emp_no, first_name, last_name, gender, birth_date, hire_date)
    VALUES (500004, 'cat', 'rose', 'F', 20000114, 20230905);
2. 월급, 직책, 소속부서 테이블에 각자의 정보를 적절하게 넣어주세요.
INSERT INTO titles (emp_no, title, from_date, to_date)
    VALUES (500004, 'Technique Leader',20000114, 99990101);
    
3. 짝궁의 [1,2]것도 넣어주세요.
INSERT INTO employees (emp_no, first_name, last_name, gender, birth_date, hire_date)
    VALUES (500007,'dinn', 'kim', 'm', 19981023, 20230905);
INSERT INTO titles (emp_no, title, from_date, to_date)
    VALUES (500007,'Technique Leader','19991023', '20230907');
INSERT INTO employees (emp_no, first_name, last_name, gender, birth_date, hire_date)
    VALUES (500008,'sujin', 'Yang', 'm', 19981023, 20230905);
    INSERT INTO titles (emp_no, title, from_date, to_date)
    VALUES (500008,'Technique Leader',20001023, 20230907);
    
4. 나와 짝궁의 소속 부서를 d009로 변경해 주세요.

UPDATE dept_emp
SET dept_no='d009'
WHERE emp_no = 500004
or emp_no = 500007
or emp_no = 500008;

5. 짝궁의 모든 정보를 삭제해 주세요.

DELETE FROM employees WHERE emp_no IN (500007, 500008);
DELETE FROM titles WHERE emp_no IN (500007, 500008);	
	

6.'d0009' 부서의 관리자를 나로 변경해 주세요.

UPDATE dept_manager
SET to_date = 99990101
WHERE emp_no =(SELECT emp_no
FROM dept_manager
WHERE dept_no = 'd009'
AND to_date >= NOW()
);
INSERT INTO dept_manager(
	dept_no
	,emp_no
	,from_date
	,to_date
	)
VALUES (
	'd009'
	,500004
	,20000114
	,99990101
	);


					

7. 오늘 날짜부로 나의 직책을'senior Engineer'로 변경해 주세요.

UPDATE titles
SET title = 'Senior Engineer', to_date = CURDATE()
WHERE emp_no = '500002' AND title = 'Technique Leader';




8. 최고 연봉 사원과 최저 연봉 사원의 사번과 이름을 출력해 주세요.

SELECT emp.emp_no, CONCAT(emp.last_name, ' ', emp.first_name) AS full_name
FROM employees AS emp
INNER JOIN salaries AS sal ON emp.emp_no = sal.emp_no
AND sal.salary = (
    SELECT MAX(salary)
    FROM salaries
	 )
LIMIT 1;

SELECT emp.emp_no, CONCAT(emp.last_name, ' ', emp.first_name) AS full_name
FROM employees AS emp
INNER JOIN salaries AS sal ON emp.emp_no = sal.emp_no
AND sal.salary = (
    SELECT MIN(salary)
    FROM salaries  
)
LIMIT 1;


-- 다른 방법




SELECT emp.emp_no, CONCAT(emp.last_name, ' ', emp.first_name) AS full_name
FROM employees AS emp
INNER JOIN salaries AS sal ON emp.emp_no = sal.emp_no
WHERE (sal.salary = (SELECT MAX(salary) FROM salaries) OR
       sal.salary = (SELECT MIN(salary) FROM salaries))
;


9. 전체 사원의 평균 연봉을 출력해 주세요.

SELECT AVG(salary) AS average_salary
FROM salaries;
  
10. 사번이 499,975인 사원의 지금까지 평균 연봉을 출력해 주세요.


SELECT emp.emp_no, AVG(sal.salary) AS average_salary
FROM employees AS emp
INNER JOIN salaries AS sal ON emp.emp_no = sal.emp_no
WHERE emp.emp_no = 499975
GROUP BY emp.emp_no;