<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OpeningHour extends Model
{
    use HasFactory;

    public const WEEKLY = 0;
    public const REPEAT_EVEN_WEEKS = 1;
    public const REPEAT_ODD_WEEKS = 2;

    public $timestamps = false;
}
