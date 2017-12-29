<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Signin Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
  </head>

  <body>

    <div class="container">

      <form action='index.php?todo=login&page=bars' method='post' class="form-signin">
        <h2 class="form-signin-heading">Authentification des X</h2>
        <label for="inputLogin" class="sr-only">ID Frankiz</label>
        <input type="text" name="login" class="form-control" placeholder="ID Frankiz" required>
        <label for="inputPassword" class="sr-only">Mot de passe</label>
        <input type="password" name="mdp" class="form-control" placeholder="Password" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Connexion</button>
      </form>

    </div> 


  </body>
</html>