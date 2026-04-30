<?php 
include 'conexao.php';

$pageTitle = "Notas dos Alunos";
include 'includes/header.php';
?>

<h3 class="mb-3">📊 Notas dos Alunos</h3>

<a href="notas_form.php" class="btn btn-primary mb-3">
    <i class="bi bi-plus-circle"></i> Novo
</a>

<!-- ALERTA -->
<?php if(isset($_GET['msg']) && $_GET['msg'] == 'sucesso'): ?>
    <div class="alert alert-success">
        Nota cadastrada com sucesso!
    </div>
<?php endif; ?>

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
<div class="col-md-3"><div class="card bg-success text-white p-3">Maior: <?= number_format($r['maior'],2) ?></div></div>
<div class="col-md-3"><div class="card bg-danger text-white p-3">Menor: <?= number_format($r['menor'],2) ?></div></div>
<div class="col-md-3"><div class="card bg-info text-white p-3">Média: <?= number_format($r['media'],2) ?></div></div>
</div>

<table class="table table-bordered table-striped">
<tr>
<th>Aluno</th>
<th>Bimestre</th>
<th>N1</th>
<th>N2</th>
<th>N3</th>
<th>Soma</th>
<th>Média</th>
<th>Ponderada</th>
<th>Diferença</th>
<th>Faltas</th>
<th>Situação</th>
<th>Ações</th>
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

$diferenca = ($media >= 7) ? 0 : (7.0 - $media);
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
<td><?= number_format($diferenca,2) ?></td>
<td><?= $d['faltas'] ?></td>

<td>
<span class="badge bg-<?=
$sit == 'Aprovado' ? 'success' :
($sit == 'Recuperação' ? 'warning' : 'danger')
?>">
<?= $sit ?>
</span>
</td>

<td>
    <a href="notas_editar.php?id=<?= $d['id'] ?>" >
        <i class="bi bi-pencil"></i>
    </a>
    
    <a href="notas_deletar.php?id=<?= $d['id'] ?>" 
       onclick="return confirm('Tem certeza que deseja excluir esta nota?')">
   <i class="bi bi-trash"></i>
</a>
</td>

</tr>

<?php endwhile; ?>

</table>

<?php include 'includes/footer.php'; ?>