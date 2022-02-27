<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

use function PHPSTORM_META\type;

class Number implements Rule
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
        $check = true;
        foreach ($value as $key => $val) {
            $int_val = intval($val);
            if($int_val <= 0) {
                $check = false;
            }
        }
        // dd($value, $check);
        return $check;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return ':attribute lớn hơn không.';
    }
}
