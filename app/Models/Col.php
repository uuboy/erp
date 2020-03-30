<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Col extends Model
{
    protected $fillable = ['name','tag', 'data_sort'];

    public function table()
    {
        return $this->belongsTo(Table::class);
    }

    public function items()
    {
        return $this->hasMany(Item::class);
    }

}
