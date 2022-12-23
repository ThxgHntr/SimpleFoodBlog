<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'dob' => ['required', function ($attribute, $value, $fail) {
                $curryear = (int)date('Y');
                $dob = date_create($value);
                $yearborn = (int)date_format($dob, 'Y');
                $age = $curryear - $yearborn;
                echo $age;
                if ($age < 6) {
                    $fail("Too young, kid. Only 6 or above allowed.");
                }
            }],
            'gender' => ['required', 'boolean'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        $dob = date_create($input['dob']);
        $formattedDob = date_format($dob,"Y-m-d");

        return User::create([
            'name' => $input['name'],
            'dob' => $formattedDob,
            'gender' => $input['gender'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
