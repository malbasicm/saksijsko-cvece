<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    /**
     * The table associated with the model
     * 
     * @var string
     */
    protected $table = 'purchase';
    public $timestamps = false;
}
