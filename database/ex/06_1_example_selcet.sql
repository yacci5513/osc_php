-- SELECT [ 컬럼명] FROM [테이블명];
SELECT * FROM employees;
SELECT * FROM dept_emp;

-- 
SELECT first_name, last_name FROM employees;
SELECT emp_no, title FROM titles;

-- SELECT [ 컬럼명] FROM [테이블명] WHERE [쿼리 조건];
-- [쿼리 조건] : 컬럼명 [기호] 조건값
SELECT * From employees WHERE emp_no = 10009;
SELECT * FROM employees WHERE first_name = 'Mary' ;
SELECT * FROM employees WHERE birth_date >= 19500101;
-- SELECT * FROM employees WHERE birth_date >= DATE('YYYMMDD') [maria db 외에 오라클은 형식에 맞게 작성];
--  and 연산자
SELECT * 
FROM employees 
WHERE birth_date <= 19700101 
  AND birth_date >=19650101;
SELECT * 
FROM employees 
WHERE first_name = 'mary' 
   OR last_name = 'piazza';  
   
-- 
SELECT * employees
WHERE emp_no >= 10005
  AND emp_no <= 10010;
--   [위의 값과 같음]
SELECT * 
FROM employees
WHERE emp_no BETWEEN 10005 AND 10010;   

SELECT * 
FROM employees
WHERE emp_no= 10005
OR emp_no=10010;
-- IN()으로 해당 데이터 조회
SELECT *
FROM employees
WHERE emp_no IN(10005, 10010);   
-- 이름이 'Ge'로 시작하는 사람 뒤 %
-- 	이름이 'Ge'로 끝나는 사람 앞 % 
--  중간 이름이 'Ge'가 들어가는 사람 양 옆 %이름%
SELECT * 
FROM employees 
WHERE first_name LIKE ('Ge%'); 

SELECT * 
FROM titles 
WHERE title LIKE ('%Staff%');
SELECT * 
FROM titles 
WHERE title ='Staff';
-- 
SELECT * 
FROM employees 
WHERE first_name LIKE ('___Ge_'); 
-- ___언더바 만큼 글자 수 ㅇㅇㅇGe 인 사람 검색 할 때 사용
-- 

-- 
SELECT * 
FROM employees;
-- ORDER BY로 정렬하여 조회 ASC 오름차순 (생일이 빠른 사람)DESC 내림차순 (생일이 늦은 사람)
SELECT * 
FROM employees
ORDER BY birth_date ASC;
-- 
SELECT * 
FROM employees
ORDER BY birth_date DESC;

-- 생일이 빠른사람, 그 다음은 A~Z 이름이 빠른 사람, last name 중 A~Z 정렬 (정렬 순으로 그룹 정렬)
SELECT * 
FROM employees
WHERE first_name = 'Mary'
ORDER BY birth_date, last_name;

-- 성을 내림차순으로 정렬하고, 이름을 오름차순으로 정렬,생일을 오름차순으로 정렬해주세요 . ex
SELECT * 
FROM employees
ORDER BY last_name DESC, first_name, birth_date ASC;

-- DISTINCT로 중복되는 레코드 없이 조회

SELECT DISTINCT emp_no FROM salaries;

-- DISTINCTsalarise emp_no,emp_no = 10001;을 사용해서 emp_no 10001중 salary 중복이 되는걸 제외하고 정렬 distinct 는 레코드가 중복인걸 제외해줌
SELECT emp_no, salary FROM salaries WHERE emp_no = 10001;
SELECT DISTINCT emp_no, salary FROM salaries WHERE emp_no = 10001;

-- INSERT INTO salaries VALUES (10001, 60117, 19860627, 19870626);COMMIT


-- 5. 집계 함수
SELECT SUM(salary)
FROM salaries;
-- 현재 받고있는 급여만 조회해주세요.ex

SELECT *
FROM salaries
WHERE to_date = 99990101;

SELECT *
FROM salaries
WHERE to_date >= 20230901;

SELECT SUM(salary)
FROM salaries
WHERE to_date >= 20230901;
-- SUM(컬럼명):전체값
SELECTMIN(salary)
SELECT MAX(salary)
FROM salaries
WHERE to_date >= 20230901;
-- MAX(컬럼명):최대값
SELECT MIN(salary)
FROM salaries
WHERE to_date >= 20230901;
-- MIN(컬럼명):최소값
SELECT AVG(salary)
FROM salaries
WHERE to_date >= 20230901;
-- AVG:평균값

SELECT COUNT(salary)
FROM salaries
WHERE to_date >= 20230901;
-- COUNT(컬럼명): 개수를 구합니다.
SELECT COUNT(emp_no)
FROM employees WHERE first_name = 'Mary';
-- 이름이 Mary 인 사람의 수를 구해주세요.

-- 그룹으로 묶어서 조회 : GROUP BY 컬럼명 [ HAVING 집계 함수 조건]

SELECT title, COUNT(title)
FROM titles
GROUP BY title;

SELECT title, COUNT(title)
FROM titles
GROUP BY title HAVING title = 'staff';

SELECT title, COUNT(title)
FROM titles
WHERE to_date >= 20230901
GROUP BY title HAVING title LIKE('%staff%');

-- 속성명에 "AS"를 이용하여 별칭을 줄 수 있습니다.
SELECT title, COUNT(title) AS cnt
FROM titles
WHERE to_date >= 20230901
GROUP BY title HAVING title LIKE('%staff%');


-- CONCAT(): 문자 열을 합쳐주는 함수



SELECT CONCAT(first_name, ' ', last_name) AS FULL_name
FROM employees;

-- 여자 사원의 사번, 생일, 풀네임을 오름차순으로 출력해주세요 ex.

sysSELECT emp_no, birth_date, CONCAT(first_name,' ', last_name) AS FULL_name
FROM employees
WHERE gender = 'f'
GROUP BY Full_name ASC;

SELECT emp_no, birth_date, CONCAT(first_name,' ', last_name) AS FULL_name
FROM employees
WHERE gender = 'f'
ORDER BY full_name;

-- LIMIT로 출력 개수를 제한하여 조회
-- LIMIT n : n개만큼 출력
-- LIMIT n OFFSET n : n번째 부터 n개만큼 출력
SELECT * 
FROM employees 
ORDER BY emp_no
LIMIT 10 OFFSET 10;

-- 현재 재직중인 사원들 중 급여가 상위 5위 까지 출력해 주세요.


SELECT *
FROM salaries
WHERE to_date >= 20230901
ORDER BY salary desc
LIMIT 5;

-- 서브쿼리(SubQuery) : 쿼리 안에 또 다른 쿼리가 있는 형태
-- d002 부서의 현재 매니저의 이름을 가져오고 싶다 (ex.)
SELECT *
FROM employees
WHERE emp_no = 110114;


SELECT *
FROM employees
WHERE emp_no = (
SELECT emp_no
FROM dept_manager
WHERE to_date >= 20230901
AND dept_no = 'd002'
);
-- [employees] > (emp_no)* > {dept_manger} > (emp_no)* > {dept_manger 안의 (to_date) (dept_no) } 로 찾음..  

-- pk(금색키)point key :숙주,fk(fall in key) : 종속된것들


-- 현재 급여가 가장 높은 사원의 사번과 풀네임을 출력해주세요.
SELECT emp_no, CONCAT (First_name, ' ',Last_name) AS full_name
FROM employees
WHERE emp_no = (
	SELECT emp_no 
	FROM salaries
	WHERE to_date >= 20230901
	ORDER BY salary DESC
	LIMIT 1
	);
-- d001부서 한번이라도 해본 사람 출력.
SELECT
emp_no , CONCAT (First_name, ' ',Last_name) AS full_name
FROM employees
WHERE emp_no IN (
	SELECT emp_no
	FROM dept_manager
	WHERE dept_no = 'd001'
	);
-- 서브 쿼리의 결과가 복수일 때 사용방법

SELECT
emp_no , CONCAT (First_name, ' ',Last_name) AS full_name
FROM employees
WHERE emp_no IN (110022, 110039);


SELECT
emp_no , CONCAT (First_name, ' ',Last_name) AS full_name
FROM employees
WHERE emp_no IN (
	SELECT emp_no
	FROM dept_manager
	WHERE dept_no = 'd001');

SELECT
emp_no , CONCAT (First_name, ' ',Last_name) AS full_name
FROM employees
WHERE emp_no IN (
	SELECT emp_no
	FROM dept_manager
	WHERE dept_no = 'd001' OR 'd002'
	);
-- 현재 직책이 시니어 엔지니어인 사원의 사번과 생일을 출력해주세요.
-- SELECT (찾는거),FROM (ㅇㄷ에서 데이터베이스),WHERE (어디서부터 테이블값 ), IN(숙주(테이블안에있는 겹치는 키), 
-- 머하는직책이여, 직책= 시니어 엔지니어 ㅇㅇ, 글구 20230901최근사람으로 찾아줘)
SELECT emp_no, birth_date
FROM employees
WHERE emp_no IN (
	SELECT emp_no 
	FROM titles
	WHERE title = 'Senior Engineer' And to_date >= 20230901
	);

-- 다중열 서브쿼리


-- 현재 부서장인 사람의 소속부서테이블의 모든 정보를 출력해주세요(ex.)

SELECT *
FROM dept_emp
WHERE (dept_no, emp_no) IN (
		SELECT dept_no, emp_no
		FROM dept_manager
		WHERE to_date >= NOW()
		);

SELECT *
FROM dept_manager
WHERE to_date >= NOW();

-- Select 절에 사용하는 서브쿼리
-- 사원의 현재 급여, 현재 급여를 받기 시작한 일자, 풀네임을 출력해 주세요
SELECT 
	sal.salary
	, sal.from_date
	,(
	SELECT CONCAT (emp.first_name, ' ', emp.last_name) 
	FROM employees AS emp
	WHERE sal.emp_no = emp.emp_no
	) AS full_name	
FROM salaries AS sal
WHERE to_date >= NOW();

-- FROM절에 사용하는 서브쿼리
-- 남자만 찾는 테이블 ex
	SELECT *
	FROM employees
	WHERE gender = 'M';
-- 	
	SELECT emp.*
	FROM (
		SELECT *
		FROM employees
		WHERE gender = 'M'
		) AS emp;



-- 1번

SELECT * FROM  titles;

-- 2번
SELECT DISTINCT emp_no
FROM salaries
WHERE salary <= 60000;

-- 3번
SELECT DISTINCT emp_no
FROM salaries
WHERE salary >= 60000
AND salary <= 70000;

-- 4번
SELECT *
FROM employees
WHERE emp_no IN(10001, 10005);

-- 5번
SELECT emp_no, title
FROM titles
WHERE title = 'engineer' ;

-- 6번
SELECT first_name, Last_name
FROM employees
ORDER BY first_name ASC;

-- 7번
SELECT emp_no, AVG(salary)
FROM salaries
WHERE salary
GROUP BY emp_no;

-- 8번
SELECT emp_no, AVG(salary)
FROM salaries
GROUP BY emp_no HAVING AVG(salary) <=50000
AND AVG(salary) >= 30000;

-- 9번
SELECT emp_no,first_name,last_name,gender
FROM employees
WHERE emp_no IN(
	SELECT emp_no
	FROM salaries
	GROUP BY emp_no HAVING AVG (salary)>70000
	);
	
	
-- 10번
SELECT emp_no, last_name
FROM employees
WHERE emp_no IN (
	SELECT emp_no 
	FROM titles
	WHERE title = 'Senior Engineer' And to_date > 20230904
	);
	
	
	
	
-- 	INSERT
-- 	INSERT INTO 테이블명 [ ( 속성 1, 속성2 ) ]
-- 	VALUES ( 속성값1, 속성값2)

-- 500000 신규회원
INSERT INTO employees (
	emp_no, 
	birth_date, 
	first_name, 
	last_name,
	gender, 
	hire_date
	)
VALUES (
  500000
	,20200101
	, 'cat'
	, 'black'
	, 'M'
	, 20230904
);


-- 500000 번 사원의 급여 데이터를 삽입해 주세요

SELECT * FROM employees WHERE emp_no = 500000;

-- 
INSERT INTO salaries (
	emp_no, 
	salary,
	from_date,
	to_date
	)
VALUES (
  500000,
  500000,
  20010101,
  99990101
  );

SELECT MAX(salary) FROM salaries;
SELECT * FROM salaries WHERE emp_no = 500000;

INSERT INTO dept_emp (
	emp_no,
	dept_no,
	from_date,
	to_date

)
VALUES (
  500000,
  'd001',
  20010101,
  99990101
);
SELECT * FROM dept_emp WHERE emp_no = 500000;
  
INSERT INTO titles (
	emp_no
	,from_date
	,to_date
	,title )
VALUES (
	500000
	, 20000101
	, 99990101
	, 'Technique Leader' );

SELECT * FROM titles WHERE emp_no = 500000;

COMMIT;