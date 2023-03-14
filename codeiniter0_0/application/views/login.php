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
            <div id="titre"><h3>Se Connecter</h3></div>
            <form action="<?php echo site_url('login/receive'); ?>" method="post">

                <div class="mb-3">
                    <label for="prenom" class="form-label">Adresse Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="nom" class="form-label">Mot de passe</label><br>
                    <input type="password" class="form-control" name="mdp" required>
                </div>

                <div id="button">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>

            </form>
            <a href="<?php echo site_url('login/inscription');?>">S'inscrire</a>
        </div>

    </body>
</html>
