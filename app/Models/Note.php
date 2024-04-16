<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    public function users()
    {
        // note belongs to user
        return $this->belongsTo(User::class);
    }
}
