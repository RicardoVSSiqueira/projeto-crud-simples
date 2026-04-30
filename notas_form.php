<?php include 'conexao.php'; ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Cadastrar Notas</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">
<div class="card shadow">
<div class="card-header">
<h4>📚 Cadastrar Notas</h4>
</div>

<div class="card-body">
<form action="notas_salvar.php" method="POST">

<div class="row">
<div class="col-md-6 mb-3">
<label>Aluno</label>
<select name="aluno_id" class="form-control" required>
<option value="">Selecione</option>

<?php
$res = mysqli_query($conn, "SELECT * FROM usuarios");
while($row = mysqli_fetch_assoc($res)){
    echo "<option value='{$row['id']}'>{$row['nome']}</option>";
}
?>
</select>
</div>

<div class="col-md-6 mb-3">
<label>Bimestre</label>
<select name="bimestre" class="form-control" required>
<option>1º</option>
<option>2º</option>
<option>3º</option>
<option>4º</option>
</select>
</div>
</div>

<div class="row">
<div class="col-md-4">
<label>Nota 1</label>
<input type="number" step="0.01" name="nota1" class="form-control" required>
</div>

<div class="col-md-4">
<label>Nota 2</label>
<input type="number" step="0.01" name="nota2" class="form-control" required>
</div>

<div class="col-md-4">
<label>Nota 3</label>
<input type="number" step="0.01" name="nota3" class="form-control" required>
</div>
</div>

<div class="row mt-3">
<div class="col-md-6">
<label>Peso</label>
<input type="number" step="0.01" name="peso" value="1" class="form-control">
</div>

<div class="col-md-6">
<label>Faltas</label>
<input type="number" name="faltas" value="0" class="form-control">
</div>
</div>

<div class="mt-4">
<button class="btn btn-success">Salvar</button>
<a href="notas_index.php" class="btn btn-secondary">Voltar</a>
</div>

</form>
</div>
</div>
</div>
<?php include 'includes/footer.php' ?>
</body>
</html>