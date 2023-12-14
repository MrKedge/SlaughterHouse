<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class EmailDomains implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        // Extract the domain from the email address
        $domain = explode('@', $value)[1] ?? null;

        // Check if the domain is allowed
        return in_array($domain, ['yahoo.com', 'gmail.com']);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The :attribute must be a valid email address or domain.';
    }
}
