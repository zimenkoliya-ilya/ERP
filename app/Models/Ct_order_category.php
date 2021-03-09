<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ct_order_category extends Model
{
    use HasFactory;
    
    public function user(){
        return $this->belongsTo(Zg_user::class);
    }
}
