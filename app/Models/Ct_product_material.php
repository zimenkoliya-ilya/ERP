<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ct_product_material extends Model
{
    use HasFactory;
    public function storage(){
        return $this->belongsTo(Wh_storage::class);
    }
    public function product(){
        return $this->belongsTo(Ct_product::class);
    }
    public function item(){
        return $this->belongsTo(Wh_item::class);
    }
    public function company(){
        return $this->belongsTo(Zg_company::class);
    }
}
