
<div class="container">
  <div class="row">
    <div class="col-xs-12">
      <div class="table-responsive" data-pattern="priority-columns">
      <h4>Demandes envoye</h4>

        <table summary="This table shows how to create responsive tables using RWD-Table-Patterns' functionality" class="table table-bordered table-hover">
          <caption class="text-center">Profitez a des echange avantagieuse<a href="http://gergeo.se/RWD-Table-Patterns/" target="_blank"></caption>
          <thead>
          <tr>
              <th data-priority="1">Date de demande</th>
              <th data-priority="2">Nom du proposant</th>
              <th data-priority="4">Objet proposer</th>
              <th data-priority="3">Prix</th>
              <th data-priority="2">Nom du demandee</th>
              <th data-priority="3">Objet demander</th>
              <th data-priority="3">Prix</th>
              <th data-priority="5">Option</th>
            </tr>
            <?php for($i=0;$i<sizeof($listesdemande);$i++){ 
                if (($listesdemande[$i]['usernameproposition']==$_SESSION['logged_in']['username'])&&($listesdemande[$i]['etatdemande']==0)) { ?> 
                  <center>
                    <tr>
                      <td><?php echo $listesdemande[$i]['dateproposition'];?></td>
                      <td><?php echo $listesdemande[$i]['usernameproposition']; ?></td>
                      <td><?php echo $listesdemande[$i]['nomproposition'] ;?></td>
                      <td><?php echo $listesdemande[$i]['prixproposition']; ?></td>
                      <td><?php echo $listesdemande[$i]['usernamedemande'] ; ?></td>
                      <td><?php echo $listesdemande[$i]['nomdemande'] ; ?></td>
                      <td><?php echo $listesdemande[$i]['prixdemande']; ?></td>
                      <td><a href="<?php echo site_url('fonction/updateetat/'.$listesdemande[$i]['iddemande'].'/-2');  ?>" class="the_button"> Annuler </a></td>
                    </tr>
                  </center>
            <?php }
            } ?>
          </tbody>
        </table>
      </div><!--end of .table-responsive-->
    </div>
  </div>
  <div class="row">
    <div class="col-xs-12">
      <div class="table-responsive" data-pattern="priority-columns">
      <h4>Demandes recues :</h4>

        <table summary="This table shows how to create responsive tables using RWD-Table-Patterns' functionality" class="table table-bordered table-hover">
          <caption class="text-center">Profitez a des echange avantagieuse<a href="http://gergeo.se/RWD-Table-Patterns/" target="_blank"></caption>
          <thead>
          <tr>
              <th data-priority="1">Date de demande</th>
              <th data-priority="2">Nom du proposant</th>
              <th data-priority="4">Objet proposer</th>
              <th data-priority="3">Prix</th>
              <th data-priority="2">Nom du demandee</th>
              <th data-priority="3">Objet demander</th>
              <th data-priority="3">Prix</th>
              <th data-priority="5">Accepter</th>
              <th data-priority="6">Refuser</th>
            </tr>
            <?php for($i=0;$i<sizeof($listesdemande);$i++){ 
                if (($listesdemande[$i]['usernamedemande']==$_SESSION['logged_in']['username'])&&($listesdemande[$i]['etatdemande']==0)) { ?> 
                  <center>
                    <tr>
                      <td><?php echo "2022-11-03 13:15";?></td>
                      <td><?php echo $listesdemande[$i]['usernameproposition']; ?></td>
                      <td><?php echo $listesdemande[$i]['nomproposition'] ;?></td>
                      <td><?php echo $listesdemande[$i]['prixproposition']; ?></td>
                      <td><?php echo $listesdemande[$i]['usernamedemande'] ; ?></td>
                      <td><?php echo $listesdemande[$i]['nomdemande'] ; ?></td>
                      <td><?php echo $listesdemande[$i]['prixdemande']; ?></td>
                      <td><a href="<?php echo site_url('fonction/updateetat/'.$listesdemande[$i]['iddemande'].'/1');  ?>" class="the_button"> Accepter </a></td>
                      <td><a href="<?php echo site_url('fonction/updateetat/'.$listesdemande[$i]['iddemande'].'/-1');  ?>" class="the_button"> Refuser </a></td>
                    </tr>
                  </center>
            <?php }
            } ?>
          </tbody>
        </table>
      </div><!--end of .table-responsive-->
    </div>
  </div>

</div>

<p class="p">Demo by George Martsoukos. <a href="http://www.sitepoint.com/responsive-data-tables-comprehensive-list-solutions" target="_blank">See article</a>.</p>
