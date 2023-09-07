1. 트랜잭션
한꺼번에 모두 수행되어야 할 연산


2. 트랜잭션의 성질
원자성 - 커밋과 롤백
일관성 - 하나의 트랜잭션에 대해 결과값이 일정해야한다
독립성, 격리성 - 트랜잭션이 병행 실행되면 연산에 끼어들수없다.
			- 트랜잭션이 동시에 실행될 수 없다. 
영속성 - 커밋된 데이터는 항상 저장되어 있어야 한다

3. 트랜잭션의 상태

활동 - 트랜잭션이 실행 중인 상태
실패 - 트랜잭션 실행에 오류가 발생하여 중단된 상태
철회 - 트랜잭션이 비정상적으로 종료되어 Rollback 연산을 수행한 상태
부분완료 - 트랜잭션의 마지막 연산까지 실행했지만, Commit 연산이 실행되기 직전의 상태
완료 - 트랜잭션이 성공적으로 종료되어 Commit 연산을 실행한 후의 상태