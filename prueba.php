<?php
$mysqli = new mysqli("localhost", "root", "", "sistema_bancario");

/* verificar la conexión */
if (mysqli_connect_errno()) {
    printf("Falló la conexión failed: %s\n", $mysqli->connect_error);
    exit();
}

$query = "SELECT id_empleados FROM empleado where   id_empleados=10";
$result = $mysqli->query($query);

    /* obtener array asociativo */
    if ($row = $result->fetch_array()) {
        printf ("%s", $row["id_empleados"]);
    }

    /* liberar el resultset */
    $result->free();
