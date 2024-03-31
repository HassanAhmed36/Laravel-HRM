<?php

namespace App\Helpers;

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
}
