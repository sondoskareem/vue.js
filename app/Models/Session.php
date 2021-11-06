<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Session extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $guarded = [];

protected $dates = [ 'created_at', 'date' ];

    public function user(){
        return $this->belongsTo(User::class , 'user_id');
    }

    public function section(){
        return $this->belongsTo(Section::class , 'section_id');
    }

}
