<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Pengajar extends Model{

    use SoftDeletes;
    protected $guarded=[];

    public function get_program(){
        return $this->belongsTo('App\Program', 'program_id');
    }
}
