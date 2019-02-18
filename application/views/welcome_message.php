<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Cadastro de sorvetes</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="text-center">Cadastro de sorvetes</h1><br>
				<form action="index.php/welcome/cadastrar_fabricante" method="post" id="frm_fabricantes">
					<div class="row">
						<div class="form-group col-lg-4">
							<input type="text" class="form-control" name="nome" id="nome" placeholder="Nome do fabricante:">
						</div>
						<div class="form-group col-lg-3">
							<input type="text" class="form-control" name="cnpj" id="cnpj" placeholder="CNPJ:">
						</div>
						<div class="form-group col-lg-2">
							<button type="button" onclick="cadastrarFabricante()" class="btn btn-sm btn-info"> + Cadastrar fabricante</button>
						</div>
					</div>
				</form>
			</div>
		</div><br>
		<div class="row">
			<div class="col-lg-12">
				<form action="" method="post" id="frm_sabores">
					<div class="row">
						<div class="form-group col-lg-3">
							<select class="form-control" name="fabricante_id" id="fabricante_id">
								<option value="">Fabricante</option>
								<?php foreach($fabricantes as $fabricante): ?>
								<option value="<?=$fabricante->id ?>"><?= $fabricante->nome ?></option>
								<?php endforeach ?>
							</select>
						</div>
						<div class="form-group col-lg-3">
							<input type="text" class="form-control" id="sabor" name="sabor" placeholder="Sabor:">
						</div>
						<div class="form-group col-lg-3">
							<input type="text" class="form-control" id="preco_sugerido" name="preco_sugerido" placeholder="Preço:">
						</div>
						<div class="form-group col-lg-2">
							<button type="button" onclick="cadastrarSabor()" class="btn btn-sm btn-info"> + Cadastrar sorvete</button>
						</div>
					</div>
				</form>
			</div>
		</div>


		<div class="row">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-header">Lista de sorvetes</div>
					<div class="card-body">
						<table class="table">
							<tr>
								<th>#</th>
								<th>Fabricante</th>
								<th>CNPJ</th>
								<th>Sabor</th>
								<th>Preço sugerido</th>
							</tr>
							<?php foreach($sorvetes as $sorvete): ?>
							<tr>
								<td><?= $sorvete->id ?></td>
								<td><?= $sorvete->nome ?></td>
								<td><?= $sorvete->cnpj ?></td>
								<td><?= $sorvete->sabor ?></td>
								<td><?= $sorvete->preco_sugerido ?></td>
							</tr>
							<?php endforeach ?>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>

<script type="text/javascript">

	function cadastrarFabricante(){

		$.ajax({

			url: 'index.php/welcome/cadastrar_fabricante',
			type: 'POST',
			data:$("#frm_fabricantes").serialize(),
			success: function(){
				$("#frm_fabricantes").trigger("reset");
				alert('Fabricante cadastrado com sucesso');
				recarrega();
			},
			error: function() {
				alert('Não foi possível cadastrar o fabricante');
				recarrega();
			}

		});
	}

	function cadastrarSabor() {

		$.ajax({

			url: 'index.php/welcome/cadastrar_sabor',
			type: 'POST',
			data:$("#frm_sabores").serialize(),
			success: function(){
				$("#frm_sabores").trigger("reset");
				alert('Sabor cadastrado com sucesso');
				recarrega();
			},
			error: function() {
				alert('Não foi possível cadastrar o sabor');
				recarrega();
			}
		});

	}

	function recarrega() {

		window.location.reload();
	}


</script>