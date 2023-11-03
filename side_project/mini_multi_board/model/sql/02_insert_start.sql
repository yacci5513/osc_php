INSERT INTO user(u_id,u_pw,u_name)
VALUES ('admin', 'MTIzNDU2Nzg=', '관리자')
,('user1', 'MTIzNDU2Nzg=', '유저1');

INSERT INTO board(u_pk, b_type, b_title, b_content)
VALUES ('1', '0', '관리자가 쓴 제목1', '관리자가 쓴 내용1')
,('1', '1', '관리자가 쓴 제목2', '관리자가 쓴 내용2')
,('2', '0', '사용자가 쓴 제목1', '사용자가 쓴 내용1')
,('2', '1', '사용자가 쓴 제목2', '사용자가 쓴 내용2');

INSERT INTO boardname(b_type, bn_name)
VALUES ('0', '자유게시판')
,('1', '질문게시판');

COMMIT;