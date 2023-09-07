-- 5. 짝궁의 모든 정보를 삭제해 주세요
-- 6. d009 부서의 관리자를 나로 변경해주세요
-- 7. 오늘 날짜부로 나의 직책을 senior engineer로 변경해주세요
-- 8.최고 연봉 사원과 최저 연봉 사원의 사번과 이름을 출력해주세요
-- 9.전체 사원의 평균 연봉을 출력해주세요
-- 10.사번이 499975인 사원의 지금까지 평균 연봉을 출력해주세요


-- 1.사원 정보테이블에 각자의 정보를 적절하게 넣어주세요
INSERT INTO employees(emp_no,birth_date,first_name,last_name,gender,hire_date,sup_no)
VALUES (520000,'19971229','성찬','오','M','20230907',NULL);
SELECT * FROM employees ORDER BY emp_no DESC LIMIT 5;

-- 2. 월급, 직책, 소속부서 테이블에 각자의 정보를 적절하게 넣어주세요
INSERT INTO salaries(emp_no,salary,from_date,to_date)
VALUES (520000,99999999,'20230907','99990101');
SELECT * FROM salaries ORDER BY emp_no DESC LIMIT 5;

INSERT INTO titles(emp_no,title,from_date,to_date)
VALUES (520000,'Staff','20230907','99990101');
SELECT * FROM titles ORDER BY emp_no DESC LIMIT 5;

INSERT INTO dept_emp(emp_no,dept_no,from_date,to_date)
VALUES (520000,'d008','20230907','99990101');
SELECT * FROM dept_emp ORDER BY emp_no DESC LIMIT 5;

-- 3. 짝궁의 1,2 것도 넣어주세요
INSERT INTO employees(emp_no,birth_date,first_name,last_name,gender,hire_date,sup_no)
VALUES (520001,'19960106','명호','정','M','20230907',NULL);
SELECT * FROM employees ORDER BY emp_no DESC LIMIT 5;

INSERT INTO salaries(emp_no,salary,from_date,to_date)
VALUES (520001,99999999,'20230907','99990101');
SELECT * FROM salaries ORDER BY emp_no DESC LIMIT 5;

INSERT INTO titles(emp_no,title,from_date,to_date)
VALUES (520001,'Staff','20230907','99990101');
SELECT * FROM titles ORDER BY emp_no DESC LIMIT 5;

INSERT INTO dept_emp(emp_no,dept_no,from_date,to_date)
VALUES (520001,'d008','20230907','99990101');
SELECT * FROM dept_emp ORDER BY emp_no DESC LIMIT 5;

-- 4. 나와 짝궁의 소속 부서를 d009로 변경해주세요
UPDATE dept_emp
SET to_date = NOW(), dept_no ='d008'
WHERE emp_no IN(520000, 520001)
	AND to_date > NOW();
SELECT * FROM dept_emp ORDER BY emp_no DESC LIMIT 5;

INSERT INTO dept_emp(emp_no,dept_no,from_date,to_date)
VALUES (520000,'d009','20230907','99990101');
INSERT INTO dept_emp(emp_no,dept_no,from_date,to_date)
VALUES (520001,'d009','20230907','99990101');
SELECT * FROM dept_emp ORDER BY emp_no DESC LIMIT 5;

-- 5. 짝궁의 모든 정보를 삭제해 주세요
DELETE FROM employees
WHERE emp_no = 520001;
SELECT * FROM employees ORDER BY emp_no DESC LIMIT 5;

DELETE FROM salaries
WHERE emp_no = 520001;
SELECT * FROM salaries ORDER BY emp_no DESC LIMIT 5;

DELETE FROM titles
WHERE emp_no = 520001;
SELECT * FROM titles ORDER BY emp_no DESC LIMIT 5;

DELETE FROM dept_emp
WHERE emp_no = 520001;
SELECT * FROM dept_emp ORDER BY emp_no DESC LIMIT 5;

-- 6. d009 부서의 관리자를 나로 변경해주세요
UPDATE dept_manager
SET to_date = CAST(NOW() AS DATE)
WHERE dept_no='d009'
	AND to_date >=NOW();

INSERT INTO dept_manager(dept_no, emp_no, from_date, to_date)
VALUES ('d009', '520000','20230907','99990101');

SELECT * FROM dept_manager WHERE dept_no = 'd009';

-- 7. 오늘 날짜부로 나의 직책을 Senior Engineer로 변경해주세요
UPDATE titles
SET to_date= NOW()
WHERE emp_no = 520000
	AND to_date>=NOW();

INSERT INTO titles(emp_no,title,from_date,to_date)
VALUES (520000,'Senior Engineer','20230907','99990101');
	
SELECT * FROM titles ORDER BY emp_no DESC LIMIT 10;

-- 8.최고 연봉 사원과 최저 연봉 사원의 사번과 이름을 출력해주세요
-- CREATE INDEX index_salaries_salary ON salaries(salary);
-- 원래 1.6초 걸리던게 인덱스 추가후 0.016초로 변경
SELECT sal.emp_no, emp.first_name, sal.salary
FROM salaries AS sal
	JOIN employees AS emp
		ON sal.emp_no = emp.emp_no
WHERE sal.salary = (SELECT MAX(salary) FROM salaries)
	OR sal.salary = (SELECT MIN(salary) FROM salaries);

-- 9.전체 사원의 평균 연봉을 출력해주세요
SELECT AVG(salary)
FROM salaries
WHERE to_date >= NOW();

-- 10.사번이 499975인 사원의 지금까지 평균 연봉을 출력해주세요
SELECT emp_no, AVG(salary)
FROM salaries
WHERE emp_no = 499975;

SELECT * FROM salaries WHERE emp_no = 499975;
