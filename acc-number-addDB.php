<?php
$acc_number = $_REQUEST['acc_number'];
$acc_title = $_REQUEST['acc_title'];


$sql = " INSERT INTO tb_account_number(acc_number, acc_title)
VALUES('$acc_number','$acc_title')";

$insert = mysqli_query($conn, $sql);
if ($insert) {
    ?>
    <script type="text/javascript">
        window.location = '?menu=acc-number-show&action=save';
    </script>
    <?php
   
}else{
    ?>
    <script type="text/javascript">
        window.location = '?menu=acc-number-addForm&action=same';
    </script>
    <?php

}
?>