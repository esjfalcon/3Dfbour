<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fournisseur;

class FournisseurController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request){
        $frs = new Fournisseur();
        $frs->raison_sociale = $request->input('raison_sociale');
        $frs->type = $request->input('type');
        $frs->taille = $request->input('taille');
        $frs->adresse = $request->input('adresse');
        $frs->telephone = $request->input('telephone');


        // dd($frs);
        $frs->save();
        return redirect('fournisseurliste');
    }

    public function telecharger($id){
        // $image = Demande::where('id', $id)->firstOrFail();
        // // $image= Demande::all()->where('id', $id);
        // $path = public_path(). '\image'. $image->filename;
        // return response()->download($path, $image
        //     ->original_filename, ['Content-Type' => $image->mime]);
        return redirect('demandesenattend');
    }

    public function index(){
        $listeFournissuer= Fournisseur::all();

             return view('fournisseur.index',['Fournissuer'=>$listeFournissuer]);

    }

    public function create(){
        return view('fournisseur.create');
    }

    public function edite($id){
        $demande = Fournisseur::find($id);

        return view ('demande.edite', ['Fournissuer'=> $demande]);
    }
    public function update(Request $request , $id){
        $demande = Fournisseur::find($id);

        $demande->type = $request->input('type');
        $demande->estTemps = $request->input('estTemps');
        $demande->demension = $request->input('demension');
        $demande->etat = $request->input('etat');

        if($request->hasFile('photo')){
            $demande->photo = $request->photo->store('image');
        }
        // dd($demande);
        $demande->save();
        return redirect('demandesenattend');
    }
    public function destroy(Request $request , $id){
        $frs = Fournisseur::find($id);
        // dd($frs);
        $frs->delete();

        return redirect('fournisseurliste');

    }

    public function afficher($id){
        $demande = Fournisseur::find($id);
        return view ('demande.afficher', ['Fournissuer'=> $demande]);
    }
}
