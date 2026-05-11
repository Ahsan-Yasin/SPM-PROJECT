<?php
namespace QuickPOS\Src;

class FormValidator {
    public static function validate(array $data): array {
        $name = isset($data['name']) ? trim($data['name']) : '';
        $email = isset($data['email']) ? trim($data['email']) : '';
        $message = isset($data['message']) ? trim($data['message']) : '';

        if ($name === '') {
            return ['valid' => false, 'error' => 'empty'];
        }
        if ($email === '') {
            return ['valid' => false, 'error' => 'empty'];
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return ['valid' => false, 'error' => 'email'];
        }
        if ($message === '') {
            return ['valid' => false, 'error' => 'empty'];
        }
        return ['valid' => true, 'error' => null];
    }
}
