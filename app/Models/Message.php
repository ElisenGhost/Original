<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function sender()
    {
        return $this->belongsTo(User::class, 'user_sender_id');
    }
    public function recipient()
    {
        return $this->belongsTo(User::class, 'user_recipient_id');
    }
}
