<?php

namespace App\Helpers;

use App\Events\NotificationSent;
use App\Models\User;
use App\Notifications\NewNotification;
use Illuminate\Support\Facades\Auth;

class CustomHelper
{
    public static function getAttendanceStatus($status)
    {
        switch ($status) {
            case 1:
                return 'Present';
            case 0:
                return 'Not Mark';
            case 3:
                return 'Late';
            case 4:
                return 'Half day';
            case 5:
                return 'Sunday';
            case 6:
                return 'Unpaid';
            case 7:
                return 'Sick';
            case 8:
                return 'Casual';
            case 9:
                return 'Annual';
            case 10:
                return 'Holiday';
        }
    }


    public static function SendNotification($users, $type, $message)
    {
        foreach ($users as $user) {
            $user->notify(new NewNotification([
                'type' => $type,
                'message' => $message
            ]));
        }
    }
}
