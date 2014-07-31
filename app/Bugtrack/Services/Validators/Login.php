<?php namespace Bugtrack\Services\Validators;

class Login extends Validator {
    public static $rules = [
        'email' => 'Required|email',
        'password' => 'Required',
    ];
}