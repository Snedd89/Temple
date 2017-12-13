<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    // Table Name
    protected $table = "characters";
    // Primary Key
    public $primaryKey = "id";
    // Timestamps
    public $timestamps = false;

    // Relate booking to the user
    public function user(){
        return $this->belongsTo('App\User');
    }
}
