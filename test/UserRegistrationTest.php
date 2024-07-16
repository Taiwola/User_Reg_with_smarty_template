<?php

require_once './vendor/autoload.php';

use PHPUnit\Framework\TestCase;

require_once './model/user.class.php';

class UserRegistrationTest extends TestCase
{

    public function testUser()
    {
        $userRegistration = new UserRegistration('john_doe', 'john@example.com', 'Password123$');
        $this->assertTrue($userRegistration->validate());
    }

    public function testuser_return_error_when_email_is_incorrect()
    {
        $userRegistration = new UserRegistration('john_doe', 'john@example', 'Password123$');
        $this->assertFalse($userRegistration->validate());
        $this->assertArrayHasKey('email', $userRegistration->getErrors());
        $this->assertEquals('Invalid email format.', $userRegistration->getErrors()['email']);
    }

    public function testuser_when_password_is_format_is_incorrect()
    {
        $userRegistration = new UserRegistration('john_doe', 'john@example.com', 'Password');
        $this->assertFalse($userRegistration->validate());
        $this->assertArrayHasKey('password', $userRegistration->getErrors());
        $this->assertEquals('Password must contain at least one lowercase letter, one uppercase letter, and one digit, and be at least 8 characters long.', $userRegistration->getErrors()['password']);
    }

    public function test_return_error_when_field_is_missing()
    {
        $userRegistration = new UserRegistration('john_doe', 'john@example.com', '');
        $this->assertFalse($userRegistration->validate());
    }

    public function test_Missing_Username()
    {
        $userRegistration = new UserRegistration('', 'john@example.com', 'Password123$');
        $this->assertFalse($userRegistration->validate());
        $this->assertArrayHasKey('username', $userRegistration->getErrors());
        $this->assertEquals('Username is required.', $userRegistration->getErrors()['username']);
    }

    public function test_Missing_Password()
    {
        $userRegistration = new UserRegistration('john_doe', 'john@example.com', '');
        $this->assertFalse($userRegistration->validate());
        $this->assertArrayHasKey('password', $userRegistration->getErrors());
        $this->assertEquals('Password is required.', $userRegistration->getErrors()['password']);
    }
}
