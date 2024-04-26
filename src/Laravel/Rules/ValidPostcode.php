<?php

namespace C6Digital\MapIt\Laravel\Rules;

use C6Digital\MapIt\MapIt;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ValidPostcode implements ValidationRule
{
    public function __construct(
        protected MapIt $mapIt,
    ) {
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $result = $this->mapIt->postcode($value);

        if ($result === null || isset($result['error'])) {
            $fail('The :attribute must be a valid postcode.');
        }
    }
}
