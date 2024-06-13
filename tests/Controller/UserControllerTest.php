<?php

namespace App\Tests\Controller;

use App\API\UserController;
use PHPUnit\Framework\TestCase;

class UserControllerTest extends TestCase
{

    public function testShowAction()
    {
        $controller = new UserController();

        $this->assertTrue(true);
    }
}
