<?php
include 'conexao.php';

$aluno = $_POST['aluno_id'];
$bimestre = $_POST['bimestre'];
$n1 = $_POST['nota1'];
$n2 = $_POST['nota2'];
$n3 = $_POST['nota3'];
$peso = $_POST['peso'];
$faltas = $_POST['faltas'];

$stmt = mysqli_prepare($conn,
"INSERT INTO notas_alunos (aluno_id, bimestre, nota1, nota2, nota3, peso, faltas)
VALUES (?, ?, ?, ?, ?, ?, ?)");

mysqli_stmt_bind_param($stmt, "isddddi",
$aluno, $bimestre, $n1, $n2, $n3, $peso, $faltas);

mysqli_stmt_execute($stmt);

header("Location: notas_index.php");