<?php
namespace App\Models;
use App\Models\CRUD;

class Client extends CRUD{
      protected $table = "Clients";
      protected $primaryKey = "id";
      protected $fillable = ['name', 'address', 'phone', 'email'];   
}