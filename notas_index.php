<?php include 'conexao.php'; 

include 'includes/header.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Notas</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

<h3>📊 Notas dos Alunos</h3>

<a href="notas_form.php" class="btn btn-primary mb-3">+ Novo</a>

<?php
$resumo = mysqli_query($conn, "
SELECT COUNT(*) total,
MAX((nota1+nota2+nota3)/3) maior,
MIN((nota1+nota2+nota3)/3) menor,
AVG((nota1+nota2+nota3)/3) media
FROM notas_alunos");

$r = mysqli_fetch_assoc($resumo);
?>

<div class="row mb-4">
<div class="col-md-3"><div class="card bg-primary text-white p-3">Lançamentos: <?= $r['total'] ?></div></div>
<div class="col-md-3"><div class="card bg-success text-white p-3">Maior Media: <?= number_format($r['maior'],2) ?></div></div>
<div class="col-md-3"><div class="card bg-danger text-white p-3">Menor Media: <?= number_format($r['menor'],2) ?></div></div>
<div class="col-md-3"><div class="card bg-info text-white p-3">Média Geral: <?= number_format($r['media'],2) ?></div></div>
</div>

<table class="table table-bordered table-striped">
<tr>
<th>Aluno</th>
<th>Bimestre</th>
<th>Nota1</th>
<th>Nota2</th>
<th>Nota3</th>
<th>Soma</th>
<th>Média</th>
<th>Ponderada</th>
<th>Faltas</th>
<th>Situação</th>
</tr>

<?php
$sql = mysqli_query($conn, "
SELECT n.*, u.nome
FROM notas_alunos n
JOIN usuarios u ON u.id = n.aluno_id
");

while($d = mysqli_fetch_assoc($sql)):

$soma = $d['nota1'] + $d['nota2'] + $d['nota3'];
$media = $soma / 3;
$ponderada = $media * $d['peso'];

if ($media >= 7 && $d['faltas'] <= 10) {
    $sit = "Aprovado";
} elseif ($media >= 5) {
    $sit = "Recuperação";
} else {
    $sit = "Reprovado";
}
?>

<tr>
<td><?= $d['nome'] ?></td>
<td><?= $d['bimestre'] ?></td>
<td><?= $d['nota1'] ?></td>
<td><?= $d['nota2'] ?></td>
<td><?= $d['nota3'] ?></td>
<td><?= number_format($soma,2) ?></td>
<td><?= number_format($media,2) ?></td>
<td><?= number_format($ponderada,2) ?></td>
<td><?= $d['faltas'] ?></td>
<td>
<span class="badge bg-<?=
$sit == 'Aprovado' ? 'success' :
($sit == 'Recuperação' ? 'warning' : 'danger')
?>">
<?= $sit ?>
</span>
</td>
</tr>

<?php endwhile; ?>

</table>

</div>
<?php include 'includes/footer.php' ?>
</body>

</html>