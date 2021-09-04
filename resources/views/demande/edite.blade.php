@extends('adminLTE.masterpage')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ url('updatedemandes'.$demande->id) }} "method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_method" value="PUT">
                     {{ csrf_field() }}
                     <div class="form-group">
                            <label for="message-text" class="col-form-label">Etat Projet</label>
                            <select name="etat" class="form-control" id="etat_enquete" value="{{ $demande->etat }}">
                            @if ($demande->etat =='En attend' )
                                    <option value="En attend">En attend</option>
                                    <option value="En cours">En cours</option> 
                                    <option value="Terminer">Terminer</option> 
                            @endif  
                            @if ($demande->etat =='En cours' )        
                                     <option value="En cours">En cours</option> 
                                     <option value="En attend">En attend</option>
                                     <option value="Terminer">Terminer</option> 
                            @endif
                            @if ($demande->etat =='Terminer' )         
                                    <option value="Terminer">Terminer</option> 
                                    <option value="En attend">En attend</option>
                                    <option value="En cours">En cours</option> 
                            @endif        
                            </select>
                    </div>
                    <div class="form-group">
                        <label for="">Type</label>

                        <input type="text" name="type" class="form-control" value="{{ $demande->type }}">
                    </div>
                    <div class="form-group">
                        <label for="">temps estimé</label>
                        <input type="text" name="estTemps" class="form-control" value="{{ $demande->estTemps }}">
                    </div>
                    <div class="form-group">
                        <label for="">dimension</label>
                        <input type="text" name="demension" class="form-control" value="{{ $demande->demension }}">
                    </div>
                    
                    <div class="form-group">
                        <label for="">Télephone :</label>
                        <input type="text" name="tele" class="form-control"value="{{ $demande->tele }}">
                    </div>
                    {{-- <div class="form-group">
                        <input type="file" name="imageFile[]" class="custom-file-input" id="images" multiple="multiple">
                        <label class="custom-file-label" for="images">Choose image</label>
                    </div> --}}
                    
                    <div class="form-group">
                        <label for="">Images</label>
                        <input type="file" name="imageFile[]" multiple>
                    </div>

                    <div class="form-group">

                        <input type="submit" value="Modifier" class="form-control btn btn-warning">
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
