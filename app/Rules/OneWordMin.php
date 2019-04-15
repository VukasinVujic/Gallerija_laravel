<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class OneWordMin implements Rule
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
        for($i = 0; $i < strlen($value); $i++) {
            if(preg_match('/[0-9]{1,}/', $value[$i])) {
                return true;
            }
        }
        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'In password is required at least one number';
    }
}
