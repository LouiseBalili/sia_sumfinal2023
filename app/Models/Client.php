<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'profile_pic',
        'fname',
        'lname',
        'address',
        'email',
        'phone',
        'initial_loan',
        'issuance_date'
    ];

    protected $appends = [
        'profile_pic_url',
    ];

    public function getProfilePicUrlAttribute() {
        $url = $this->profile_pic ? asset("images/client_profile_pics/" . $this->profile_pic) : 'https://img.freepik.com/premium-vector/flat-instagram-icons-notifications_619991-50.jpg';
        return $url;
    }

    public function loans()
    {
        return $this->hasMany('App\Models\Loan');
    }
}
