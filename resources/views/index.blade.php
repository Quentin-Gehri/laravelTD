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
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
            </div>
        @endif
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
                    <button onclick="document.getElementById('updateRepairModal{{$reparation->id}}').style.display='block'">Modifier</button>
                </li>
                @endforeach
            </ul>
        </div>
    </div>

    <div id="addClientModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="document.getElementById('addClientModal').style.display='none'">&times;</span>
            <h1>Ajouter un Client</h1>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('clients.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="nom">Nom:</label><br>
                        <input type="text" class="form-control" id="nom" name="nom" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label><br>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                </form>
        </div>
    </div>

    <div id="addRepairModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="document.getElementById('addRepairModal').style.display='none'">&times;</span>
            <h2>Ajouter une Réparation</h2>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('reparations.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="appareil">Appareil:</label><br>
                    <input type="text" class="form-control" id="appareil" name="appareil" required>
                </div>
                <div class="form-group">
                    <label for="description">Description:</label><br>
                    <textarea class="form-control" id="description" name="description" required></textarea>
                </div>
                <div class="form-group">
                    <label for="client_id">Client:</label><br>
                    <select class="form-control" id="client_id" name="client_id" required>
                        <option value="">Sélectionnez un client</option>
                        @foreach($clients as $client)
                            <option value="{{ $client->id }}">{{ $client->nom }} - {{ $client->email }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Ajouter</button>
            </form>
        </div>
    </div>
    
    @foreach($reparations as $reparation)
        <div id="updateRepairModal{{$reparation->id}}" class="modal">
            <div class="modal-content">
                <span class="close" onclick="document.getElementById('updateRepairModal{{$reparation->id}}').style.display='none'">
                    &times;</span>
                <h2>Modifier Réparation</h2>
                <form action="{{ route('reparations.update', ['id' => $reparation->id]) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="appareil">Appareil:</label><br>
                        <input type="text" class="form-control" id="appareil" name="appareil" required value="{{$reparation->appareil}}">
                    </div>
                    <div class="form-group">
                        <label for="description">Description:</label><br>
                        <textarea class="form-control" id="description" name="description" required >
                            {{$reparation->description}}
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label for="statut">Statut:</label><br>
                        <select name="statut" id="statut">
                            <option value="À faire" @if($reparation->statut === "À faire") selected @endif>À faire</option>
                            <option value="En cours" @if($reparation->statut === "En cours") selected @endif>En cours</option>
                            <option value="Terminé" @if($reparation->statut === "Terminé") selected @endif>Terminé</option>
                            <option value="Repris par le client" @if($reparation->statut === "Repris par le client") selected @endif>Repris par le client</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Mettre à jour</button>
                </form>
            </div>
        </div>
    @endforeach

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