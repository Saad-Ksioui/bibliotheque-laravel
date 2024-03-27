<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <title>Liste des auteurs</title>
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
  </style>
</head>

<body>
  <div class="container mt-5">
    <div class="header d-flex justify-content-between align-items-center">
      <h1>Liste des auteurs</h1>
      <a href="{{ route('auteur.create') }}" class="btn btn-primary">Créer un auteur</a>
    </div>
    @if (session()->has('success'))
      <div class="alert alert-success">
        {{ session('success') }}
      </div>
    @endif
    <table class="table table">
      <tr>
        <th>Id</th>
        <th>Nom</th>
        <th>Prenom</th>
        <th>Auteur Livres</th>
        <th>Operation</th>
      </tr>
      @foreach ($auteurs as $auteur)
        <tr>
          <td>{{ $auteur->id }}</td>
          <td>{{ $auteur->nom }}</td>
          <td>{{ $auteur->prenom }}</td>
          <td>
            <ul>
              @foreach ($auteur->livres()->get() as $titre)
                <li>{{ $titre->titre }}</li>
              @endforeach
            </ul>
          </td>
          <td class="d-flex justify-content-between align-items-center">
            <a href="{{ route('auteur.edit', ['id' => $auteur->id]) }}" class="btn btn-success">Modifier</a>
            <button class="btn btn-danger" onclick="showPopUp({{ $auteur->id }})">Supprimer</button>
          </td>
        </tr>
        <div id="popUp{{ $auteur->id }}" class="popUp">
          <h2>Confirmer la suppression</h2>
          <div class="btns">
            <form action="{{ route('auteur.delete', ['id' => $auteur->id]) }}" method="post">
              @csrf
              @method('delete')
              <input type="submit" class="btn btn-danger" value="Supprimer">
            </form>
            <button class="btn btn-primary" onclick="hidePopUp({{ $auteur->id }})">Retour</button>
          </div>
        </div>
      @endforeach
    </table>

    <div class="pagination">
      {{ $auteurs->links() }}
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
