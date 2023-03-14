
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap3/css/ajouter.css'); ?>">
    <section>
<div id="container">
  <h2>&bull; Nouveau produit &bull;</h2>
  <div class="underline">
  </div>
  <div class="icon_wrapper">

  </div>    <div class="nom">
      <label for="nom">Nom :</label>
      <input type="text" name="nom" id="nom" required>
    </div>
    <div class="prix">
      <label for="prix">Prix</label>
      <input type="text" name="prix" id="prix" required>
    </div>

    <div class="categorie">
      <select name="categorie" id="categorie" required>
          <?php foreach ($allcategorie as $categorie) { ?>
            <option value="<?php echo $categorie['nom']; ?>" selected><?php echo $categorie['nom'] ;?></option>
          <?php } ?>
      </select>
    </div>
    <div class="description">
      <label for="description">Description :</label>
      <input type="text" name="description" id="description" required><br>
    </div>
    <div class="photo">
      <label for="photo">Image :</label>
            <?php echo form_open_multipart('fonction/do_upload');?> 
          
          <form action = "" method = "">
            <input type = "file" name = "00:35 08/02/2023userfile" size = "20" /> 
            <br /><br /> 
            <input type = "submit" value = "upload" /> 
          </form>    
    </div><br>
  </div>
</div>
</section>