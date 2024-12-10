<?php
namespace App\Models;
use App\Models\CRUD;

class Paiement extends CRUD{
      protected $table = "paiement";
      protected $primaryKey = "id";
      protected $fillable = ['rental_id', 'amount', 'payment_date', 'payment_method'];   
}