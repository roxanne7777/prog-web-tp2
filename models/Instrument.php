<?php
namespace App\Models;
use App\Models\CRUD;

class Instrument extends CRUD{
      protected $table = "instrument";
      protected $primaryKey = "id";
      protected $fillable = ['name', 'type', 'price_per_day', 'availability'];   
}