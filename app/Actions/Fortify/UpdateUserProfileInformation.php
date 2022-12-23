<?php

namespace App\Actions\Fortify;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;
use Nette\Utils\DateTime;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    /**
     * Validate and update the given user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    public function update($user, array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:75'],
            'des' => ['nullable', 'string', 'max:255'],
            'dob' => ['required', function ($attribute, $value, $fail) {
                $curryear = (int)date('Y');
                $dob = date_create($value);
                $yearborn = (int)date_format($dob, 'Y');
                $age = $curryear - $yearborn;
                if ($age < 6) {
                    $fail("Too young, kid. Only 6 or above allowed.");
                }
            }],
            'gender' => ['required', 'boolean'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'photo' => ['nullable', 'mimes:jpg,jpeg,png', 'max:1024'],
        ],)->validateWithBag('updateProfileInformation');

        if (isset($input['photo'])) {
            $user->updateProfilePhoto($input['photo']);
        }
        if (
            $input['email'] !== $user->email &&
            $user instanceof MustVerifyEmail
        ) {
            $this->updateVerifiedUser($user, $input);
        } else {
            $dob = date_create($input['dob']);
            $formattedDob = date_format($dob, "Y-m-d");

            $user->forceFill([
                'name' => $input['name'],
                'des' => $input['des'],
                'dob' => $formattedDob,
                'gender' => $input['gender'],
                'email' => $input['email'],
            ])->save();
        }
    }

    /**
     * Update the given verified user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    protected function updateVerifiedUser($user, array $input)
    {
        $user->forceFill([
            'email' => $input['email'],
            'email_verified_at' => null,
        ])->save();

        $user->sendEmailVerificationNotification();
    }
}
