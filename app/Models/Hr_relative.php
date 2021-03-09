<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hr_relative extends Model
{
    use HasFactory;
    function relation_relative(){
        return $this->belongsTo(Hr_family_type::class, "relation_id", "id");
    }
}
