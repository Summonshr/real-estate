<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    protected $fillable = [
        'name', 'email', 'password', 'phone'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    public function properties()
    {
        return $this->hasMany(Property::class);
    }

    public function deduct($amount)
    {
        $this->balance = $this->balance - $amount;
        $this->save();
    }

    public function recharge($amount)
    {
        $this->balance = $this->balance + $amount;
        $this->save();
    }

    public function isAgent()
    {
        return $this->role === 'agent';
    }

    public function getName()
    {
        return $this->name ?? $this->email ?? 'Agent';
    }
}
