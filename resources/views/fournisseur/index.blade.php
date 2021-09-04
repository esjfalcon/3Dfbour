@extends('adminLTE.masterpage')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Liste des Fournisseurs</h1>
            <div class="float-right">
                <a href="{{ url('fournisseurcreate') }}" class="btn btn-success">Nouveau fournissuer</a>
            </div>
            <table class="table">
                <head>
                    <tr>
                        <th>Raison sociale</th>
                        <th>Type</th>
                        <th>Taille</th>
                        <th>Adresse</th>
                        <th>Telephone</th>
                        <th>Actions</th>
                    </tr>
                </head>
                <body>
                    @foreach($Fournissuer as $Fournissuer)

                        <tr>

                            <td>{{$Fournissuer->raison_sociale  }}</td>
                            <td>{{$Fournissuer->type  }}</td>
                            <td>{{$Fournissuer->taille  }}</td>
                            <td>{{$Fournissuer->adresse  }}</td>
                            <td>{{$Fournissuer->telephone  }}</td>
                            <td>

                                <form action="{{ url('destroyfournisseur'.$Fournissuer->id) }}" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <a href="{{ url('afficherdemande'.$Fournissuer->id) }}" class="btn btn-primary">Details</a>
                                    <a href="{{ url('editfournisseur'.$Fournissuer->id) }}" class="btn btn-default">Modifier</a>

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
