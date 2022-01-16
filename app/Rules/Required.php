<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

use function PHPUnit\Framework\isNull;

class Required implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if(is_array($value)){
            // dd(is_null($value[0]));
            return !is_null($value[0]);
        }
        return $value != '';
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return ':attribute không được để trống.';
    }
}
