<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Détails</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h1>Détails de l'entité physique</h1>
        @if (empty($articles) && empty($contrats) && empty($contactRoles))
        <p class="h4 align-middle">Aucune Résultats</p>
        @else
        <div class="row">
            <h2>Articles</h2>
            <table class="table">
                <tr>
                    <th>Libelle</th>
                    <th>Montant</th>
                    <th>Remise</th>
                    <th>Devise</th>
                    <th>Date de Création</th>
                </tr>
                @foreach ($articles as $article)
                <tr>
                    <td>{{ $article->libelle }}</td>
                    <td>{{ $article->montant }}</td>
                    <td>{{ $article->remise }}</td>
                    <td>{{ $article->devise }}</td>
                    <td>{{ $article->date_creation }}</td>
                </tr>
                @endforeach
            </table>
        </div>
        <div class="row">
            <h2>Contrat</h2>
            <table class="table">
                <tr>
                    <th>N° Contrat</th>
                    <th>Status</th>
                    <th>Version</th>
                    <th>Type</th>
                    <th>Frequence Facturation</th>
                    <th>Date de Démarrage</th>
                    <th>Date de Création</th>
                </tr>
                @foreach ($contrats as $contrat)
                <tr>
                    <td>{{ $contrat->numero_contrat }}</td>
                    <td>{{ $contrat->statut_contrat }}</td>
                    <td>{{ $contrat->version_contrat }}</td>
                    <td>{{ $contrat->type_contrat }}</td>
                    <td>{{ $contrat->frequence_facturation }}</td>
                    <td>{{ $contrat->date_demarrage }}</td>
                    <td>{{ $contrat->date_creation }}</td>
                </tr>
                @endforeach
            </table>
        </div>
        <div class="row">
            <h2>Contact</h2>
            <table class="table">
                <tr>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Adresse</th>
                    <th>CIN</th>
                    <th>Role</th>
                </tr>
                @foreach ($contactRoles as $contactRole)
                <tr>
                    <td>{{ $contactRole->nom }}</td>
                    <td>{{ $contactRole->prenom }}</td>
                    <td>{{ $contactRole->adresse }}</td>
                    <td>{{ $contactRole->cin }}</td>
                    <td>{{ $contactRole->role }}</td>
                </tr>
                @endforeach
            </table>
            @endif
        </div>
    </div>
</body>

</html>