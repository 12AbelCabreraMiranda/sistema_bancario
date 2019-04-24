<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="login/Resources/css/bootstrap.min.css">
    <script src="login/Resources/js/jquery-1.11.2.js"></script>
    <script src="login/Resources/js/bootstrap.min.js"></script>
</head>
<body>
    <form>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="Cedula">Cedula</label>
                <input type="text" name="cedula" class="form-control">
            </div>
            <div class="form-group col-md-4">            
                <label for="Nombre">Nombre</label>
                <input type="text" name="cedula" class="form-control">
            </div>
            <div class="form-group col-md-4">
                <label for="Apellido">Apellido</label>
                <input type="text" name="cedula" class="form-control">
            </div>
            <div class="form-group col-md-4">
                <label for="fecha">Fecha</label>
                <select name="fecha" id="tasking" class="form-control">
                    <option value="" selected>Seleccione fecha</option>
                    <option value="value1">value1</option>
                </select>
            </div>
            <div class="form-group col-md-4">
                <label for="Municipio_idMunicipio">Municipio_idMunicipio</label>
                <select name="Municipio_idMunicipio" id="Municipio_idMunicipio" class="form-control">
                    <option value="" selected>Municipio_idMunicipio</option>
                    <option value="value">value</option>
                </select>
            </div>
            <div class="form-group col-md-4">
                <label for="Area_idArea">Area_idArea</label>
                <select name="Area_idArea" id="Area_idArea" class="form-control">
                    <option value="" selected>Area_idArea</option>
                    <option value="value">value</option>
                </select>
            </div>
            <div class="form-group col-md-4">
                <label for="Cargo_idCargo">Cargo_idCargo</label>
                <select name="Cargo_idCargo" id="Cargo_idCargo" class="form-control">
                    <option value="" selected>Cargo_idCargo</option>
                    <option value="value">value</option>
                </select>
            </div>
            <div class="form-group col-md-4">
                <label for="Salario">Salario</label>
                <input type="text" name="cedula" class="form-control">
            </div>
            <div class="form-group col-md-4">
                <label for="fecha2">Fecha2</label>
                <select name="fecha" id="tasking" class="form-control" class="form-control">
                    <option value="" selected>Seleccione fecha</option>
                    <option value="value1">value1</option>
                </select>
            </div>
            <div class="form-group col-md-4">
                <label for="Genero">Genero</label>
                <select name="Genero" id="Genero" class="form-control">
                    <option value="" selected>Genero</option>
                    <option value="value">value</option>
                </select>
            </div>
        </div> <!-- cierre de form-row -->
        <!-- dejo fuera a submit -->
        <div class="form-group">
            <input type="submit" value="Enviar" class="btn btn-success">
        </div>
    </form>
</body>
</html>