<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;
 
class Booking extends Model
{
    protected $primaryKey = 'id_booking';
    public $incrementing = false;
    protected $table = "booking";
    protected $guarded = [];
}