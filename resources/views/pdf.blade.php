<!DOCTYPE html>
<html>

<head>
    <title>Feuille de demande</title>
    <style>
        /* Ajoutez ici votre style CSS personnalisé */
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            width: 600px;
            margin: 0 auto;
            padding: 20px;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .section {
            margin-bottom: 20px;
        }

        .section-title {
            font-weight: bold;
            margin-bottom: 10px;
        }

        .section-content {
            margin-bottom: 10px;
        }

        .signature {
            margin-top: 20px;
            text-align: center;
        }

        .footer {
            text-align: center;
            margin-top: 50px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h2>Feuille de demande</h2>
        </div>
        <div class="section">
            <h4 class="section-title">Informations personnelles :</h4>
            <div class="section-content">
                <p>Nom et prénom : {{ $demande->nom_prenom }}</p>
                <p>CIN : {{ $demande->CIN }}</p>
                <p>Date d'expiration : {{ $demande->date_expiration }}</p>
                <p>Adresse : {{ $demande->adresse }}</p>
                <p>Père ou mère : {{ $demande->pere_ou_mere }}</p>
                <p>Autre : {{ $demande->autre }}</p>
            </div>
        </div>
        <div class="section">
            <h4 class="section-title">Informations sur l'enfant :</h4>
            <div class="section-content">
                <p>Nom et prénom de l'enfant : {{ $demande->nom_prenom_enfant }}</p>
                <p>Établissement : {{ $demande->etablissement }}</p>
            </div>
        </div>
        <div class="section">
            <h4 class="section-title">Motifs de la demande :</h4>
            <div class="section-content">
                <p>Cause : {{ $demande->cause }}</p>
                <p>Orphelinat : {{ $demande->orphelinat }}</p>
                <p>Violence : {{ $demande->violence }}</p>
                <p>Exploitation : {{ $demande->exploitation }}</p>
                <p>Type d'exploitation : {{ $demande->type_exploitation }}</p>
            </div>
        </div>
        <div class="section">
            <h4 class="section-title">Informations supplémentaires :</h4>
            <div class="section-content">
                <p>Lieu de la demande : {{ $demande->lieu_demande }}</p>
                <p>Date de la demande : {{ $demande->date_demande }}</p>
                <p>Demande version égalisée : {{ $demande->demande_version_egalisé }}</p>
                <p>État : {{ $demande->etat }}</p>
            </div>
        </div>
        <div class="signature">
            <p>Signature :</p>
            <!-- Insérez ici un espace réservé pour la signature -->
        </div>
        <div class="footer">
            <p>Adresse email : {{ $demande->email }}</p>
            <p>Téléphone : {{ $demande->telephone }}</p>
        </div>
    </div>
</body>

</html>
