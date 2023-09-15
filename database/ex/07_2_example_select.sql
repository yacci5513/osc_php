SELECT emp_no
	,e.gender
	,CASE e.gender
		WHEN 'M' THEN '남자'
		ELSE '여자'
	END AS ko_gender
FROM employees AS e;

SELECT * FROM titles ORDER BY emp_no ASC;

UPDATE titles
SET to_date = null
WHERE emp_no=500000;

SELECT * FROM titles ORDER BY emp_no DESC;


-- 직책 테이블의 모든 정보를 출력해 주세요.
-- to_date가 null 또는 9999-01-01인 경우는 '현재 직책'
-- 그 외는 '지금은 아님'



SELECT *
	,CASE t.to_date
		WHEN null THEN '현재 직책'
			WHEN 99990101 THEN '현재 직책'
		ELSE '지금은 아님'
	END AS now
FROM titles AS t;

SELECT
	*
	,case DATE(IFNULL(to_date,99990101))
		when 99990101 then '현재직책'
		ELSE '지금은 아님'
	END AS ko_to_date
FROM titles
ORDER BY emp_no DESC; 


SELECT *
FROM titles
WHERE to_date IS NULL;


SELECT *
FROM titles
WHERE to_date IS not NULL;


-- 3. 문자열 함수
		CONCAT(문자열1,문자열2, ...): 문자열을 이어줍니다.
SELECT CONCAT('안녕', '하세요.');
-- 	CONCAT_WS(구분자, 문자열1, 문자열2, ...) :문자열 사이에 구분자를 넣어줍니다.
SELECT CONCAT_WS('/', '딸기', '바나나', '토마토', '수박');
-- 	FORMAT(숫자, 소숫점 자릿수) : 숫자에 ','를 넣어주고, 소숫점 자릿수를 넣어줍니다.
SELECT FORMAT(123456, 0);
-- 	LEFT(문자열, 길이) : 문장쳘을 왼쪽부터 길이만큼 잘라 반환합니다.
SELECT LEFT('123456, 2');
-- 	RIGHT(문자열, 길이) : 문자열을 오른쪽부터 길이만큼 잘라 반환합니다.
SELECT RIGHT('123456, 2');

--  UPPER(문자열) : 소문자를 대문자로 변경합니다.
SELECT UPPER ('abcd');
-- 	LOWER(문자열): 대문자를 소문자로 변경합니다.
SELECT LOWER('ABCD');
-- 	LPAD(문자열,길이,채울 문자열): 문자열을 포함해 길이만큼 채울 문자열을 왼쪽에 넣을 때.
SELECT LPAD(' 123456', 10, '0');
-- 	RPAD(문자열, 길이, 채울 문자열) : 문자열을 포함해 길이만큼 채울 문자열을 오른쪽에 넣을 때.
SELECT RPAD('123456', 10, '0');
-- TRIM(문자열): 좌우 공백을 제거합니다.
SELECT '1234', TRIM(' 1234 ');
-- LTRIM(문자열): 왼쪽 공백을 제거합니다.
SELECT LTRIM( ' 1234 ');
-- RTRIM(문자열): 오른쪽 공백을 제거합니다.
SELECT RTRIM( ' 1234 ');

SELECT TRIM(LEADING 'ABC' FROM 'ABCDEFG')
-- TRIM(방향문자열 1 FROM 문자열2) : 방향을 지정해 문자열 2에서 문자열 1을 제거합니다.
--  ** 방향을 LEADING(좌),BOTH(우) TAILING(DN) **
-- SUBSTRING(문자열, 시작위치,기이): 문자열을 시작위치에서 길이만큼 잘라서 반환합니다.
SELECT SUBSTRING('abcdef', 3, 2);
-- SUBSTRING__INDEX ( 문자열, 시작위치, 길이) : 왼쪽부터 구분자가 횟수 변화가 나오면 그 이후는 제거합니다.
SELECT SUBSTRING_INDEX('현희_HTML_CSS.html', '.', 1);




-- 4. 수학 함수
-- CELING(숫자): 올림 합니다.
SELECT CEILING(1.4);
-- FLOOR(숫자) :버림 합니다.
SELECT FLOOR(1.9);
-- ROUND(숫자): 반올림 합니다.
SELECT ROUND(1.5), ROUND(1.4);
-- TRUNCATE(숫자, 정수): 소수점 기준으로 정수위치 까지 구하고 나머지는 버립니다.
SELECT TRUNCATE(1.11,1);

SELECT ADDDATE(NOW(), INTERVAL -1 YEAR);


SELECT ADDDATE(DATE(NOW()), INTERVAL -1 YEAR);

-- 6. 순위함수

SELECT emp_no, salary, RANK() OVER(ORDER BY salary DESC) AS RANK
FROM salaries
LIMIT 10;

SELECT t.emp_no, t.salary,RANK() OVER(ORDER BY salary DESC) AS RANK
FROM (SELECT emp_no, salar FROM salaries
ORDER BY salary DESC
LIMIT 10) AS t;


SELECT emp_no, salary, ROW_NUMBER() OVER(ORDER BY salary DESC) AS num
FROM salaries
LIMIT 10;


-- 










