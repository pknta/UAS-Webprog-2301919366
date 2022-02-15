<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    use HasFactory;

    protected $primaryKey = 'gender_id';

    public function account(){
    	return $this->hasMany(Account::class, 'gender_id', 'account_id');
    }
}
