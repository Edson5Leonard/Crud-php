<?php
    include("conexion.php");
    $con = conectar();

    
    $search = isset($_GET['search']) ? mysqli_real_escape_string($con, $_GET['search']) : '';

    
    if (!empty($search)) {
        $sql = "SELECT * FROM alumno WHERE nombres LIKE '%$search%'";
    } else {
        $sql = "SELECT * FROM alumno";
    }
    $query = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Alumnos</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            background: #f8f9fa;
        }
        .card-header {
            background-color: #007bff;
            color: white;
            font-weight: bold;
        }
        .table th, .table td {
            vertical-align: middle;
        }
    </style>
</head>
<body>
    
    <nav class="navbar navbar-light bg-light mb-4">
        <div class="container">
            <span class="navbar-brand mb-0 h1">Gestión de Alumnos</span>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-header">
                        <i class="fas fa-user-plus"></i> Registrar nuevo alumno
                    </div>
                    <div class="card-body">
                        <form action="insertar.php" method="POST">
                            <div class="mb-3">
                                <label class="form-label">Código Estudiante</label>
                                <input type="text" class="form-control" name="cod_estudiante" placeholder="Código" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">DNI</label>
                                <input type="text" class="form-control" name="dni" placeholder="DNI" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nombres</label>
                                <input type="text" class="form-control" name="nombres" placeholder="Nombres" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Apellidos</label>
                                <input type="text" class="form-control" name="apellidos" placeholder="Apellidos" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">
                                <i class="fas fa-save"></i> Guardar
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            
            <div class="col-md-8">
                
                <div class="card mb-3">
                    <div class="card-body">
                        <form method="GET" action="alumno.php" class="row g-2">
                            <div class="col-auto flex-grow-1">
                                <input type="text" class="form-control" name="search" placeholder="Buscar por nombre..." value="<?php echo htmlspecialchars($search); ?>">
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-search"></i> Buscar
                                </button>
                            </div>
                            <div class="col-auto">
                                <a href="alumno.php" class="btn btn-secondary">
                                    <i class="fas fa-undo"></i> Limpiar
                                </a>
                            </div>
                        </form>
                    </div>
                </div>

                
                <div class="card">
                    <div class="card-header">
                        <i class="fas fa-list"></i> Lista de alumnos
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="table-primary">
                                    <tr>
                                        <th>Código</th>
                                        <th>DNI</th>
                                        <th>Nombres</th>
                                        <th>Apellidos</th>
                                        <th colspan="2">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        if (mysqli_num_rows($query) > 0) {
                                            while ($row = mysqli_fetch_array($query)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $row['cod_estudiante']; ?></td>
                                        <td><?php echo $row['dni']; ?></td>
                                        <td><?php echo $row['nombres']; ?></td>
                                        <td><?php echo $row['apellidos']; ?></td>
                                        <td>
                                            <a href="actualizar.php?id=<?php echo $row['cod_estudiante']; ?>" class="btn btn-sm btn-info">
                                                <i class="fas fa-edit"></i> Editar
                                            </a>
                                        </td>
                                        <td>
                                            <a href="delete.php?id=<?php echo $row['cod_estudiante']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de eliminar este alumno?');">
                                                <i class="fas fa-trash-alt"></i> Eliminar
                                            </a>
                                        </td>
                                    </tr>
                                    <?php
                                            }
                                        } else {
                                            echo '<tr><td colspan="6" class="text-center text-muted">No se encontraron alumnos</td></tr>';
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>