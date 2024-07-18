<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Réparations - Réparateur Expert</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <header>
        <h1>Réparateur Expert</h1>
        <button onclick="document.getElementById('addClientModal').style.display='block'">Ajouter un Client</button>
        <button onclick="document.getElementById('addRepairModal').style.display='block'">Ajouter une Réparation</button>
    </header>

    <div class="container">
        <h2>Réparations: </h2>
            <form action="" method="post">
            </form>
        <div class="repair-list-container">
            <ul class="repair-list">
                @foreach($reparations as $reparation)
                <li>
                    <h3>Client: {{ $reparation->clients->nom }} - {{ $reparation->clients->email }} </h3>
                    <p>Appareil: {{$reparation->appareil}} </p>
                    <p>Description: {{$reparation->description}} </p>
                    <p>Date de dépôt: {{$reparation->date_depot}} </p>
                    <p>Statut: {{$reparation->statut}} </p>
                    <button onclick="">Modifier</button>
                </li>
                @endforeach
            </ul>
        </div>
    </div>

    <div id="addClientModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="document.getElementById('addClientModal').style.display='none'">&times;</span>
            <h2>Ajouter un Client</h2>
            <form action="" method="post">
            </form>
        </div>
    </div>

    <div id="addRepairModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="document.getElementById('addRepairModal').style.display='none'">&times;</span>
            <h2>Ajouter une Réparation</h2>
            <form action="" method="post">
            </form>
        </div>
    </div>

        <div id="" class="modal">
            <div class="modal-content">
                <span class="close" onclick="">
                    &times;</span>
                <h2>Modifier Réparation</h2>
                <form action="" method="post">
                </form>
            </div>
        </div>

    <footer>
        <p>&copy; 2024 Réparateur Expert. Tous droits réservés.</p>
    </footer>

    <script>
        var modals = document.getElementsByClassName('modal');
        window.onclick = function(event) {
            for (var i = 0; i < modals.length; i++) {
                if (event.target === modals[i]) {
                    modals[i].style.display = "none";
                }
            }
        }
    </script>
</body>
</html>