<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Personas con CodeIgniter</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        :root {
            --primary-color: #6C63FF;
            --secondary-color: #4CAF50;
            --accent-color: #FF6B6B;
            --background-color: #F0F3FF;
            --text-color: #333333;
            --card-bg: white;
            --input-bg: white;
            --save-button-color: #28a745; 
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background: var(--background-color);
            color: var(--text-color);
            min-height: 100vh;
            transition: background-color 0.3s ease, color 0.3s ease;
        }
        .container {
            background-color: var(--card-bg);
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin-top: 50px;
            margin-bottom: 50px;
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
        }
        h2 {
            color: var(--primary-color);
            text-align: center;
            margin-bottom: 30px;
            font-weight: 600;
            position: relative;
        }
        h2::after {
            content: '';
            display: block;
            width: 50px;
            height: 3px;
            background-color: var(--accent-color);
            margin: 10px auto;
            transition: width 0.3s ease;
        }
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }
        .card-header {
            background-color: var(--primary-color);
            color: white;
            font-weight: 600;
            text-align: center;
            padding: 15px;
        }
        .btn {
            border-radius: 20px;
            padding: 10px 20px;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        .btn:hover {
            transform: translateY(-2px);
        }
        .btn-primary {
            background-color: var(--primary-color);
            border: none;
        }
        .btn-primary:hover {
            background-color: #5753d9;
        }
        .btn-warning {
            background-color: var(--secondary-color);
            border: none;
            color: white;
        }
        .btn-warning:hover {
            background-color: #45a049;
        }
        .btn-danger {
            background-color: var(--accent-color);
            border: none;
        }
        .btn-danger:hover {
            background-color: #ff5252;
        }
        .btn-save {
            background-color: var(--save-button-color);
            border: none;
            color: white;
            transition: all 0.3s ease;
        }
        .btn-save:hover {
            background-color: #218838; /* Un tono más oscuro para el hover */
            transform: translateY(-2px);
        }		
        .table {
            background-color: var(--card-bg);
            border-radius: 10px;
            overflow: hidden;
            transition: background-color 0.3s ease;
        }
        .table th {
            background-color: var(--primary-color);
            border-top: none;
            color: white;
        }
        .form-control {
            border-radius: 20px;
            padding: 10px 15px;
            border-color: var(--primary-color);
            background-color: var(--input-bg);
            transition: background-color 0.3s ease, color 0.3s ease;
        }
        .form-control:focus {
            border-color: var(--accent-color);
            box-shadow: 0 0 0 0.2rem rgba(255, 107, 107, 0.25);
        }
        .form-group label {
            font-weight: 500;
            color: var(--primary-color);
            transition: color 0.3s ease;
        }
        #darkModeToggle {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 1000;
            background-color: var(--primary-color);
            color: white;
            border: none;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }
        #darkModeToggle:hover {
            transform: scale(1.1);
        }
        .dark-mode {
            --background-color: #1a1a2e;
            --text-color: #ffffff;
            --card-bg: #16213e;
            --input-bg: #0f3460;
            --save-button-color: #2ecc71;
        }
        .dark-mode .table {
            color: var(--text-color);
        }
        .dark-mode .form-control {
            color: var(--text-color);
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        .fade-in {
            animation: fadeIn 0.5s ease-in;
        }
    </style>
</head>
<body>
    <button id="darkModeToggle">
        <i class="fas fa-moon"></i>
    </button>

    <div class="container fade-in">
        <h2><i class="fas fa-users"></i> Gestión de Personas con CodeIgniter</h2>

        <div class="mb-5">
            <?php echo form_open('welcome/agregar', ['id' => 'form-persona', 'class' => 'needs-validation', 'novalidate' => '']); ?>
                <div class="row">
                    <div class="form-group col-sm-4">
                        <label for="nombre"><i class="fas fa-user"></i> Nombre</label>
                        <input type="text" name="nombre" class="form-control" required placeholder="Nombre" id="nombre">
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="ap"><i class="fas fa-user"></i> Apellido paterno</label>
                        <input type="text" name="ap" class="form-control" required placeholder="Apellido paterno" id="ap">
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="am"><i class="fas fa-user"></i> Apellido materno</label>
                        <input type="text" name="am" class="form-control" required placeholder="Apellido materno" id="am">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-4">
                        <label for="fn"><i class="fas fa-calendar-alt"></i> Fecha de nacimiento</label>
                        <input type="date" name="fn" class="form-control" required id="fn">
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="genero"><i class="fas fa-venus-mars"></i> Género</label>
                        <select name="genero" class="form-control" required id="genero">
                            <option value="">Seleccione...</option>
                            <option value="F">Femenino</option>
                            <option value="M">Masculino</option>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-save btn-block"><i class="fas fa-save"></i> Guardar</button>
            <?php echo form_close(); ?>
        </div>         

        <div class="card fade-in">
            <div class="card-header">
                <h4><i class="fas fa-table"></i> Tabla de personas</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Fecha de nacimiento</th>
                                <th scope="col">Género</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $count = 0;
                                foreach ($personas as $persona) {
                                    echo '
                                        <tr class="fade-in">
                                            <td>'.++$count.'</td>
                                            <td>'.$persona->nombre.' '.$persona->ap.' '.$persona->am.'</td>
                                            <td>'.$persona->fn.'</td>
                                            <td>'.($persona->genero == 'F' ? 'Femenino' : 'Masculino').'</td>
                                            <td>
                                                <button type="button" class="btn btn-warning btn-sm" onclick="llenar_datos('.$persona->id.', `'.$persona->nombre.'`, `'.$persona->ap.'`, `'.$persona->am.'`, `'.$persona->fn.'`, `'.$persona->genero.'`)"><i class="fas fa-edit"></i> Editar</button>
                                                <a href="'.base_url('welcome/eliminar/'.$persona->id).'" type="button" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> Eliminar</a>
                                            </td>
                                        </tr>
                                    ';
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        let url = "<?php echo base_url('welcome/editar'); ?>";
        const llenar_datos = (id, nombre, ap, am, fn, genero) => {
            let path = url + "/" + id;
            document.getElementById('form-persona').setAttribute('action', path);
            document.getElementById('nombre').value = nombre;
            document.getElementById('ap').value = ap;
            document.getElementById('am').value = am;
            document.getElementById('fn').value = fn;
            document.getElementById('genero').value = genero;
        };

        // Validación del formulario
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                var forms = document.getElementsByClassName('needs-validation');
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();

        // Modo oscuro
        const darkModeToggle = document.getElementById('darkModeToggle');
        const body = document.body;
        
        darkModeToggle.addEventListener('click', () => {
            body.classList.toggle('dark-mode');
            if (body.classList.contains('dark-mode')) {
                darkModeToggle.innerHTML = '<i class="fas fa-sun"></i>';
            } else {
                darkModeToggle.innerHTML = '<i class="fas fa-moon"></i>';
            }
        });

        // Animaciones
        document.addEventListener('DOMContentLoaded', (event) => {
            document.querySelectorAll('.fade-in').forEach((element, index) => {
                setTimeout(() => {
                    element.style.opacity = '1';
                }, 100 * index);
            });
        });
    </script>
</body>
</html>