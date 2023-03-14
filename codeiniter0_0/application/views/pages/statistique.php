<?php
$taille =5;
?>
<center>
<div class="container"  style="border-style:double">
    <h3 style="text-align:center">Historique des Echange</h3>
  <table class="responsive-table">
    <thead>
      <tr>
        <th scope="col">Echange</th>
        <th scope="col">Premier proprietaire</th>
        <th scope="col">Proprietaire après echange</th>
        <th scope="col">Date d'echange</th>
        <th scope="col">Nom d'objet</th>
      </tr>
    </thead><br>
    <tbody>
    <?php for($i=0; $i<$echanges; $i++){ ?>
      <tr>
      <th data-title="Released"><?php $echanges[$i]['idechange']; ?></th>
        <td scope="row"><?php $echanges[$i]['idechange']; ?><</td>
        <td data-title="Released"><?php echo "Faniriana"; ?></td>
        <td data-title="Domestic Gross" data-type="date"><?php echo "2022-13-04 23:45"; ?></td>
        <td data-title="Studio"><?php echo "Telephone"; ?></td>
      </tr>
    <?php } ?><br>
    </tbody>
  </table><br>
  <b>Nombre d'echange effectuer : <?php echo $taille; ?></b>
</div>
<hr>
<br>
</div>

<span style="background-color:red;height:100px;color:white"><b>Courbe de nombre d'inscrit</b></span>
<script src="<?php echo base_url('assets/chart/chart.js'); ?>"></script>
<canvas id="myChart" style="width:100%;max-width:600px;height:150px"></canvas>
<script>
var xValues = [1,2,3,4,5,6,7,8];
var yValues = [1,2,3,4,5,6,7]; //valeurs de personne inscrit

new Chart("myChart", {
  type: "line",
  data: {
    labels: xValues,
    datasets: [{
      fill: false,
      lineTension: 0,
      backgroundColor: "rgba(0,0,255,1.0)",
      borderColor: "rgba(0,0,255,0.1)",
      data: yValues
    }]
  },
  options: {
    legend: {display: false},
    scales: {
      yAxes: [{ticks: {min: 6, max:50}}],
    }
  }
});
</script><br>
<hr>
<span style="background-color:red;height:100px;color:white"><b>Statistique du nombre d'echange</b></span>
<script src="assets\chart\chart.js"></script>
<canvas id="myChart1" style="width:100%;max-width:600px;height:150px"></canvas>

<script>
var xyValues = [
  {x:50, y:7},
  {x:60, y:8},
  {x:70, y:8},
  {x:80, y:9},
  {x:90, y:9},
  {x:100, y:9},
  {x:110, y:10},
  {x:120, y:11},
  {x:130, y:14},
  {x:140, y:14},
  {x:150, y:15}
];

new Chart("myChart1", {
  type: "scatter",
  data: {
    datasets: [{
      pointRadius: 4,
      pointBackgroundColor: "rgb(0,0,255)",
      data: xyValues
    }]
  },
  options: {
    legend: {display: false},
    scales: {
      xAxes: [{ticks: {min: 40, max:160}}],
      yAxes: [{ticks: {min: 6, max:16}}],
    }
  }
});
</script>
</center>

