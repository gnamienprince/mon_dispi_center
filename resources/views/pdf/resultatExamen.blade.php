<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facture Médicale</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin-bottom: 50px;
            /* Pour garder de l'espace pour le bas de page */
        }

        .container {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin-bottom: 30px;
        }

        .logo {
            max-height: 100px;
        }

        h2 {
            color: #007bff;
            margin-top: 0;
        }

        h4 {
            color: #0056b3;
        }

        p {
            color: #6c757d;
            margin-bottom: 5px;
        }

        .facture-info {
            border-bottom: 1px solid #dee2e6;
            padding-bottom: 15px;
            margin-bottom: 20px;
        }

        .col-md-6:last-child {
            border-left: 1px solid #dee2e6;
        }

        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            background-color: #f8f9fa;
            padding: 10px 0;
            text-align: center;
        }

        .contacts {
            font-size: 14px;
            color: #6c757d;
            margin-top: 5px;
        }

        .slogan {
            font-size: 16px;
            font-weight: bold;
            color: #007bff;
            margin-top: 5px;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <!-- Entête avec le logo et le nom du dispensaire -->
        <div class="text-center mb-4">
            {{-- <img src="#" alt="Logo" class="logo img-fluid"> --}}
            <h2>Mon Dispi Center</h2>
        </div>


        <!-- Consultation -->
        <div class="row facture-info">
            <div class="col-md-6">
                <h4>Consultation</h4>
               {{-- <p>Date et Heure: {{ $infoResultat->created_at }}</p>--}}
                <p>Constante: {{ $infoResultat->constante }}</p>
                <p>Diagnostique: {{ $infoResultat->diagnostique }}</p>
                <p>Pathologie: {{ $infoResultat->pathologie }}</p>
                <p>Prescription: {{ $infoResultat->prescription }} </p>
                <p>Date du prochain Rendez-vous: {{ $infoResultat->dateRDV }}</p>
            </div>


        </div>

        <!-- Informations de la facture -->
        <div class="row facture-info">
            <div class="col-md-6">
                <h4>Facture Médicale, resultat de l'examen</h4>
                <p><strong>Nom et Prénom du Patient:</strong> {{ $infoResultat->nom }} {{ $infoResultat->prenom }}</p>
                <p><strong>Identifiant:</strong> {{ $infoResultat->dossier_patient_id }}</p>
            </div>
             <div class="col-md-6">
                <h4>Date de l'examen:</h4>
                     <p>{{ $infoResultat->dateExamen }}</p>
            </div>
            <div class="col-md-6">
                <h4>Libellé del'examen:</h4>
                     <p>{{ $infoResultat->libExamen }}</p>
            </div>
             <div class="col-md-6">
                <h4>Objet:</h4>
                     <p>{{ $infoResultat->objet }}</p>
            </div>
             <div class="col-md-6">
                <h4>Interpretation:</h4>
                     <p>{{ $infoResultat->interpretation }}</p>
            </div>
        </div>

        <!-- Informations du médecin traitant -->
        {{--<div class="row">
            <div class="col-md-6">
                <h4>Médecin Traitant</h4>
                  <p><strong>Nom et prenom:</strong> {{ $infoMedecin['nom'] }}{{  $infoMedecin['prenom'] }}</p>
                <p><strong>Identifiant:</strong> {{  $infoMedecin['id'] }}</p>
            </div>
        </div>--}}
    </div>

    <!-- Bas de page avec les contacts et le slogan -->
    <div class="footer">
        <div class="contacts">Contacts: 0788391691 / 0748601432</div>
        <div class="slogan">Votre santé notre priorité</div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
