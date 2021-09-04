<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reclamation;

class ReclamationController extends Controller
{
    public function index(){
        $listeReclamation= Reclamation::all();

             return view('reclamation.index',['Reclamation'=>$listeReclamation]);

    }

    public function create(){
        return view('reclamation.create');
    }

    public function store(Request $request){
        $Reclamation = new Reclamation();
        // $Reclamation->objet = Auth::user()->id;
        $Reclamation->objet = $request->input('objet');
        $Reclamation->message = $request->input('message');
        $Reclamation->etat = $request->input('etat');
        // $Reclamation->etat = $request->input('etat');

        // if($request->hasFile('photo')){
        //     $demande->photo = $request->photo->store('image');
        // }

        $Reclamation->save();
        return redirect('Reclamationliste');
    }

    public function edite($id){
        $Reclamation = Reclamation::find($id);

        return view ('reclamation.edite', ['Reclamation'=> $Reclamation]);
    }

    public function update(Request $request , $id){
        $Reclamation = Reclamation::find($id);

        $Reclamation->objet = $request->input('objet');
        $Reclamation->message = $request->input('message');
        $Reclamation->etat = $request->input('etat');

        $Reclamation->save();
        return redirect('Reclamationliste');
    }

    public function destroy(Request $request , $id){
        $Reclamation = Reclamation::find($id);

        $Reclamation->delete();
        return redirect('Reclamationliste');

    }
}
