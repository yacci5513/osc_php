-- 인덱스 중요!
-- 조회 성능을 향상 시키기 위한 방법
SHOW INDEX FROM salaries;
CREATE INDEX idx_employees_last_name1 ON salaries(salary,from_date,to_date);
DROP INDEX idx_employees_last_name1 ON salaries;

