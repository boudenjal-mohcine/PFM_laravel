<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hebergement extends Model
{
    protected $fillable = [
        'id_user',
        'hotel/villa',
        'id_hotel/villa',
        'begin',
        'end',
        'total_price',
    ];
}
