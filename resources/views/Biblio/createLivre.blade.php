<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <title>Créer un livre</title>
</head>

<body>
  <div class="container mt-5">
    <h1>Créer un livre</h1>
    <form action="{{ route('livre.store') }}" method="post">
      @csrf
      <div class="mb-3">
        <label for="titre" class="form-label">Titre : </label>
        <input type="text" class="form-control" id="titre" name="titre">
      </div>
      <div class="mb-3">
        <label for="anneepub" class="form-label">Annee de publication : </label>
        <input type="text" id="anneepub" class="form-control" name="anneepub">
      </div>
      <div class="mb-3">
        <label for="nbrpages" class="form-label">Nombre des pages : </label>
        <input type="text" id="nbrpages" class="form-control" name="nbrpages">
      </div>
      <div class="mb-3">
        <label for="auteur" class="form-label">Auteur : </label>
        <select name="auteur_id" class="form-control">
          <option>Selectionner un auteur</option>
          @foreach ($auteurs as $auteur)
            <option value="{{ $auteur->id }}">{{ $auteur->nom }} {{ $auteur->prenom }}</option>
          @endforeach
        </select>
      </div>
      <div class="mb-3">
        <input type="submit" value="Créer" class="form-control btn btn-primary">
      </div>
    </form>
  </div>
</body>

</html>
