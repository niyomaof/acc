<?php
session_start();
error_reporting(0);
require_once('connect/db.php');
require_once 'chk-session.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Accounting &amp; Software</title>

    <!-- Favicon -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="style.css">
    
</head>

<body>
    <!-- Preloader -->
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-circle"></div>
        <div class="preloader-img">
            <img src="img/core-img/leaf.png" alt="">
        </div>
    </div>

    <!-- ##### Header Area Start ##### -->
    <header class="header-area">
        <?php
        include_once('menu.php');
        ?>
    </header>
    <!-- ##### Header Area End ##### -->
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
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

    <!-- ##### All Javascript Files ##### -->
    <!-- jQuery-2.2.4 js -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/bootstrap/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src="js/plugins/plugins.js"></script>
    <!-- Active js -->
    <script src="js/active.js"></script>

    <br>
    <!-- ##### Footer Area Start ##### -->
    <footer class="footer-area bg-img" style="background-image: url(img/bg-img/3.jpg);">
        <!-- Main Footer Area -->
      

        <!-- Footer Bottom Area -->
        <div class="footer-bottom-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="border-line"></div>
                    </div>
                    <!-- Copywrite Text -->
                    <div class="col-12 col-md-6">
                        <div class="copywrite-text">
                            <p>&copy; <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
</p>
                        </div>
                    </div>
                    <!-- Footer Nav -->
                    <div class="col-12 col-md-6">
                        <div class="footer-nav">
                            <nav>
                                <ul>
                                    <li><a href="#">Home</a></li>
                                    <li><a href="#">About</a></li>
                                    <li><a href="#">Service</a></li>
                                    <li><a href="#">Portfolio</a></li>
                                    <li><a href="#">Blog</a></li>
                                    <li><a href="#">Contact</a></li>
                                </ul>
                            </nav>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ##### Footer Area End ##### -->
</body>

</html>