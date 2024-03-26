<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Modifier un livre</title>
</head>
<body>
    <div class="container">
      <h1>Modification d'un livre</h1>
      <form action="" method="post">
        @csrf
        @method('put')
        <div class="mb-3">
          <label for="titre" class="form-label">Titre:</label>
          <input type="text" class="form-control" name="titre">
        </div>
        <div class="mb-3">
          <label for="anneepub" class="form-label">Annee de publication:</label>
          <input type="text" class="form-control" name="anneepub">
        </div>
        <div class="mb-3">
          <label for="nbrpages" class="form-label">Nombre des pages:</label>
          <input type="text" class="form-control" name="nbrpages">
        </div>
        <div class="mb-3">
          <input type="text" class="btn btn-primary">
        </div>
      </form>
    </div>
</body>
</html>