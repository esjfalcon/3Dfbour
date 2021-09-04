<?php


namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Models\Demande;
use App\Models\Image;
use App\Models\UserImage;

use Illuminate\Support\Facades\Auth as FacadesAuth;

class DemandeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request){
        $demande = new demande();
        $demande->user_id = Auth::user()->id;
        $demande->pack = $request->input('pack');
        $demande->type = $request->input('type');
        $demande->estTemps = $request->input('estTemps');
        $demande->demension = $request->input('demension');
        $demande->etat = $request->input('etat');
        $demande->photo = "null";
        $demande->tele = $request->input('tele');
        $demande->save();
        // if($request->hasFile('photo')){
        //     $demande->photo = $request->photo->store('image');
        // }
        

        $id = $demande->id;
        
        $images=array();
        if($files=$request->file('photo')){
            foreach($files as $file){
                $extension = $file->extension();
                $name = uniqid().'.'.$extension;
                $file->move('Userimage', $name);
                $image = new UserImage;
                $image->demande_id = $id;
                $image->path = $name;
                $image->save();
            }
        }
        return redirect('demandesenattend');
    }

    public function telecharger($id){
        // $image = Demande::where('id', $id)->firstOrFail();
        // // $image= Demande::all()->where('id', $id);
        // $path = public_path(). '\image'. $image->filename;
        // return response()->download($path, $image
        //     ->original_filename, ['Content-Type' => $image->mime]);
        // $filepath = public_path('uploads/image/')."abc.jpg";
        // return Response::download($filepath);
        return redirect('demandesenattend');
    }

    public function index(){
        if(Auth::user()->type =='admin'){
        $listeDemande= Demande::all()->where('etat','Terminer')->where('user_id',Auth::user()->id);

             return view('demande.indexTerminé',['demandes'=>$listeDemande]);
         }
    }
    public function index2(){
        $listeDemande= Demande::all()->where('etat','En cours')->where('user_id',Auth::user()->id);

             return view('demande.index',['demandes'=>$listeDemande]);

    }
    public function index3(){
        if(Auth::user()->type =='admin'){
        $listeDemande= Demande::all()->where('etat','En attend');

             return view('demande.indexenattend',['demandes'=>$listeDemande]);
            }
            else{
                $listeDemande= Demande::all()->where('etat','En attend')->where('user_id',Auth::user()->id);

             return view('demande.indexenattend',['demandes'=>$listeDemande]);
            }
            
    }
    public function create(Request $request){
        $type = $request->input('name');
        return view('demande.create',['type'=>$type]);
        // dd($request->input('name'));
    }
    // view
    public function contact(){
        return view ('contact');
    }

    public function edite($id){
        $demande = Demande::find($id);

        return view ('demande.edite', ['demande'=> $demande]);
    }
    public function update(Request $request , $id){
        $request->all();
        // dd($request->file('imageFile'));
        $demande = Demande::find($id);

        $demande->type = $request->input('type');
        $demande->estTemps = $request->input('estTemps');
        $demande->demension = $request->input('demension');
        $demande->etat = $request->input('etat');

        // if($request->hasFile('photo')){
        //     $demande->photo = $request->photo->store('image');
        // }
        // dd($demande);
        

        $images=array();
        if($files=$request->file('imageFile')){
            foreach($files as $file){
                $extension = $file->extension();
                $name = uniqid().'.'.$extension;
                $file->move('image', $name);
                $image = new Image;
                $image->demande_id = $id;
                $image->path = $name;
                $image->save();
            }
        }
        $demande->save();

        return redirect('demandesenattend');
    }
    public function destroy(Request $request , $id){
        $demande = Demande::find($id);

        $demande->delete();
        return redirect('demandesenattend');

    }

    public function afficher($id){
        $demande = Demande::find($id);

        $current_user  = Auth::user();
        // dd($current_user->demande->id);
        if($demande !== null){
            if($current_user->id !== $demande->user_id && Auth::user()->role !=='admin'){
                abort(404);
            }else{
                return view ('demande.afficher', ['demande'=> $demande]);
            }
        }else{
            abort(404);
        }
    }


    // PACK GOLD
    public function Gold_en_attente(){
        $pack = "Gold";
        $etat = "En attend";
        // $demandes = Demande::where('pack', $pack)->get();
        $demandes = Demande::where([['pack', '=', $pack],
                                    ['etat', '=', $etat]])->get();
        // dd($demandes);
        return view('gold.Gold_en_attente', ['demandes'=> $demandes]);
    }

    public function Gold_en_cours(){
        $pack = "Gold";
        $etat = "En cours";
        // $demandes = Demande::where('pack', $pack)->get();
        $demandes = Demande::where([['pack', '=', $pack],
                                    ['etat', '=', $etat]])->get();
        // dd($demandes);
        return view('gold.Gold_en_cours', ['demandes'=> $demandes]);
    }

    public function Gold_termine(){
        $pack = "Gold";
        $etat = "Terminer";
        // $demandes = Demande::where('pack', $pack)->get();
        $demandes = Demande::where([['pack', '=', $pack],
                                    ['etat', '=', $etat]])->get();
        // dd($demandes);
        return view('gold.Gold_termine', ['demandes'=> $demandes]);
    }



    // PACK FABOUR
    public function Fabour_en_attente(){
        $pack = "GRATUIT";
        $etat = "En attend";
        // $demandes = Demande::where('pack', $pack)->get();
        $demandes = Demande::where([['pack', '=', $pack],
                                    ['etat', '=', $etat]])->get();
        // dd($demandes);
        return view('fabour.Fabour_en_attente', ['demandes'=> $demandes]);
    }

    public function Fabour_en_cours(){
        $pack = "GRATUIT";
        $etat = "En cours";
        // $demandes = Demande::where('pack', $pack)->get();
        $demandes = Demande::where([['pack', '=', $pack],
                                    ['etat', '=', $etat]])->get();
        // dd($demandes);
        return view('fabour.Fabour_en_cours', ['demandes'=> $demandes]);
    }

    public function Fabour_termine(){
        $pack = "GRATUIT";
        $etat = "Terminer";
        // $demandes = Demande::where('pack', $pack)->get();
        $demandes = Demande::where([['pack', '=', $pack],
                                    ['etat', '=', $etat]])->get();
        // dd($demandes);
        return view('fabour.Fabour_termine', ['demandes'=> $demandes]);
    }


    // PACK Premium
    public function Premium_en_attente(){
        $pack = "Premium";
        $etat = "En attend";
        // $demandes = Demande::where('pack', $pack)->get();
        $demandes = Demande::where([['pack', '=', $pack],
                                    ['etat', '=', $etat]])->get();
        // dd($demandes);
        return view('premium.Premium_en_attente', ['demandes'=> $demandes]);
    }

    public function Premium_en_cours(){
        $pack = "Premium";
        $etat = "En cours";
        // $demandes = Demande::where('pack', $pack)->get();
        $demandes = Demande::where([['pack', '=', $pack],
                                    ['etat', '=', $etat]])->get();
        // dd($demandes);
        return view('premium.Premium_en_cours', ['demandes'=> $demandes]);
    }

    public function Premium_termine(){
        $pack = "Premium";
        $etat = "Terminer";
        // $demandes = Demande::where('pack', $pack)->get();
        $demandes = Demande::where([['pack', '=', $pack],
                                    ['etat', '=', $etat]])->get();
        // dd($demandes);
        return view('premium.Premium_termine', ['demandes'=> $demandes]);
    }

    // PACK Maquette
    public function Maquette_en_attente(){
        $pack = "Maquette";
        $etat = "En attend";
        // $demandes = Demande::where('pack', $pack)->get();
        $demandes = Demande::where([['pack', '=', $pack],
                                    ['etat', '=', $etat]])->get();
        // dd($demandes);
        return view('maquette.Maquette_en_attente', ['demandes'=> $demandes]);
    }

    public function Maquette_en_cours(){
        $pack = "Maquette";
        $etat = "En cours";
        // $demandes = Demande::where('pack', $pack)->get();
        $demandes = Demande::where([['pack', '=', $pack],
                                    ['etat', '=', $etat]])->get();
        // dd($demandes);
        return view('maquette.Maquette_en_cours', ['demandes'=> $demandes]);
    }

    public function Maquette_termine(){
        $pack = "Maquette";
        $etat = "Terminer";
        // $demandes = Demande::where('pack', $pack)->get();
        $demandes = Demande::where([['pack', '=', $pack],
                                    ['etat', '=', $etat]])->get();
        // dd($demandes);
        return view('maquette.Maquette_termine', ['demandes'=> $demandes]);
    }

    //user demandes
    public function myDemandes(){
        $id = Auth::user()->id;
        $demandes = Demande::where('user_id', $id)->get();
        return view('mes_dossiers', ['demandes'=> $demandes]);
    }

    //production images
    public function downloadimages(Request $request){
        $id = $request->input('id');
        $current_user  = Auth::user();
        $demande = Demande::find($id);
        
        if($demande !== null){
            if($current_user->id !== $demande->user_id && Auth::user()->role !=='admin'){
                abort(404);
            }else{
                $images = Image::all()->where('demande_id', $id);
                return view('show_images', ['images' => $images]);
            }
        }else{
            abort(404);
        }

        
        // $images = Image::all()->where('demande_id', $id);
        // return view('show_images', ['images' => $images]);
    }

    public function download(Request $request){
        $url = $request->urlpath;
        $path = public_path('\image\\'.$url);
        return response()->download($path);
    }

    // user demande images
    public function telechargerdemande($id){
        $current_user  = Auth::user();
        // dd($current_user->demande->id);
        
        $demande = Demande::find($id);
        if($demande !== null){
            if($current_user->id !== $demande->user_id && Auth::user()->role !=='admin'){
                abort(404);
            }else{
                $images = UserImage::all()->where('demande_id', $id);
    
                return view('show_demande_images', ['images' => $images]);
            }
        }else{
            abort(404);
        }
        
        // $images = UserImage::all()->where('demande_id', $id);

        // return view('show_demande_images', ['images' => $images]);
    }

    public function download_demande(Request $request){
        if(Auth::user()->role ==='admin'){
            $url = $request->urlpath;
            $path = public_path('\Userimage\\'.$url);
            return response()->download($path);
        }else{
            $url = $request->urlpath;
            $path = public_path('\image\\'.$url);
            return response()->download($path);
        }
    }

    
}
