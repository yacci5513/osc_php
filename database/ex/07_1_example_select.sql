-- 0. JOIN이란?
--  	두개 이상의 테이블을 묶어서 하나의 결과 집합으로 출력 하는 것 입니다.


-- 1. INNER JOIN 의 구 조
-- 		SELECT 컬럼1, 컬럼2
--  		FROM 테이블 1 INNER JOIN 테이블 2
-- 				ON 조인 조건
--  			[WHERE 검색조건]


SELECT emp.emp_no
		, emp.first_name
		, emp.last_name 
		, dp.dept_no
FROM employees  emp
	INNER JOIN dept_emp dp
		ON emp.emp_no = dp.emp_no
		AND dp.to_date >= NOW();
		
-- 2. OUTHER JOIN : 
--  -기준이 되는 테이블의 레코드는 조인의 조건에 만족되지 않아도 출력
-- SELECT 컬럼1, 컬럼2 ...
-- FROM 테이블 1
--  [ LEFT | RIGHT ] OUTHER JOIN 테이블2
-- 		OR 조인 조건
--  WHERE 검색 조건;
SELECT emp.emp_no, emp.first_name, dm.dept_no
FROM employees emp
	LEFT OUTER JOIN dept_manager dm
	ON emp.emp_no = dm.emp_no
	AND dm.to_date >= NOW()	
WHERE emp.emp_no >= 110000;


SELECT * FROM employees WHERE emp_no = 10001 OR emp_no = 10005
UNION
SELECT * FROM employees WHERE emp_no = 10005;

-- 4. SELF JOIN : 자기 자신을 조인
-- SELECT 컬럼1, 컬럼2 ...
-- FROM 테이블1
--  INNER JOIN 테이블1
-- WHERE 검색조건;
SELECT emp.*2
FROM employees emp1
JOIN employees emp2
	ON emp1.sup_no = emp2.emp_no
;

ALTER TABLE employees ADD COLUMN sup_no;













