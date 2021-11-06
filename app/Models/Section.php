<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Section extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $guarded = [];

    

    public function getImageAttribute($value)
    {
        return asset('public/uploads/images/'.$value);
    }

    public function sessions(){
        return $this->hasMany(Session::class);
    }
}
