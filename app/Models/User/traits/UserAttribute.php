<?php

namespace App\Models\User\traits;


trait UserAttribute
{
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }
}
