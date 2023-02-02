<?php

namespace App\Repositories;

use Validator as V;

/**
 * Class AbstractValidator.
 *
 * @author Sefa Karagöz <karagozsefa@gmail.com>
 */
abstract class AbstractValidator
{
    protected $errors;
    public function isValid(array $attributes, array $rules = null)
    {
        $v = V::make($attributes, ($rules) ? $rules : static::$rules);

        if ($v->fails()) {
            $this->setErrors($v->messages());

            return false;
        }

        return true;
    }


    public function getErrors()
    {
        return $this->errors;
    }


    public function setErrors($error)
    {
        $this->errors = $error;
    }
}
