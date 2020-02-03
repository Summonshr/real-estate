<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class User extends Authenticatable implements HasMedia
{
    use HasMediaTrait;

    protected $fillable = [
        'name', 'email', 'password', 'phone', 'address'
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

    public function sites()
    {
        return $this->hasMany(Site::class);
    }

    public function hasNoBalance()
    {
        return $this->balance < 100;
    }

    public function hasEnoughBalance()
    {
        return $this->balance >= 100;
    }
}
