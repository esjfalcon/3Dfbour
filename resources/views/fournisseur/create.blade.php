@extends('adminLTE.masterpage')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ url('fournisseur') }} "method="post" enctype="multipart/form-data">
                     {{ csrf_field() }}
                    <div class="form-group">
                        <label for="">raison sociale</label>

                        <input type="text" name="raison_sociale" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">type</label>
                        <input type="text" name="type" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">taille</label>
                        <input type="text" name="taille" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">telephone</label>
                        <input type="text" name="telephone" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Adresse</label>
                        <input type="text" name="adresse" class="form-control">
                    </div>


                    <div class="form-group">

                        <input type="submit" name="Enregestrer" class="form-control btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
