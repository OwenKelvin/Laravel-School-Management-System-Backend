<?php

namespace App\Traits;

use App\User;

trait AppUser
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getFirstNameAttribute()
    {
        return $this->user->first_name;
    }

    public function getLastNameAttribute()
    {
        return $this->user->last_name;
    }

    public function getGenderNameAttribute()
    {
        return $this->user->gender_name;
    }

    public function getReligionNameAttribute()
    {
        return $this->user->religion_name;
    }

    public function getReligionIdAttribute()
    {
        return $this->user->religion_id;
    }

    public function getGenderIdAttribute()
    {
        return $this->user->gender_id;
    }

    public function getMiddleNameAttribute()
    {
        return $this->user->middle_name;
    }

    public function getOtherNamesAttribute()
    {
        return $this->user->other_names;
    }

    public function getDateOfBirthAttribute()
    {
        return $this->user->date_of_birth;
    }

    public function getBirthCertNumberAttribute()
    {
        return $this->user->birth_cert_number;
    }

    public function getPhoneAttribute()
    {
        return $this->user->phone;
    }

    public function getEmailAttribute()
    {
        return $this->user->email;
    }

    public function getNamePrefixPrefixAttribute()
    {
        return $this->user->namePrefix->prefix;
    }

    public function getNamePrefixIdAttribute()
    {
        if ($this->user->namePrefix == null) {
            return null;
        }
        return $this->user->namePrefix->id;

    }

}
