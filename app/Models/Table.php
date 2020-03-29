<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    $fillable = ['name','tag'];

    function cols()
    {
        return $this->hasMany(Col::class);
    }

    function rows()
    {
        return $this->hasMany(Row::class);
    }

    function items()
    {
        return $this->hasMany(Item::class);
    }

    function table()
    {
        return $this->belongsTo(Table::class);
    }
}
