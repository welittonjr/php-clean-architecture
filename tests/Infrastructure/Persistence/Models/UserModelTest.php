<?php

namespace Tests\Infrastructure\Models;

use App\Infrastructure\Persistence\Models\UserModel;
use Tests\TestCase;

class UserModelTest extends TestCase
{
    public function testGettersAndSetters() 
    {
        $user = new UserModel();
        $user->setId(1);
        $user->setName("wellington");
        $user->setEmail("wellington@gmail.com");
        $user->setPassword("123");

        $this->assertEquals(1, $user->getId());
        $this->assertEquals("wellington", $user->getName());
        $this->assertEquals("wellington@gmail.com", $user->getEmail());
        $this->assertEquals("123", $user->getPassword());

    }
}
