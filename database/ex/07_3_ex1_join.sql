-- JOIN이란?
-- 두개 이상의 테이블을 묶어서 하나의 결과 집합으로 출력하는 것입니다.

-- INNER JOIN의 구조
-- SELECT 컬럼1, 컬럼2
-- FROM 테이블1 INNER JOIN 테이블2
-- ON 조인 조건
-- [WHERE 검색조건]
-- 교차된 부분만 가져옴 A 교집합 B

SELECT emp.emp_no
	,emp.first_name
	,emp.last_name
	,dp.dept_no
FROM employees AS emp
	INNER JOIN dept_emp AS dp
		ON emp.emp_no = dp.emp_no
		AND dp.to_date >= NOW();

-- OUTER JOIN:
-- -기준이 되는 테이블의 레코드는 조인의 조건에 만족되지 않아도 출력
-- SELECT 컬럼1, 컬럼2...
-- FROM 테이블1
-- 	[LEFT|RIGHT] OUTER JOIN 테이블2
-- 		ON 조인 조건
-- WHERE 검색조건;


SELECT emp.emp_no,emp.first_name, dm.dept_no
FROM employees AS emp
	INNER JOIN dept_manager dm
		ON emp.emp_no = dm.emp_no
		AND dm.to_date >= NOW()
WHERE emp.emp_no >=110030;

SELECT emp.emp_no,emp.first_name, dm.dept_no
FROM employees emp
	LEFT OUTER JOIN dept_manager dm
		ON emp.emp_no = dm.emp_no
		AND dm.to_date >= NOW()
WHERE emp.emp_no >=110030
;

SELECT emp.emp_no,emp.first_name, dm.dept_no
FROM employees emp
	RIGHT OUTER JOIN dept_manager dm
		ON emp.emp_no = dm.emp_no
		AND dm.to_date >= NOW()
;

-- self join !
SELECT emp2.*
FROM employees emp1
INNER	JOIN employees emp2
ON	emp1.sup_no = emp2.emp_no;
