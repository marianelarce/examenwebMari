<?php

namespace App\Models;

use Illuminate\Database\DBAL\TimestampType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Habitacion extends Model
{
    use HasFactory;

    protected $table='habitacion';

    protected $primarykey='id';

    public $timestamps=false;

    protected $fillable=['tipo','numero','precio','fotografias'];

}
