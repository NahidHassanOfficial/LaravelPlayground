<?php
namespace App\Enum;

enum GenderEnum: string {
    case Male   = 'male';
    case Female = 'female';
    case Other  = 'other';

    public function description(): string
    {
        return match ($this) {
            self::Male => 'Male',
            self::Female => 'Female',
            self::Other => 'Other',
        };
    }
}