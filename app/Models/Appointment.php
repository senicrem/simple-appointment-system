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
    ];

    protected $hidden = [
        "created_at", "updated_at"
    ];

    public static function forMonth(int $month) {
        return self::whereMonth('scheduled_date', $month)->get();
    }
}
