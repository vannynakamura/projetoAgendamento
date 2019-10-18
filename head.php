<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Cadastro</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="shortcut icon" href="img/favicon_tec.png"/>
        <link rel="stylesheet" href="css/background.css">
        <link rel="stylesheet" href="css/all.min.css">
        <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css">

        <script src="js/jquery-3.4.1.min.js"></script>
        <script type="text/javascript" charset="utf8" src="js/jquery.dataTables.js"></script>
        <script type="text/javascript" charset="utf8" src="js/dataTables.bootstrap4.min.js"></script>
        <script src="js/sweetalert.min.js"></script>

        <script src="js/control.js"></script>

        <script>
            $(document).ready( function () {
                $('.table').DataTable({
                    "language": {
                        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese-Brasil.json"
                    }
                });
            });
        </script>
    </head>
    <body>
