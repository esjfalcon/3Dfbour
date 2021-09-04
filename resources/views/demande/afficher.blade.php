@extends('adminLTE.masterpage')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                {{-- <form action="{{ url('demandes') }} "method="post">

                     {{ csrf_field() }} --}}
                     <div class="form-group">
                        <label for="">Pack</label>

                        <input type="text" name="pack" class="form-control" value="{{ $demande->pack }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Type</label>

                        <input type="text" name="type" class="form-control" value="{{ $demande->type }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">temps estimé</label>
                        <input type="text" name="estTemps" class="form-control" value="{{ $demande->estTemps }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">dimension</label>
                        <input type="text" name="demension" class="form-control" value="{{ $demande->demension }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">etat :</label>
                        <input type="text" name="etat" class="form-control"value="{{ $demande->etat }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">tele :</label>
                        <input type="text" name="etat" class="form-control"value="{{ $demande->tele }}" readonly>
                    </div>
                    <div class="form-group">
                        {{-- <input type="submit" class="form-control btn btn-primary" value="télecharger"> --}}
                        {{-- <input type="submit" class="form-control btn btn-warning" value="Fermer"> --}}
                        {{-- <button type="submit" class="btn btn-primary">Télecharger</button> --}}
                        
                    </div>
                {{-- </form> --}}
                        <a href="{{ url('telechargerdemande'.$demande->id) }}" class="btn btn-primary">Télecharger</a>
                        
                        {{-- <button type="submit" class="btn btn-danger">Fermer</button> --}}
                        <a href="{{ url('demandesTerminé') }}" class="btn btn-danger">Fermer</a>
            </div>
        </div>
    </div>

@endsection
