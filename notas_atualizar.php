<?php
include 'conexao.php';

$id = $_POST['id'];
$n1 = $_POST['nota1'];
$n2 = $_POST['nota2'];
$n3 = $_POST['nota3'];

mysqli_query($conn, "
UPDATE notas_alunos 
SET nota1='$n1', nota2='$n2', nota3='$n3'
WHERE id=$id
");

header("Location: notas_index.php?msg=editado");