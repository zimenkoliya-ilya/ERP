<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ct_product_category extends Model
{
    use HasFactory;
    public function company(){
        return $this->belongsTo(Zg_company::class);
    }
    public function user(){
        return $this->belongsTo(Zg_user::class);
    }
}
