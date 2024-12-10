<?php
namespace App\Controllers;

use App\Models\Rental;
use App\Models\Client;
use App\Models\Instrument;
use App\Providers\View;
use App\Providers\Validator;

class RentalController {
    public function index() {
        // Récupérer toutes les locations
        $rentalModel = new Rental;
        $rentals = $rentalModel->select(); 
        
        foreach ($rentals as &$rental) {
            // Récupérer le client associé à cette location
            $clientModel = new Client;
            $client = $clientModel->selectId($rental['client_id']);
            $rental['client_name'] = $client['name']; 

            // Récupérer l'instrument associé à cette location
            $instrumentModel = new Instrument;
            $instrument = $instrumentModel->selectId($rental['instrument_id']);
            $rental['instrument_name'] = $instrument['name']; 
        }

        return View::render('rental/index', ['rentals' => $rentals]);
    }

    public function show($data = []) {
        if (isset($data['id']) && $data['id'] != null) {
            $rental = new Rental;
            $selectId = $rental->selectId($data['id']);
            if ($selectId) {
                return View::render('rental/show', ['rental' => $selectId]);
            } else {
                return View::render('error', ['msg' => 'Could not find this rental']);
            }
        }
        return View::render('error');
    }

    public function create() {
        View::render('rental/create');
    }

    public function store($data = []) {
        $validator = new Validator;
        $validator->field('client_id', $data['client_id'])->required()->numeric();
        $validator->field('instrument_id', $data['instrument_id'])->required()->numeric();
        $validator->field('rental_duration', $data['rental_duration'])->required()->numeric();
        $validator->field('rental_cost', $data['rental_cost'])->required()->numeric();
        $validator->field('rental_date', $data['rental_date'])->required()->date();

        if ($validator->isSuccess()) {
            $rental = new Rental;
            $insert = $rental->insert($data);
            if ($insert) {
                return View::redirect('rental/show?id=' . $insert);
            } else {
                return View::render('error');
            }
        } else {
            $errors = $validator->getErrors();
            $inputs = $data;
            return View::render('rental/create', ['errors' => $errors, 'inputs' => $inputs]);
        }
    }

    public function edit($get = []) {
        if (isset($get['id']) && $get['id'] != null) {
            $rental = new Rental;
            $selectId = $rental->selectId($get['id']);
            if ($selectId) {
                return View::render('rental/edit', ['inputs' => $selectId]);
            } else {
                return View::render('error');
            }
        }
        return View::render('error');
    }

    public function update($data = [], $get = []) {
        if (isset($get['id']) && $get['id'] != null) {
            $validator = new Validator;
            $validator->field('client_id', $data['client_id'])->required()->numeric();
            $validator->field('instrument_id', $data['instrument_id'])->required()->numeric();
            $validator->field('rental_duration', $data['rental_duration'])->required()->numeric();
            $validator->field('rental_cost', $data['rental_cost'])->required()->numeric();
            $validator->field('rental_date', $data['rental_date'])->required()->date();

            if ($validator->isSuccess()) {
                $rental = new Rental;
                $update = $rental->update($data, $get['id']);
                if ($update) {
                    return View::redirect('rental/show?id=' . $get['id']);
                } else {
                    return View::render('error');
                }
            } else {
                $errors = $validator->getErrors();
                $inputs = $data;
                return View::render('rental/edit', ['errors' => $errors, 'inputs' => $inputs]);
            }
        }
        return View::render('error');
    }

    public function delete($data = []) {
        $rental = new Rental;
        $delete = $rental->delete($data['id']);
        if ($delete) {
            return View::redirect('rental');
        }
        return View::render('error');
    }
}