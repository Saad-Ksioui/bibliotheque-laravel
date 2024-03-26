<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <title>Créer un auteur</title>
</head>

<body>
  <div class="container mt-5">
    <h1>Créer un auteur</h1>
    <form action="{{ route('auteur.store') }}" method="post">
      @csrf
      <div class="mb-3">
        <label for="nom" class="form-label">Nom:</label>
        <input type="text" class="form-control" name="nom">
      </div>
      <div class="mb-3">
        <label for="prenom" class="form-label">Prenom:</label>
        <input type="text" class="form-control" name="prenom">
      </div>
      <div class="mb-3">
        <input type="submit" class="btn btn-success" style="width: 100%" value="Ajouter">
      </div>
    </form>
  </div>
</body>

</html>
