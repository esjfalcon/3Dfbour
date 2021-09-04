<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
    public function index(){
        $client= Client::all();

        return view('clients.index',['client'=>$client]);

    }
    public function create(){}
    public function store(){}
    public function edite(){}
    public function update(){}
    public function destroy(){}
}
