<?php
require_once ('cabecalho.php');
require_once ('logica-usuario.php');
?>
	
	<h2>Status</h2>

	<?php if (usuarioEstaLogado()) { ?>

    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Sexo', 'Hours per Day'],
          ['Homem',     51],
          ['Mulheres',  70]
        ]);

        var options = {
          title: 'Sexo'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>

    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year',   'Minimo', 'Máximo', 'Paciente'],
          ['jan',    1000,      2000,    1200],
          ['fev',    1000,      2000,    1100],
          ['mar',    1000,      2000,    1500],
          ['abr',    1000,      2000,    1300],
          ['mai',    1000,      2000,    2100],
          ['jun',    1000,      2000,    1800],
          ['jul',    1000,      2000,    1700],
          ['ago',    1000,      2000,    1200],
          ['set',    1000,      2000,    1500],
          ['jan',    1000,      2000,    1700],
          ['out',    1000,      2000,    1200],
          ['nov',    1000,      2000,    1200],
          ['dez',    1000,      2000,    1800]
        ]);

        var options = {
          title: 'Glicemia anual'
        };

        var chart = new google.visualization.LineChart(document.getElementById('chart_div'));

        chart.draw(data, options);
      }
    </script>
    <?php /* <p class="text-success">Você está logado como <?=usuarioLogado() ?>. <a href="logout.php">Deslogar</a></p> */?>

    <div>
    	<div class="esquerda" id="chart_div" style="height: 400px;"></div>

    	<div class="direita" id="piechart" style="height: 400px;"></div>
    </div>

	<?php } else { ?>

		<h2>Login</h2>
		<form action="login.php" method="post">
			<table class="table">
				<tr>
					<td>E-mail</td>
					<td><input class="form-control" type="text" name="email"></td>
				</tr>
				<tr>
					<td>Senha</td>
					<td><input class="form-control" type="password" name="senha"></td>
				</tr>
				<tr>
					<td colspan="2"><button class="btn btn-primary">Login</button></td>
				</tr>
			</table>
		</form>
		
	<?php } ?>
<?php require_once ('rodape.php'); ?>