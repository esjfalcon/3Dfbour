@extends('adminLTE.masterpage')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ url('updatereclamation'.$Reclamation->id) }} "method="post">
                    <input type="hidden" name="_method" value="PUT">
                     {{ csrf_field() }}
                    <div class="form-group">
                        <label for="">Objet</label>

                        <input type="text" name="objet" class="form-control" value="{{ $Reclamation->objet }}">
                    </div>
                    <div class="form-group">
                        <label for="">Message</label>
                        <input type="text" name="message" class="form-control" value="{{ $Reclamation->message }}">
                    </div>
                    <div class="form-group">
                        <label for="">Etat</label>
                        <input type="text" name="etat" class="form-control" value="{{ $Reclamation->etat }}">
                    </div>
                    <div class="form-group">

                        <input type="submit" value="Modifier" class="form-control btn btn-warning">
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
