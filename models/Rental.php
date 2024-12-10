<?php
namespace App\Models;
use App\Models\CRUD;

class Rental extends CRUD{
      protected $table = "rental";
      protected $primaryKey = "id";
      protected $fillable = ['client_id', 'instrument_id', 'rental_duration', 'rental_cost', 'rental_date'];   
}