<?php
if(!isset($pageTitle)) {
    $pageTitle = 'CRUD de Usuários';
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8'); ?></title>

    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    
    <style>
        .navbar-custom {
            background: linear-gradient(90deg, #4facfe, #00c6ff);
            padding: 12px 20px;
        }

        .navbar-custom .navbar-brand {
            color: #fff;
            font-weight: 600;
            font-size: 18px;
        }

        .navbar-custom .nav-link {
            color: #eaf6ff;
            margin-left: 15px;
            font-weight: 500;
            transition: 0.3s;
        }

        .navbar-custom .nav-link:hover {
            color: #ffffff;
            opacity: 0.85;
        }

        .navbar-custom .nav-link.active {
            color: #ffffff;
            font-weight: 600;
        }
    </style>
</head>

<body>


<nav class="navbar navbar-expand-lg navbar-dark navbar-custom shadow-sm">
  <div class="container-fluid">

    <a class="navbar-brand" href="#">
      <i class="bi bi-people-fill me-2"></i>CRUD Usuarios
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="menu">
      <ul class="navbar-nav ms-auto align-items-center">

        <li class="nav-item">
          <a class="nav-link <?= basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : '' ?>" href="index.php">
            <i class="bi bi-grid"></i> CRUD
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link <?= basename($_SERVER['PHP_SELF']) == 'notas_index.php' ? 'active' : '' ?>" href="notas_index.php">
            <i class="bi bi-mortarboard"></i> Notas
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="#">
            <i class="bi bi-bar-chart"></i> Aprendizado
          </a>
        </li>

      </ul>
    </div>

  </div>
</nav>


<div class="container mt-4">