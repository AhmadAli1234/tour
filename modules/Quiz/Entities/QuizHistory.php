<?php

namespace Modules\Quiz\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class QuizHistory extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','status','date'];
    
    protected static function newFactory()
    {
        return \Modules\Quiz\Database\factories\QuizHistoryFactory::new();
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
