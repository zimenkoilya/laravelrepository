<?php

namespace App\Providers;

use Illuminate\Auth\EloquentUserProvider;
use Illuminate\Contracts\Auth\Authenticatable as UserContract;

class CustomUserProvider extends EloquentUserProvider
{
    /**
     * Validate a user against the given credentials.
     *
     * @param  \Illuminate\Contracts\Auth\Authenticatable  $user
     * @param  array  $credentials
     * @return bool
     */
    public function validateCredentials(UserContract $user, array $credentials)
    {
        $plain = $credentials['password'];

        $password = $user->getAuthPassword();
        if (isset($password)) {
            return $this->hasher->check($plain, $user->getAuthPassword());    
        }
        else {
            $password = $user->getAuthPasswd();
            return sha1($plain) == $password;
        }
    }
}
