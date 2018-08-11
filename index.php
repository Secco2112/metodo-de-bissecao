<?php
	require_once __DIR__ . '/vendor/autoload.php';
?>


<!DOCTYPE html>
<html>
<head>
	<title>Método de Bisseção</title>
	<link href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet"/>
	<link rel="stylesheet" type="text/css" href="includes/css/main.css">
	<meta name="application-path" content="<?= dirname($_SERVER["SCRIPT_FILENAME"]) ?>">
</head>
<body>
	<main class="main-content">
		<div class="content">
			<div class="wrapper">
				<form id="bissecao-form" class="needs-validation" method="post" action="">
					<div class="row">
						<div class="form-group math-function">
							<label for="math-function">Função:</label>
	    					<input type="text" class="form-control form-control-sm" id="math-function" required>
	    					<label class="hint">(Exemplo: [(x ^ 2) - 2] ou [x + log(x)])</label>
	    					<div class="invalid-feedback">
					        	Função obrigatória!
					      	</div>
						</div>
						<div class="form-group interval">
							<label for="interval">Intervalo:</label>
	    					<input type="text" class="form-control form-control-sm" id="interval" aria-describedby="hint-interval" required>
	    					<small id="hint-interval" class="form-text text-muted">(Separado por vírgula)</small>
	    					<div class="invalid-feedback">
					        	Intervalo obrigatório!
					      	</div>
						</div>
						<div class="form-group absolute-error">
							<label for="absolute-error">Erro absoluto:</label>
	    					<input type="text" class="form-control form-control-sm" id="absolute-error" required>
	    					<label class="hint"></label>
	    					<div class="invalid-feedback">
					        	Erro absoluto obrigatório!
					      	</div>
						</div>
						<div class="form-group decimal-places">
							<label for="decimal-places">Casas decimais:</label>
	    					<input type="text" class="form-control form-control-sm" id="decimal-places">
	    					<label class="hint">(O valor padrão é 4)</label>
						</div>
					</div>
					<div class="row calculate">
						<button type="submit" class="btn btn-primary make-count">Calcular</button>
						<button type="reset" class="btn btn-primary clear">Limpar</button>
					</div>
				</form>

				<div class="table-wrapper">
					<table class="table">
						<thead>
							<tr>
								<th scope="col">n</th>
								<th scope="col">a[n]</th>
								<th scope="col">b[n]</th>
								<th scope="col">pm[n]</th>
								<th scope="col">f(x[n])</th>
								<th scope="col">&epsilon;[n]</th>
							</tr>
						</thead>
						<tbody></tbody>
					</table>
				</div>

				<hr>

				<div class="result-wrapper">
					<label class="result-text">A raíz da função é: </label>
					<big class="result-data"></big>
				</div>
			</div>
		</div>
	</main>
</body>
	<script src="includes/js/jquery.min.js"></script>
	<script src="vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>
	<script src="includes/js/script.js" type="text/javascript"></script>
</html>