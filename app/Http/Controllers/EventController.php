<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventController extends Controller
{
    
    public function index() {
        $vars = [
            'nome' => 'Teste',
            'description' => 'Descrição do site',
            'array' => [
                'nome' => 'Teste',
                'title' => 'Home',
                'description' => 'Descrição do site'
            ],
        ];
    
        return view('welcome', $vars);
    }

    public function create() {
        return view('events.create');
    }

}
