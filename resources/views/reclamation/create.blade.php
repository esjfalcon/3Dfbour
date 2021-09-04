@extends('adminLTE.masterpage')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ url('reclamation') }} "method="post" enctype="multipart/form-data">
                     {{ csrf_field() }}
                    <div class="form-group">
                        <label for="">Objet</label>

                        <input type="text" name="objet" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Message</label>
                        <input type="text" name="message" class="form-control">
                    </div>
                     <div class="form-group">
                        <label for="">etat</label>
                        <input type="text" name="etat" class="form-control" value="en attent">
                    </div>
                    {{--
                    <div class="form-group">
                        <label for="">Image</label>
                        <input type="file"  class="form-control" name="photo" >
                    </div>
                    <div class="form-group">
                        <label for="">etat</label>
                        <input type="text" name="etat" class="form-control">
                    </div>--}}
                    <div class="form-group">

                        <input type="submit" name="Enregestrer" class="form-control btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
