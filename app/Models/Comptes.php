<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comptes extends Model
{
    protected $table ='comptes';
    protected $fillable =['compte','fuc','clau'];
}
