<?php

namespace App\Help;

use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Crypt;

class Services
{
    // Decrypt a given value
    public static function decrypt($value)
    {
        try {
            $value = Crypt::decrypt($value);
        } catch (\Exception $e) {
            return redirect()->route('home'); // Redirect to home if decryption fails

        }
        return $value;
    }
}
