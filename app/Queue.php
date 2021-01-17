<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Queue extends Model
{
    protected $guarded = [];
    public function mikrotik(){
        return $this->belongsTo(Mikrotik::class);
    }
    public function queue_type(){
        return $this->belongsTo(Queue_type::class);
    }
}
