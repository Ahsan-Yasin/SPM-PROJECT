<?php
namespace QuickPOS\Tests;

use PHPUnit\Framework\TestCase;

class PageLoadTest extends TestCase {
    public function testIndexExists() {
        $this->assertFileExists('index.php');
    }
    public function testProcessFormExists() {
        $this->assertFileExists('process_form.php');
    }
    public function testThankYouExists() {
        $this->assertFileExists('thankyou.php');
    }
    public function testIndexHasAllSections() {
        $content = file_get_contents('index.php');
        $this->assertStringContainsString('features', $content);
        $this->assertStringContainsString('pricing', $content);
        $this->assertStringContainsString('contact', $content);
        $this->assertStringContainsString('QuickPOS', $content);
    }
    public function testFormHasPostMethod() {
        $content = file_get_contents('index.php');
        $this->assertStringContainsString('method="POST"', $content);
    }
}
