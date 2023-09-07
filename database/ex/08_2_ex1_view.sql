-- 데이터베이스의 여러가지 기능들 중
-- 뷰, 보안과 함께 사용자의 편의성을 높이기 위해 사용합니다.
-- 2. CREATE VIEW 생성
-- CREATE VIEW v_
SELECT * FROM salaries ORDER BY emp_no ASC;

SELECT * FROM titles ORDER BY emp_no ASC;

CREATE VIEW view_employed_emp
as
SELECT emp.*
	,tit.title
FROM employees as emp
	INNER JOIN titles as tit
		ON emp.emp_no= tit.emp_no
		AND tit.to_date >= NOW()
;

SELECT * FROM view_employed_emp;
-- 웹개발 현장에서는 뷰를 적극적으로 사용하지 않는다. ->독립적인 인덱스를 가질 수 없기 때문-> 속도 이슈
-- 