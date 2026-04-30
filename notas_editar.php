<?php
include 'conexao.php';

$pageTitle = "Editar Nota";
include 'includes/header.php';

$id = $_GET['id'] ?? 0;


$res = mysqli_query($conn, "
SELECT n.*, u.nome 
FROM notas_alunos n
JOIN usuarios u ON u.id = n.aluno_id
WHERE n.id = $id
");

$d = mysqli_fetch_assoc($res);
?>

<h3 class="mb-4"> Editar Nota</h3>

<div class="card shadow">
<div class="card-body">

<form action="notas_atualizar.php" method="POST">

<input type="hidden" name="id" value="<?= $d['id'] ?>">

<div class="mb-3">
<label class="form-label">Aluno</label>
<input type="text" class="form-control" value="<?= $d['nome'] ?>" disabled>
</div>

<div class="row">
<div class="col-md-4 mb-3">
<label>Nota 1</label>
<input type="number" step="0.01" name="nota1" value="<?= $d['nota1'] ?>" class="form-control" required>
</div>

<div class="col-md-4 mb-3">
<label>Nota 2</label>
<input type="number" step="0.01" name="nota2" value="<?= $d['nota2'] ?>" class="form-control" required>
</div>

<div class="col-md-4 mb-3">
<label>Nota 3</label>
<input type="number" step="0.01" name="nota3" value="<?= $d['nota3'] ?>" class="form-control" required>
</div>
</div>

<div class="row">
<div class="col-md-6 mb-3">
<label>Peso</label>
<input type="number" step="0.01" name="peso" value="<?= $d['peso'] ?>" class="form-control">
</div>

<div class="col-md-6 mb-3">
<label>Faltas</label>
<input type="number" name="faltas" value="<?= $d['faltas'] ?>" class="form-control">
</div>
</div>

<div class="d-flex gap-2 mt-3">
<button class="btn btn-success">
    <i class="bi bi-check-circle"></i> Atualizar
</button>

<a href="notas_index.php" class="btn btn-secondary">
    <i class="bi bi-arrow-left"></i> Voltar
</a>
</div>

</form>

</div>
</div>

<?php include 'includes/footer.php'; ?>