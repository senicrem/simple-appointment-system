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
}
