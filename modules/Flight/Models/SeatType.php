<?php


    namespace Modules\Flight\Models;


    use App\BaseModel;
    use Illuminate\Database\Eloquent\SoftDeletes;

    class SeatType extends BaseModel
    {
        use SoftDeletes;
        protected $table = 'bc_seat_type';
        protected $fillable  = ['name','code'];

    }