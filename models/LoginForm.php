<?php

namespace app\models;

use app\core\Application;
use app\core\Model;
use app\models\User;

class LoginForm extends Model
{
    public string $email = '';
    public string $password = '';

    public function rules(): array
    {
        return [
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
            'password' => [self::RULE_REQUIRED],
        ];
    }

    public function login()
    {
        $user = User::findOne(['email' => $this->email]); //User is DB model
        if (!$user) {
            $this->addError('email', 'User does not exist');
            return false;
        }
        if (!password_verify($this->password, $user->password)) {
            $this->addError('password', 'Incorrect password');
            return false;
        }
        return Application::$app->login($user);
    }

    public function labels(): array
    {
        return [
            'email' => 'Your Email',
            'password' => 'Password'
        ];
    }
}
?>
