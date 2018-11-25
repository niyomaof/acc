<?php
require_once('connect/db.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Acc</title>

    <link rel="stylesheet" href="assets/bootstrap/dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="assets/css/sticky-footer-navbar.css">

    <link rel="stylesheet" href="assets/datatable/jquery.dataTables.min.css">

    <link rel="stylesheet" href="assets/datepicker/gijgo/css/gijgo.css">

    <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
</head>
<body>
    <header>
        <?php
        include_once('menu.php');
        ?>
    </header>


    <?php
    if (isset($_REQUEST['menu'])) {
        include $_REQUEST['menu'] . '.php';
    } else {
        ?>
        <script type="text/javascript">
            window.location = '?menu=home';
        </script>
        <?php
    }
    ?>

    <!-- JS -->
    <script src="assets/jquery/jquery.js"></script>
    <script src="assets/bootstrap/dist/js/bootstrap.js"></script>
    <script src="assets/datatable/jquery.dataTables.min.js"></script>

    <!--popup notification from github https://github.com/ifightcrime/bootstrap-growl --> 
    <script src="assets/popup_notification/jquery.bootstrap-growl.js"></script>

    <script type="text/javascript">

            $(function () {
                // FopTun Custom Code Popup Notification.
                var url_string = window.location.href;
                console.log('url = <?php echo $_REQUEST['action']; ?>');
                var url = new URL(url_string);
                var action = '<?php echo $_REQUEST['action']; ?>';

                if (action === 'save') {
                    $.bootstrapGrowl("บันทึกข้อมูลเรียบร้อย...!", {
                        type: 'success text-white bg-success',
                        offset: {from: 'bottom', amount: 20}
                    });
                } else if (action === 'edit') {
                    $.bootstrapGrowl("แก้ไขข้อมูลเรียบร้อย...!", {
                        type: 'info text-white bg-info',
                        offset: {from: 'bottom', amount: 20}

                    });
                } else if (action === 'delete') {
                    $.bootstrapGrowl("ลบข้อมูลเรียบร้อย...!", {
                        type: 'danger text-white bg-danger',
                        offset: {from: 'bottom', amount: 20}
                    });
                } else if (action === 'same') {
                    $.bootstrapGrowl("ข้อมูลซ้ำ!!!", {
                        type: 'danger text-white bg-danger',
                        offset: {from: 'bottom', amount: 20}
                    });
                }

            });

    </script>
    <!--END popup notification from github https://github.com/ifightcrime/bootstrap-growl --> 

    
    <script type="text/javascript">

        $(document).ready(function () {
            $('#dataTable').DataTable();
            $('#dataTable1').DataTable();
            $('#dataTable2').DataTable();
            $('#dataTable3').DataTable();
        });

    </script>

</body>
</html>