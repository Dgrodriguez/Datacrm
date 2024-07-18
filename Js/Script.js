
function CargarDato(){
    prenderload();

    $.ajax({
        type: "POST",
        url: "api.php",
        data: { action: 'ObtenerData' },
        success: function (data) {

            var html = '<table id="Tbl_Contenido"><thead><tr><th>Id</th><th>Contact</th><th>Lastname</th><th>Createdtime</th></tr></thead></table>';
            $('#resultado').html(html);
            if (data['success']) {
                $("#cargarDatos").hide();
                
                $('#Tbl_Contenido').DataTable({
                    "language": {
                        "url": "https://cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json",
                        buttons: {
                            copyTitle: 'Dato Copiado',
                            copySuccess: {
                                            _: '%d Lineas Copiadas',
                                            1: '1 Linea Copiada'
                                        }
                        }
                    }, "ordering": false, "paging": false ,dom: 'Bfrtip',
                    buttons: [
                        {
                            extend: 'copyHtml5',
                            title: 'Contenido' ,//vacio para que no salga titulo sobre la grid al copiar
                            text: '<div data-toggle="tooltip" title="Copiar"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-files" viewBox="0 0 16 16"> <path d="M13 0H6a2 2 0 0 0-2 2 2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h7a2 2 0 0 0 2-2 2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm0 13V4a2 2 0 0 0-2-2H5a1 1 0 0 1 1-1h7a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1zM3 4a1 1 0 0 1 1-1h7a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V4z"/> </svg></div>',
                        }
                    ]
                });
                var table = $('#Tbl_Contenido').DataTable();
                for (var i = 0; i < data['result'].length; i++) {
                    table.row.add($(`<tr>
                        <td>`+data['result'][i]['id']+`</td>
                        <td>`+data['result'][i]['contact_no']+`</td>
                        <td>`+data['result'][i]['lastname']+`</td>
                        <td>`+data['result'][i]['createdtime']+`</td>
                    </tr>`)).draw();
                };
            } else {
                table.row.add($(`<tr><td colspan="4">No se encontraron clientes</td></tr>`)).draw();
            }
            apagarload();
        }
    });
}

function prenderload() {
    $("#loadingImg").css({ "display": "block" });
}
function apagarload() {
    $("#loadingImg").css({ "display": "none" });
}
