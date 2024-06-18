<?php

namespace Tests\Domain\Entities;

use App\Domain\Entities\User;
use Tests\TestCase;

class UserTest extends TestCase
{
    public function testGettersAndSetters() 
    {
        $user = new User();
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
