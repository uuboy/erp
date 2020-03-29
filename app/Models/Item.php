<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['table_id','col_id','row_id','int_val','float_val','text_val','date_val'];
}
