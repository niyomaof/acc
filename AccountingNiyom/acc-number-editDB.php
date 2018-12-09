
<?php
$id = $_REQUEST['id'];
$acc_number = $_REQUEST['acc_number'];
$acc_title = $_REQUEST['acc_title'];


$sql = " UPDATE tb_account_number 
        SET acc_number = '$acc_number',acc_title = '$acc_title'
        WHERE id = '$id' ";

$edit = mysqli_query($conn, $sql);
if ($edit) {
    ?>
    <script type="text/javascript">
        window.location = '?menu=acc-number-show&action=edit';
    </script>
    <?php
   
}else{
    ?>
    <script type="text/javascript">
        window.location = '?menu=acc-number-show&action=same';
    </script>
    <?php

}
?>
