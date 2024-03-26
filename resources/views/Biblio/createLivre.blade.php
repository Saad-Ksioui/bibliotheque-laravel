<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Créer un livre</title>
</head>
<body>
    <h1>Créer un livre</h1>
    <form action="{{ route('livre.store') }}" method="post">
        @csrf
        <label for="titre">Titre : </label><br/>
        <input type="text" id="titre" name="titre"><br/>
        <label for="anneepub">Annee de publication : </label><br/>
        <input type="text" id="anneepub" name="anneepub"><br/>
        <label for="nbrpages">Nombre des pages : </label><br/>
        <input type="text" id="nbrpages" name="nbrpages"><br/>
        <label for="auteur">Auteur : </label><br/>
        <select name="auteur_id">
            <option>Selectionner un auteur</option>
            @foreach ($auteurs as $auteur)
                <option value="{{ $auteur -> id }}">{{ $auteur -> nom }}</option>
            @endforeach
        </select><br/>
        <input type="submit" value="Créer">
    </form>
</body>
</html>