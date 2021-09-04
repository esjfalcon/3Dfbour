@extends('adminLTE.masterpage')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Demandes Maquette Terminer:</h1>
            <div class="float-right">
                <a href="{{ url('demandescreate') }}" class="btn btn-success">Nouveau dossier</a>
            </div>
            <table class="table">
                <head>
                    <tr>
                        <th>Numéro de dossier</th>
                        <th>Type</th>
                        <th>Temps estimé</th>
                        <th>Dimension</th>
                        <th>Etat</th>
                        <th>Télephone</th>
                        <th>Actions</th>
                    </tr>
                </head>
                <body>
                    @foreach($demandes as $listeDemande)

                        <tr>
                            <td>{{$listeDemande->id  }}</td>
                            <td>{{$listeDemande->type  }}</td>
                            <td>{{$listeDemande->estTemps  }}</td>
                            <td>{{$listeDemande->demension  }}</td>
                            <td>{{$listeDemande->etat  }}</td>
                            <td>{{$listeDemande->tele  }}</td>
                            <td>

                                <form action="{{ url('destroydemandes'.$listeDemande->id) }}" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <a href="{{ url('afficherdemande'.$listeDemande->id) }}" class="btn btn-primary">Details</a>
                                <a href="{{ url('editdemandes'.$listeDemande->id) }}" class="btn btn-default">Modifier</a>

                                    <button type="submit" class="btn btn-danger">supprimer</button>

                                </form>
                            </td>
                        </tr>
                    @endforeach

                </body>
            </table>
        </div>
    </div>
</div>
@endsection
