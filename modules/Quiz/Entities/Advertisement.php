<?php

namespace Modules\Quiz\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Advertisement extends Model
{
    use HasFactory;

    protected $fillable = ['advertisement','website_url','video','interest_id'];
    
    protected static function newFactory()
    {
        return \Modules\Quiz\Database\factories\AdvertisementFactory::new();
    }

    public function interest(){
        return $this->belongsTo(Interest::class);
    }
}
