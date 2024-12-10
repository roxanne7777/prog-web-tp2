<?php 

namespace App\Controllers;
use App\Models\ExampleModel;
use App\Providers\View;

class HomeController {
    public function index() {
        $model = new ExampleModel();
        $data = $model->getData();
        return View::render('home.php');       
         }

    public function about(){
        echo "page à propos de nous";
    }
}