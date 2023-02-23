<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class UserHastaliklar extends Model
{
    protected $table      = "user_hastaliklar";
    public    $timestamps = false;
}
