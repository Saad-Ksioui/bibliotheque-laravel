<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <title>Les Livres</title>
</head>

<body>
  <div class="container mt-5">
    <header class="d-flex justify-content-between align-items-center">
      <h1>Liste des livres</h1>
      <a href="{{ route('livre.create') }}" class="btn btn-primary">Créer un livre</a>
    </header>
    @if (session()->has('success'))
      <div class="alert alert-success">
        {{ session('success') }}
      </div>
    @endif
    <table class="table">
      <tr>
        <th>Livre Id</th>
        <th>Titre</th>
        <th>Année de publication</th>
        <th>Nombre des pages</th>
        <th>Nom de l'auteur</th>
        <th>Operation</th>
      </tr>
      @foreach ($livres as $livre)
        <tr>
          <td>{{ $livre->id }}</td>
          <td>{{ $livre->titre }}</td>
          <td>{{ $livre->anneepub }}</td>
          <td>{{ $livre->nbrpages }}</td>
          <td>{{ $livre->nom }}</td>
          <td class="d-flex justify-content-between align-items-center">
            <a href="{{ route('livre.edit', ['id' => $livre->id]) }}" class="btn btn-success">Modifier</a>
            <form action="{{ route('livre.delete', ['id' => $livre->id]) }}" method="post">
              @csrf
              @method('delete')
              <input type="submit" class="btn btn-danger" value="Supprimer">
            </form>
          </td>
        </tr>
      @endforeach
    </table>
    <div class="pagination">
      {{ $livres->links() }}
    </div>
  </div>

  <script>
    setTimeout(() => {
      document.querySelector('.alert').style.display = 'none'
    }, 2000);
  </script>
</body>

</html>
