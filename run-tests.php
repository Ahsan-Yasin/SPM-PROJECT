<?php
/**
 * Comprehensive Test Runner for QuickPOS
 * Works without full Composer dependencies
 * Provides testing, analysis, and reporting
 */

echo "=== QuickPOS Test Suite ===\n\n";

// Test Results
$results = [
    'files' => ['passed' => 0, 'failed' => 0, 'total' => 0],
    'content' => ['passed' => 0, 'failed' => 0, 'total' => 0],
    'validator' => ['passed' => 0, 'failed' => 0, 'total' => 0],
    'syntax' => ['passed' => 0, 'failed' => 0, 'total' => 0],
    'security' => ['passed' => 0, 'failed' => 0, 'total' => 0]
];

// 1. File Existence Tests
echo "1. FILE EXISTENCE TESTS\n";
echo "======================\n";

$requiredFiles = [
    'index.php' => 'Main landing page',
    'process_form.php' => 'Form processor',
    'thankyou.php' => 'Thank you page',
    'assets/css/style.css' => 'Stylesheet',
    'assets/js/main.js' => 'JavaScript',
    'src/FormValidator.php' => 'Form validator class',
    'tests/ContactFormTest.php' => 'Contact form tests',
    'tests/PageLoadTest.php' => 'Page load tests',
    'composer.json' => 'Composer configuration',
    'composer.lock' => 'Composer lock file',
    '.github/workflows/ci.yml' => 'CI/CD pipeline',
    'README.md' => 'Documentation',
    'DEPLOYMENT-GUIDE.md' => 'Deployment guide'
];

foreach ($requiredFiles as $file => $description) {
    $results['files']['total']++;
    if (file_exists($file)) {
        echo "✅ PASS: $file - $description\n";
        $results['files']['passed']++;
    } else {
        echo "❌ FAIL: $file - $description (MISSING)\n";
        $results['files']['failed']++;
    }
}

// 2. Content Validation Tests
echo "\n2. CONTENT VALIDATION TESTS\n";
echo "==========================\n";

$contentTests = [
    'index.php' => [
        'features' => 'Features section present',
        'pricing' => 'Pricing section present',
        'contact' => 'Contact section present',
        'QuickPOS' => 'QuickPOS branding',
        'method="POST"' => 'POST form method',
        'assets/css/style.css' => 'CSS stylesheet linked',
        'assets/js/main.js' => 'JavaScript file linked',
        'htmlspecialchars' => 'XSS protection present'
    ],
    'process_form.php' => [
        '$_SERVER[\'REQUEST_METHOD\']' => 'Request method validation',
        'filter_var' => 'Email validation',
        'FILTER_VALIDATE_EMAIL' => 'Email filter constant',
        'header(' => 'Redirect functionality',
        'htmlspecialchars' => 'Input sanitization'
    ],
    'composer.json' => [
        'phpunit/phpunit' => 'PHPUnit dependency',
        'phpstan/phpstan' => 'PHPStan dependency',
        'autoload' => 'PSR-4 autoloading'
    ]
];

foreach ($contentTests as $file => $tests) {
    if (file_exists($file)) {
        $content = file_get_contents($file);
        echo "\n📄 Testing $file:\n";
        
        foreach ($tests as $search => $description) {
            $results['content']['total']++;
            if (strpos($content, $search) !== false) {
                echo "  ✅ PASS: $description\n";
                $results['content']['passed']++;
            } else {
                echo "  ❌ FAIL: $description (NOT FOUND)\n";
                $results['content']['failed']++;
            }
        }
    }
}

// 3. FormValidator Tests
echo "\n\n3. FORM VALIDATOR TESTS\n";
echo "=======================\n";

if (file_exists('src/FormValidator.php')) {
    require_once 'src/FormValidator.php';
    
    $validatorTests = [
        [
            'name' => 'Valid data test',
            'data' => ['name' => 'John Doe', 'email' => 'test@example.com', 'message' => 'Test message'],
            'expected' => ['valid' => true, 'error' => null]
        ],
        [
            'name' => 'Invalid email test',
            'data' => ['name' => 'John Doe', 'email' => 'invalid-email', 'message' => 'Test message'],
            'expected' => ['valid' => false, 'error' => 'email']
        ],
        [
            'name' => 'Empty name test',
            'data' => ['name' => '', 'email' => 'test@example.com', 'message' => 'Test message'],
            'expected' => ['valid' => false, 'error' => 'empty']
        ],
        [
            'name' => 'Empty message test',
            'data' => ['name' => 'John Doe', 'email' => 'test@example.com', 'message' => ''],
            'expected' => ['valid' => false, 'error' => 'empty']
        ],
        [
            'name' => 'Empty email test',
            'data' => ['name' => 'John Doe', 'email' => '', 'message' => 'Test message'],
            'expected' => ['valid' => false, 'error' => 'empty']
        ]
    ];
    
    foreach ($validatorTests as $test) {
        $results['validator']['total']++;
        $result = QuickPOS\Src\FormValidator::validate($test['data']);
        
        if ($result['valid'] === $test['expected']['valid'] && $result['error'] === $test['expected']['error']) {
            echo "✅ PASS: {$test['name']}\n";
            $results['validator']['passed']++;
        } else {
            echo "❌ FAIL: {$test['name']} - Expected: " . json_encode($test['expected']) . ", Got: " . json_encode($result) . "\n";
            $results['validator']['failed']++;
        }
    }
} else {
    echo "❌ FAIL: FormValidator class not found\n";
    $results['validator']['failed']++;
    $results['validator']['total']++;
}

// 4. PHP Syntax Tests
echo "\n4. PHP SYNTAX TESTS\n";
echo "===================\n";

$phpFiles = [
    'index.php',
    'process_form.php',
    'thankyou.php',
    'src/FormValidator.php',
    'simple-test-runner.php',
    'run-tests.php'
];

foreach ($phpFiles as $file) {
    if (file_exists($file)) {
        $results['syntax']['total']++;
        $output = [];
        $returnCode = 0;
        
        // Try to find PHP executable
        $phpExecutable = 'C:\\xampp\\php\\php.exe';
        if (!file_exists($phpExecutable)) {
            $phpExecutable = 'php';
        }
        
        exec("$phpExecutable -l \"$file\" 2>&1", $output, $returnCode);
        
        if ($returnCode === 0) {
            echo "✅ PASS: $file syntax OK\n";
            $results['syntax']['passed']++;
        } else {
            echo "❌ FAIL: $file syntax error - " . implode(' ', $output) . "\n";
            $results['syntax']['failed']++;
        }
    }
}

// 5. Security Analysis
echo "\n5. SECURITY ANALYSIS\n";
echo "====================\n";

$securityTests = [
    'index.php' => [
        'htmlspecialchars' => 'XSS protection',
        '$_GET' => 'Input sanitization for GET'
    ],
    'process_form.php' => [
        'htmlspecialchars' => 'Input sanitization',
        'trim(' => 'Input trimming',
        'filter_var' => 'Email validation',
        'empty(' => 'Empty field validation'
    ]
];

foreach ($securityTests as $file => $tests) {
    if (file_exists($file)) {
        $content = file_get_contents($file);
        echo "\n🔒 Security check for $file:\n";
        
        foreach ($tests as $search => $description) {
            $results['security']['total']++;
            if (strpos($content, $search) !== false) {
                echo "  ✅ PASS: $description\n";
                $results['security']['passed']++;
            } else {
                echo "  ❌ FAIL: $description (NOT FOUND)\n";
                $results['security']['failed']++;
            }
        }
    }
}

// 6. Generate Report
echo "\n\n6. TEST REPORT\n";
echo "=============\n";

$totalTests = array_sum(array_column($results, 'total'));
$totalPassed = array_sum(array_column($results, 'passed'));
$totalFailed = array_sum(array_column($results, 'failed'));
$successRate = $totalTests > 0 ? round(($totalPassed / $totalTests) * 100, 2) : 0;

echo "📊 SUMMARY:\n";
echo "   Total Tests: $totalTests\n";
echo "   Passed: $totalPassed\n";
echo "   Failed: $totalFailed\n";
echo "   Success Rate: $successRate%\n\n";

echo "📋 BREAKDOWN:\n";
foreach ($results as $category => $data) {
    $categoryRate = $data['total'] > 0 ? round(($data['passed'] / $data['total']) * 100, 2) : 0;
    echo "   " . strtoupper($category) . ": {$data['passed']}/{$data['total']} ($categoryRate%)\n";
}

// 7. Deployment Readiness
echo "\n🚀 DEPLOYMENT READINESS:\n";
if ($successRate >= 95) {
    echo "✅ READY FOR DEPLOYMENT - Excellent test results!\n";
} elseif ($successRate >= 85) {
    echo "⚠️  MOSTLY READY - Minor issues to address\n";
} else {
    echo "❌ NOT READY - Major issues need fixing\n";
}

// 8. Recommendations
echo "\n💡 RECOMMENDATIONS:\n";
if ($results['files']['failed'] > 0) {
    echo "• Fix missing files before deployment\n";
}
if ($results['syntax']['failed'] > 0) {
    echo "• Fix PHP syntax errors immediately\n";
}
if ($results['security']['failed'] > 0) {
    echo "• Address security vulnerabilities\n";
}
if ($results['validator']['failed'] > 0) {
    echo "• Fix form validation logic\n";
}

echo "\n=== Test Complete ===\n";

// Return exit code based on results
exit($totalFailed > 0 ? 1 : 0);

?>
