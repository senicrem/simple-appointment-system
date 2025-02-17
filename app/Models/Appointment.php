<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable  = [
        "name",
        "email",
        "concern",
        "scheduled_date",
        "scheduled_time",
        "status",
    ];

    protected $hidden = [
        "created_at", "updated_at"
    ];

    public static function getByMonthAndYear(int $month, int $year) {
        return self::whereMonth('scheduled_date', $month)
        ->whereYear('scheduled_date', $year)
        ->get();
    }
}
