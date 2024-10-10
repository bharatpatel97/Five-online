<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    use HasFactory;

    public $table = "user_info";

    protected $fillable = array(
        'user_id',
        'phone',
        'bio',
        'birthday_date', 
        'joining_date', 
        'age', 
        'address', 
        'pincode', 
        'emergency_contact_person_name_1', 
        'emergency_contact_person_phone_1', 
        'emergency_contact_person_name_2', 
        'emergency_contact_person_phone_2', 
        'country', 
        'state', 
        'city'
    );

    public function user() 
    {
        return $this->belongsTo(User::class);
    }
}
