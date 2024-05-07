<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $table = 'members';	

    protected $fillable = [
        'membership_name',
        'membership_email',
        'membership_phone',
        'membership_card_number',
        'membership_id',
       
    ];
}
