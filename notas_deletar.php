<?php
include 'conexao.php';

if (isset($_GET['id'])) {
    $id = (int) $_GET['id']; 

    $sql = "DELETE FROM notas_alunos WHERE id = $id";

    if (mysqli_query($conn, $sql)) {
        header("Location: notas_index.php?msg=deletado");
        exit;
    } else {
        echo "Erro ao excluir: " . mysqli_error($conn);
    }
} else {
    echo "ID não informado!";
}
?>