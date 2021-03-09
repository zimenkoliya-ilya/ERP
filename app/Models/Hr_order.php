<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hr_order extends Model
{
    use HasFactory;
    public function company_get($id){
        $order_type = Hr_order_type::find($id);
        $company = Zg_company::find($order_type->company_id);
        return $company->title;
    }
    public function type(){
        return $this->belongsTo(Hr_order_type::class);
    }
    public function user(){
        return $this->belongsTo(Zg_user::class);
    }
}
