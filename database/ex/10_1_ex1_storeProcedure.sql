-- 스토어드 프로시저
-- 일련의 쿼리를 모아 마치 하나의 함수처럼 실행하기 위한 쿼리의 집합

-- 

DELIMITER $$
CREATE PROCEDURE test(
)
BEGIN
	SELECT emp.*
	,tit.title
	FROM employees as emp
		INNER JOIN titles as tit
			ON emp.emp_no= tit.emp_no
			AND tit.to_date >= NOW();
END $$
DELIMITER ;

CALL test();

SHOW PROCEDURE STATUS;