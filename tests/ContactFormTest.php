<?php
namespace QuickPOS\Tests;

use PHPUnit\Framework\TestCase;
use QuickPOS\Src\FormValidator;

class ContactFormTest extends TestCase {
    public function testEmptyNameRejected() {
        $data = ['name' => '', 'email' => 'a@b.com', 'message' => 'hi'];
        $result = FormValidator::validate($data);
        $this->assertFalse($result['valid']);
        $this->assertEquals('empty', $result['error']);
    }

    public function testEmptyEmailRejected() {
        $data = ['name' => 'Ali', 'email' => '', 'message' => 'hi'];
        $result = FormValidator::validate($data);
        $this->assertFalse($result['valid']);
        $this->assertEquals('empty', $result['error']);
    }

    /**
     * @dataProvider invalidEmails
     */
    public function testInvalidEmailRejected($invalidEmail) {
        $data = ['name' => 'Ali', 'email' => $invalidEmail, 'message' => 'hi'];
        $result = FormValidator::validate($data);
        $this->assertFalse($result['valid']);
        $this->assertEquals('email', $result['error']);
    }

    public function invalidEmails() {
        return [
            ['notanemail'],
            ['@bad.com'],
            ['test@']
        ];
    }

    public function testEmptyMessageRejected() {
        $data = ['name' => 'Ali', 'email' => 'a@b.com', 'message' => ''];
        $result = FormValidator::validate($data);
        $this->assertFalse($result['valid']);
        $this->assertEquals('empty', $result['error']);
    }

    public function testValidDataPasses() {
        $data = ['name' => 'Ali', 'email' => 'a@b.com', 'message' => 'Hello!'];
        $result = FormValidator::validate($data);
        $this->assertTrue($result['valid']);
        $this->assertNull($result['error']);
    }
}
