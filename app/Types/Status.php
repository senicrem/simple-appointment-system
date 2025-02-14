<?php

namespace App\Types;

enum Status: string
{
    case Progress = 'progress';
    case Completed = 'completed';
    case Cancel = 'cancel';
}