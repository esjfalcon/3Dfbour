@extends('adminLTE.masterpage')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ url('demandes') }} "method="post" enctype="multipart/form-data">
                     {{ csrf_field() }}
                     <div class="form-group">
                            <label for="message-text" class="col-form-label">Pack</label>
                            {{-- <select name="pack" class="form-control" id="etat_enquete">
                                    <option value="GRATUIT">GRATUIT</option>
                                    <option value="PREMIUM">PREMIUM</option>
                                    <option value="GOLD">GOLD</option>
                                    <option value="MAQUETTE">MAQUETTE</option>
                            </select> --}}
                            @if(isset($type))
                            <input type="text" name="pack" class="form-control" value="{{ $type }}" readonly>
                            @else
                            <select name="pack" class="form-control" id="etat_enquete">
                                <option value="GRATUIT">GRATUIT</option>
                                <option value="PREMIUM">PREMIUM</option>
                                <option value="GOLD">GOLD</option>
                                <option value="MAQUETTE">MAQUETTE</option>
                        </select>
                            @endif
                    </div> 
                    <div class="form-group">
                        <label for="">Type</label>

                        <input type="text" name="type" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Temps estimé :</label>
                        <input type="text" name="estTemps" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Dimension :</label>
                        <input type="text" name="demension" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Image :</label>
                        <input type="file"  class="form-control" name="photo[]" multiple required>
                    </div>
                    <div class="form-group">
                        <label for="">Télephone :</label>
                        <input type="tele"  class="form-control" name="tele" required>
                    </div>
                    
                    <div class="form-group">
                            <label for="message-text" class="col-form-label">Etat Projet</label>
                            <select name="etat" class="form-control" id="etat_enquete">
                                    <option value="En attend">En attend</option>
                                    {{-- <option value="En cours">En cours</option>
                                    <option value="En terminè">terminè</option> --}}
                                    <!-- <option value="En cours">En cours</option>
                                    <option value="Terminer">Terminer</option> -->
                            </select>
                    </div>
                    <div class="form-group">

                        <input type="submit" name="Enregestrer" class="form-control btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
