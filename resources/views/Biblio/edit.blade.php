<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <title>Modifier un livre</title>
</head>

<body>
  <div class="container">
    <h1>Modification d'un livre</h1>
    <form action="{{ route('livre.update', ['id' => $livre->id]) }}" method="post">
      @csrf
      @method('put')
      <div class="mb-3">
        <label for="titre" class="form-label">Titre:</label>
        <input type="text" class="form-control" name="titre" value="{{ $livre->titre }}">
      </div>
      <div class="mb-3">
        <label for="anneepub" class="form-label">Annee de publication:</label>
        <input type="text" class="form-control" name="anneepub" value="{{ $livre->anneepub }}">
      </div>
      <div class="mb-3">
        <label for="nbrpages" class="form-label">Nombre des pages:</label>
        <input type="text" class="form-control" name="nbrpages" value="{{ $livre->nbrpages }}">
      </div>
      <div class="mb-3">
        <input type="submit" class="btn btn-primary" value="Modifier">
      </div>
    </form>
  </div>

</body>

</html>
