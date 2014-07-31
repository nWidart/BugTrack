<?php namespace Bugtrack\Services\Validators;

class Bug extends Validator {
    public static $rules = [
        'title' => 'Required',
        'description' => 'Required',
    ];
}