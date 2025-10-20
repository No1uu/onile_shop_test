<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Userdetail extends Model
{
    protected $table = 'user_details';

    protected $fillable = [
        'user_id',
        'lastname',
        'firstname',
        'phone_number',
        'city',
        'district',
        'address',
        'notes',
        'postal_code',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
