-- 1. 데이터 타입 변환 함수
-- CAST ( 값 AS 데이터형식)
-- CONVERT ( 값, 데이터형식)
SELECT CAST (1234 AS CHAR(4));
SELECT CONVERT (1234, CHAR(4));

-- 2. 제어 흐름 함수
-- IF(수식, 참일 때, 거짓일 때) : 수식이 참 또는 거짓에 따라 결과를 분기하는 함수
SELECT e.emp_no, if(e.gender='M', '남자', '여자') AS gender-
FROM employees AS e;

-- IFNULL(수식1, 수식2) : 수식1이 NULL이면 수식2를 출력하고, NULL이 아니면 수식1을 반환
SELECT IFNULL(NULL, '수식2');

-- NULLIF(수식1, 수식2) : 수식1과 수식2가 같으면 NULL을 출력하고, 다르면 수식1을 반환


-- CASE~ WHEN ~ ELSE ~ END : 다중 분기를 위해 사용합니다
예)
-- CASE 체크하려는 수식
-- 	WHEN 분기수식1 THEN 결과1
-- 	WHEN 분기수식2 THEN 결과2
-- 	WHEN 분기수식3 THEN 결과3
-- 	ELSE 결과4
-- END

SELECT e.emp_no
	,e.gender
	,CASE e.gender
		WHEN 'M' THEN '남자'
		ELSE '여자'
	END AS ko_gender
FROM employees AS e;

SELECT * FROM titles ORDER BY emp_no DESC;

SELECT *
-- WHEN절에 IS NULL  인식불가
-- 	,CASE
-- 		WHEN tit.to_date IS NULL THEN '현재직책'
-- 		WHEN tit.to_date = 99990101 THEN '현재직책'
-- 		ELSE '지금은아님'
-- 	END AS ko_to_date
	,CASE DATE(IFNULL(to_date, 99990101))
		WHEN 99990101 THEN '현재직책'
		ELSE '지금은아님'
	END AS ko_to_date
FROM titles
ORDER BY emp_no DESC;

-- NULL 값을 찾을 떄 is null 사용 
SELECT *
FROM titles
WHERE to_date IS NULL;


-- 3. 문자열 함수
SELECT CONCAT('안녕','하세요.'); -- 안녕하세요.
SELECT CONCAT_WS('/','딸기','바나나','토마토','수박'); -- 딸기/바나나/토마토/수박
SELECT FORMAT(123456, 2); -- FORMAT(숫자, 소숫점 자리수) -- 123,456.00
SELECT LEFT('123456','3'); -- LEFT(문자열, 길이) : 문자열을 왼쪽부터 길이만큼 잘라 반환, RIGHT()
SELECT UPPER ('abcd'); -- 소문자를 대문자로 반환 , LOWER()
SELECT LPAD ('123456', 10, '0'); -- LPAD(문자열, 길이, 채울 문자열): 문자열을 포함해 길이만큼
-- 채울 문자열을 왼쪽에 넣음, RPAD()
SELECT '1234', TRIM('1234 '); -- TRIM() 좌우 공백 제거, LTRIM, RTRIM
SELECT SUBSTRING ('abcdef'), 3, 2); -- SUBSTRING(문자열, 시작위치, 길이): 문자열을 시작위치에서 길이만큼 잘라서 반환
SELECT SUBSTRING_INDEX('ab.cd.ef.gh', '.', 2); -- 왼쪽부터구분자가 횟수 번째가 나오면 그 이후부터 삭제

-- 4. 수학 함수
SELECT CEILING(1.4); -- 올림 함수 CEIL(1.4)도 가능
SELECT FLOOR(1.4); -- 버림 함수
SELECT ROUND(1.2); -- 반올림
-- TRUNCATE(숫자, 정수): 소수점 기준으로 정수위치까지 구하고 나머지는 버립니다.
-- TRUNCATE table명; 하면 테이블 삭제된다. 되돌릴수도 없으니 조심

-- 5. 날짜 함수  //자주 쓰임
SELECT NOW(), DATE(NOW()), DATE(99990101);
select ADDDATE(99990101, INTERVAL 1 DAY); -- 띄워쓰기 조심, 날짜 더하기
SELECT SUBDATE(99990101, INTERVAL 1 DAY); -- 날자 빼기
SELECT ADDTIME(20230101000000, '-01:00:00');

-- 6. 순위 함수
SELECT emp_no, salary, RANK() OVER(ORDER BY salary DESC) AS RANK
FROM salaries 
LIMIT 10;

-- 위 함수 속도 이슈 서브쿼리로 해결
SELECT t.emp_no, t.salary, RANK() OVER(ORDER BY salary DESC) AS RANK
FROM (SELECT emp_no, salary
	FROM salaries
	ORDER BY salary desc
	LIMIT 10
) AS t;
 
-- ROW_NUMBER() OVER 레코드에순위를 매김
SELECT emp_no, salary, ROW_NUMBER() OVER(ORDER BY salary DESC) AS num
FROM salaries 
LIMIT 10;