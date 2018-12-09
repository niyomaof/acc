
<?php
$id = $_REQUEST['id'];
$id_acc = $_REQUEST['id_acc'];
$date = $_REQUEST['date'];
$cost = $_REQUEST['cost'];
$status = $_REQUEST['status'];
$detail = $_REQUEST['detail'];

$sql = "UPDATE tb_account_book 
        SET id_acc = '$id_acc',date = '$date',cost = '$cost',status = '$status',detail = '$detail'
        WHERE id = '$id' ";

$edit = mysqli_query($conn, $sql);
if ($edit) {
    ?>
    <script type="text/javascript">
        window.location = '?menu=acc-book-show-edit&action=edit';
    </script>
    <?php
   
}else{
    ?>
    <script type="text/javascript">
        window.location = '?menu=acc-book-show-editForm&action=edit';
    </script>
    <?php

}
?>
