<?php

namespace App\Providers;

use Illuminate\Auth\EloquentUserProvider;
use Illuminate\Contracts\Auth\Authenticatable as UserContract;

class LegacyUserProvider extends EloquentUserProvider
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
        $hashed = $user->getAuthPassword();

        // If the password starts with $2y$ or $2a$, it's already bcrypt
        if (str_starts_with((string)$hashed, '$2y$') || str_starts_with((string)$hashed, '$2a$')) {
            return parent::validateCredentials($user, $credentials);
        }

        // Check if it matches the legacy MD5 hash
        if (md5($plain) === $hashed) {
            // Upgrade the password to bcrypt for future logins
            $user->password = bcrypt($plain);
            $user->save();
            return true;
        }

        return false;
    }
}
