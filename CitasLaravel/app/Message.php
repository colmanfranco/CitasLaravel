<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['username', 'subject', 'requested_to', 'user_id'];

    public function user()
    {
        $this->belongsTo(User::class);
    }

}

