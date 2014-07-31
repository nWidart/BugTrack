<?php namespace Bugtrack\Services\Validators;

abstract class Validator {
    /**
     * Attributes object, set on instantiation
     * @var object
     */
    protected $attributes;

    /**
     * The errors object, set if the validation fails
     * @var object
     */
    protected $errors;

    /**
     * Get the attributes
     * Default is Input::all if none provided
     *
     */
    public function __construct( $attributes = null )
    {
        $this->attributes = $attributes ?: \Input::all();
    }

    /**
     * Validation
     *
     * @return bool
     */
    public function passes()
    {
        $validation = \Validator::make( $this->attributes, static::$rules);
        if ($validation->passes()) return true;
        $this->errors = $validation->messages();
        return false;
    }

    /**
     * getter. Returns the $errors attribute
     *
     * @return obj Errors object
     */
    public function getErrors()
    {
        return $this->errors;
    }
}