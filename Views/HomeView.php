<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Consulta de Clientes</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="Js/Script.js"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <!--jquery datatable-->
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <script type="text/javascript" src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script type="text/javascript" src="https://editor.datatables.net/extensions/Editor/js/dataTables.editor.min.js"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
</head>
<body>
    <div id="BloqueaForm" style="display:none"></div>
    <div id="loadingImg" style="display:none"><div class="loadingImg"></div></div>
    <button id="cargarDatos" onclick="CargarDato()" title="Mostrar Datos"><i class="fa-solid fa-table"></i></button>
    <div id="resultado"></div>
</body>
</html>
