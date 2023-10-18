<?php

namespace Modules\Quiz\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Interest extends Model
{
    use HasFactory;

    protected $fillable = ['name','parent_id','image'];
    
    protected static function newFactory()
    {
        return \Modules\Quiz\Database\factories\InterestFactory::new();
    }

    public function parent(){
        return $this->belongsTo(Interest::class,'parent_id','id');
    }

    public function childs(){
        return $this->hasMany(Interest::class,'parent_id','id');
    }
}
