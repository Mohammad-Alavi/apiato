<?php

namespace App\Containers\AppSection\Authentication\Tasks;

use App\Ship\Contracts\MustVerifyEmail;
use App\Ship\Parents\Tasks\Task as ParentTask;

class SendVerificationEmailTask extends ParentTask
{
    public function run(MustVerifyEmail $user, string|null $verificationUrl = null): void
    {
        if (config('appSection-authentication.require_email_verification') && !$user->hasVerifiedEmail() && null !== $verificationUrl) {
            $user->sendEmailVerificationNotificationWithVerificationUrl($verificationUrl);
        }
    }
}
