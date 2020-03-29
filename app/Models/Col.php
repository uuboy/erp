<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Col extends Model
{
    $fillable = ['name','tag','table_id'];

    function table()
    {
        return $this->belongsTo(Table::class);
    }

}
