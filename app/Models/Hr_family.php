<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hr_family extends Model
{
    use HasFactory;
    function relation_family(){
        
        return $this->belongsTo(Hr_family_type::class, "relation", "id");
    }
}
