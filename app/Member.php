<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = ['first_name', 'middle_name', 'last_name', 'birthday', 'number', 'address', 'updated_at'];
    protected $guarded = [];

    public function ministries()
    {
        return $this->belongsToMany(Ministry::class, 'member_ministries')->as('joined')->withTimestamps();
//        return $this->belongsToMany(Ministry::class)->using('App\Member_ministries');
    }
}
