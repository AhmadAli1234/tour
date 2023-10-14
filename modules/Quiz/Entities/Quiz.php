<?php

namespace Modules\Quiz\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Quiz extends Model
{
    use HasFactory;

    protected $fillable = ['question','answer','interest_id','latitude','longitude'];
    
    protected static function newFactory()
    {
        return \Modules\Quiz\Database\factories\QuizFactory::new();
    }

    public function interest(){
        return $this->belongsTo(Interest::class);
    }
}
