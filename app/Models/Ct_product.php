<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ct_product extends Model
{
    use HasFactory;
    public function category(){
        return $this->belongsTo(Ct_product_category::class);
    }
    public function user(){
        return $this->belongsTo(Zg_user::class);
    }
    public function company(){
        return $this->belongsTo(Zg_company::class);
    }
}
