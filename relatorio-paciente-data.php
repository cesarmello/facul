<?php
require_once ('cabecalho.php');
require_once ('logica-usuario.php');
require_once ('banco-exame.php');

$data_inicial  = $_POST["data_inicial"];
$data_final    = $_POST["data_final"];
$id_tipo_exame = $_POST["id_tipo_exame"];
$id_paciente   = $_POST["id_paciente"];
$nomeExame     = $_POST["nomeExame"];
$exames        = buscaExamesPacienteData($conexao, $data_inicial, $data_final, $id_tipo_exame, $id_paciente);
$referencias   = buscaValorReferencia($conexao, $id_tipo_exame);
var_dump($exames);
?>

	<?php if (usuarioEstaLogado()) { ?>

		<script type="text/javascript">
			google.load("visualization", "1", {packages:["corechart"]});
			google.setOnLoadCallback(drawChart);
			function drawChart() {
				var data = google.visualization.arrayToDataTable([
					['Data',   'Mínimo', 'Máximo', 'Paciente',],

					<?php	foreach ($exames as $exame) : ?>

					['<?=$exame['data_exame'] ?>',    70,      140,    <?=$exame['valor'] ?>],

					<?php endforeach ?>
				]);

				var options = {
					title: '<?=$nomeExame?>'
				};

				var chart = new google.visualization.LineChart(document.getElementById('chart_div'));

				chart.draw(data, options);
			}
		</script>

		<div>
			<div id="chart_div" style="height: 100%;"></div>
		</div>

	<?php } else { ?>
	<?php } ?>
<?php require_once ('rodape.php'); ?>