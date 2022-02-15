<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Account extends Authenticatable
{
    use HasFactory;

    protected $primaryKey = 'account_id';

    public function gender(){
    	return $this->belongsTo(Gender::class, 'gender_id', 'gender_id');
    }

    public function role(){
    	return $this->belongsTo(Role::class, 'role_id', 'role_id');
    }

    public function isAdmin() {
        return $this->role->role_desc === 'Admin';
    }

    public function isUser() {
        return $this->role->role_desc === 'User';
    }
}
