<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <title>Les Livres</title>
  <style>
    .popUp {
      background-color: #fff;
      border-radius: 10px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
      max-width: 400px;
      margin: 50px auto;
      padding: 20px;
      text-align: center;
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      display: none
    }

    .popUp h2 {
      margin-bottom: 20px;
    }

    .btns {
      display: flex;
      justify-content: space-between;

    }

    .btns .btn {
      padding: 10px 20px;
    }

    .btns .btn+.btn {
      margin-left: 10px;
    }

    .alert-login {
      background-color: green;
      color: white;
      padding: 10px 20px;
      position: absolute;
      top: 1rem;
      right: 1rem;
    }
  </style>
</head>

<body>
  <div class="container mt-5">
    @if (session()->has('login'))
      <div class="alert alert-login">
        {{ session('login') }}
      </div>
    @endif
    <header class="d-flex justify-content-between align-items-center">
      <h1>Liste des livres</h1>
      <div class="links">
        <a href="{{ route('livre.create') }}" class="btn btn-primary">Créer un livre</a>
        <a href="{{ route('auteur.index') }}" class="btn btn-primary">Liste des auteurs</a>
      </div>
    </header>
    <div class="profile mt-4 mb-4">
      @if (isset($user))
        <a href="{{ route('profile') }}" class="btn btn-primary">Profile</a>
        <a href="{{ route('logout') }}" class="btn btn-danger">Logout</a>
      @endif
    </div>
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
          <td>{{ $livre->nom }} {{ $livre->prenom }}</td>
          <td class="d-flex justify-content-between align-items-center">
            <a href="{{ route('livre.edit', ['id' => $livre->id]) }}" class="btn btn-success">Modifier</a>
            <button class="btn btn-danger" onclick="showPopUp({{ $livre->id }})">Supprimer</button>
          </td>
        </tr>
        <div id="popUp{{ $livre->id }}" class="popUp">
          <h2>Confirmer la suppression</h2>
          <div class="btns">
            <form action="{{ route('livre.delete', ['id' => $livre->id]) }}" method="post">
              @csrf
              @method('delete')
              <input type="submit" class="btn btn-danger" value="Supprimer">
            </form>
            <button class="btn btn-primary" onclick="hidePopUp()">Retour</button>
          </div>
        </div>
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

    const showPopUp = (id) => {
      document.querySelector(`#popUp${id}`).style.display = 'block';
    }

    const hidePopUp = (id) => {
      document.querySelector(`#popUp${id}`).style.display = 'none';
    }
  </script>
</body>

</html>
