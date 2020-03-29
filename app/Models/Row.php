<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Row extends Model
{
   protected $fillable = ['table_id'];

   public function table()
   {
        return $this->belongsTo(Table::class);
   }
}
