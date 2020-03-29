<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    protected $fillable = ['name','tag'];

    public function cols()
    {
        return $this->hasMany(Col::class);
    }

    public function rows()
    {
        return $this->hasMany(Row::class);
    }

    public function items()
    {
        return $this->hasMany(Item::class);
    }

    public function table()
    {
        return $this->belongsTo(Table::class);
    }
}
