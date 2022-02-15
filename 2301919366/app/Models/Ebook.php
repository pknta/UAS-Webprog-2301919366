<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ebook extends Model
{
    use HasFactory;

    protected $primaryKey = 'ebook_id';

    public function order(){
    	return $this->belongsTo(Order::class, 'order_id', 'order_id');
    }
}
