<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Http;

class Recaptcha implements ValidationRule
{
  /**
   * Run the validation rule.
   *
   * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
   */
  public function validate(string $attribute, mixed $value, Closure $fail): void
  {
    $google_response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
      'secret' => config('services.recaptcha.secret_key'),
      'response' => $value,
      'remoteip' => \request()->ip()
    ]);

    if (!$google_response->json('success')) {
      $fail("The {$attribute} is invalid.");
    }
  }
}
