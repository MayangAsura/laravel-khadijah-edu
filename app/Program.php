<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Program extends Model
{   
    use SoftDeletes;
    //TULIS FIELD YANG TIDAK DIISI DI GUARDED
    protected $guarded = ['student_price'];

    //HIDDEN FIELD
    protected $hidden = ['created_at', 'updated_at'];
    
    //FUNGSI UTK MERELASIKAN KE TABLE EDULEVELS (METODE INI => ELOQUENT ORM), PAKAI MODEL ('Edulevel')
    public function edulevel(){
        return $this->belongsTo('App\Edulevel', 'edulevely_id'); // edulevely_id = FOREIGN KEY
    }
}
