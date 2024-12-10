<?php
namespace App\Controllers;

use App\Models\Paiement;
use App\Providers\View;

class PaiementController {
    // Affiche la liste des paiements
    public function index() {
        $paiement = new Paiement;
        $select = $paiement->select('payment_date'); // Trier par la date du paiement
        if ($select) {
            return View::render('paiement/index', ['paiements' => $select]);
        }
        return View::render('error', ['msg' => 'No payments found']);
    }

    // Affiche les détails d'un paiement spécifique
    public function show($data = []) {
        if (isset($data['id']) && $data['id'] != null) {
            $paiement = new Paiement;
            $selectId = $paiement->selectId($data['id']);
            if ($selectId) {
                return View::render('paiement/show', ['paiement' => $selectId]);
            } else {
                return View::render('error', ['msg' => 'Payment not found']);
            }
        }
        return View::render('error', ['msg' => 'Invalid payment ID']);
    }
}
?>