<?php

use PHPUnit\Framework\TestCase;
use App\Infrastructure\Persistence\Repositories\UserRepository;
use App\Domain\Entities\User;

class UserRepositoryTest extends TestCase
{
    private $pdoMock;
    private $userRepository;

    protected function setUp(): void
    {
        $this->pdoMock = $this->createMock(PDO::class);
        $this->userRepository = new UserRepository($this->pdoMock);
    }

    public function testAll()
    {
        $stmtMock = $this->createMock(PDOStatement::class);
        $stmtMock->method('fetchAll')->willReturn([['id' => 1, 'name' => 'Test User', 'email' => 'test@example.com', 'password' => 'secret']]);

        $this->pdoMock->method('query')->willReturn($stmtMock);

        $result = $this->userRepository->all();

        $this->assertIsArray($result);
        $this->assertCount(1, $result);
        $this->assertEquals('Test User', $result[0]['name']);
    }

    public function testFindById()
    {
        $stmtMock = $this->createMock(PDOStatement::class);
        $stmtMock->method('execute')->willReturn(true);
        $stmtMock->method('fetch')->willReturn(['id' => 1, 'name' => 'Test User', 'email' => 'test@example.com', 'password' => 'secret']);

        $this->pdoMock->method('prepare')->willReturn($stmtMock);

        $result = $this->userRepository->findById(1);

        $this->assertIsArray($result);
        $this->assertEquals('Test User', $result['name']);
    }

    public function testCreate()
    {
        $user = new User();
        $user->setName('Test User');
        $user->setEmail('test@example.com');
        $user->setPassword('secret');

        $stmtMock = $this->createMock(PDOStatement::class);
        $stmtMock->method('execute')->willReturn(true);

        $this->pdoMock->method('prepare')->willReturn($stmtMock);

        $result = $this->userRepository->create($user);

        $this->assertTrue($result);
    }

    public function testUpdate()
    {
        $user = new User();
        $user->setId(1);
        $user->setName('Updated User');
        $user->setEmail('updated@example.com');
        $user->setPassword('newsecret');

        $stmtMock = $this->createMock(PDOStatement::class);
        $stmtMock->method('execute')->willReturn(true);

        $this->pdoMock->method('prepare')->willReturn($stmtMock);

        $result = $this->userRepository->update($user);

        $this->assertTrue($result);
    }

    public function testDelete()
    {
        $stmtMock = $this->createMock(PDOStatement::class);
        $stmtMock->method('execute')->willReturn(true);

        $this->pdoMock->method('prepare')->willReturn($stmtMock);

        $result = $this->userRepository->delete(1);

        $this->assertTrue($result);
    }
}
