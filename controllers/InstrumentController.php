<?php
namespace App\Controllers;

use App\Models\Instrument;
use App\Providers\View;

class InstrumentController {
    // Affiche la liste des instruments
    public function index() {
        $instrument = new Instrument;
        $select = $instrument->select('name'); 
        if ($select) {
            return View::render('instrument/index', ['instruments' => $select]);
        }
        return View::render('error', ['msg' => 'No instruments found']);
    }

    // Affiche les détails d'un instrument spécifique
    public function show($data = []) {
        if (isset($data['id']) && $data['id'] != null) {
            $instrument = new Instrument;
            $selectId = $instrument->selectId($data['id']);
            if ($selectId) {
                return View::render('instrument/show', ['instrument' => $selectId]);
            } else {
                return View::render('error', ['msg' => 'Instrument not found']);
            }
        }
        return View::render('error', ['msg' => 'Invalid instrument ID']);
    }
}
?>


