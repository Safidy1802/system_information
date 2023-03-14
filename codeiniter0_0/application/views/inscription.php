<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap3/css/bootstrap.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap3/css/retouche.css'); ?>">
        <title>FORMULAIRE</title>
    </head>
    <body>
        <div id="ajout">
            <div id="titre"><h3>Page d'inscription</h3></div>
            <form action="<?php echo site_url('login/receiveinscription'); ?>" method="post">
                <div class="mb-3">
                    <label for="nom" class="form-label">Nom</label>
                    <input type="text" class="form-control" id="nom" name="nom" required>
                </div>

                <div class="mb-3">
                    <label for="prenom" class="form-label">Prenom</label>
                    <input type="text" class="form-control" id="prenom" name="prenom" required>
                </div>

                <div class="mb-3">
                    <label for="dateNaissance" class="form-label">Date de naissance</label>
                    <input type="date" class="form-control" id="dtn" name="dtn" required>
                </div>
                
                <div class="mb-3">
                    <label for="mdp" class="form-label">Mot de passe</label>
                    <input type="password" class="form-control" id="mdp" name="mdp" required>
                </div>


                <div class="mb-3">
                    <label for="Adresse" class="form-label">Adresse Email</label>
                    <input type="text" class="form-control" id="email" name="email" required>
                </div>

                <div class="mb-3">
                    <label for="Genre" class="form-label">Genre</label>
                    <select name="genre">
                        <option value="homme">Homme</option>
                        <option value="femme">Femme</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="prenom" class="form-label">Est Admin ?:</label>
                    <i>Oui</i>
                    <input type="radio" id="admin" name="admin" value="1" required>
                    <i>Non</i>
                    <input type="radio" id="admin" name="admin" value="0" required>
                </div>

                <div id="button">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              

            </form>
        </div>

    </body>
</html>
