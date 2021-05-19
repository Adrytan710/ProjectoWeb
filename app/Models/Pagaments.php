<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pagaments extends Model
{
    protected $table ='pagaments';
    protected $fillable =['categoria_id','compte_id','curs_id','nivell','titol','descripcio','preu','data_inici','data_fi','estat'];
}
