@extends('adminLTE.masterpage')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Liste des reclamations client:</h1>
            <div class="float-right">
                <a href="{{ url('Reclamationcreate') }}" class="btn btn-success">Nouveau Reclamation</a>
            </div>
            <table class="table">
                <head>
                    <tr>
                        <th>Numéro de Reclamation</th>
                        <th>Nom Client</th>
                        <th>Email</th>
                        <th>Objet</th>
                        <th>Message</th>
                        <th>Etat</th>
                        <th>Actions</th>
                    </tr>
                </head>
                <body>
                    @foreach($Reclamation as $listeReclamation)

                        <tr>
                            <td>{{$listeReclamation->id  }}</td>
                            {{--
                                <td>{{$listeReclamation->user->name  }}</td>
                            <td>{{$listeReclamation->user->email  }}</td> --}}
                            <td>{{$listeReclamation->objet  }}</td>
                            <td>{{$listeReclamation->message  }}</td>
                            <td>{{$listeReclamation->etat  }}</td>
                            <td>

                                <form action="{{ url('destroyreclamation'.$listeReclamation->id) }}" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <a href="{{ url('afficherdemande'.$listeReclamation->id) }}" class="btn btn-primary">Details</a>
                                    <a href="{{ url('editreclamation'.$listeReclamation->id) }}" class="btn btn-default">Modifier</a>

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
