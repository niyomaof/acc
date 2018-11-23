<?php
$date = $_POST['date'];
$detail = $_POST['detail'];
$id_acc = $_POST['id_acc'];
$cost = $_POST['cost'];
$status = $_POST['status'];
$sql = "INSERT INTO tb_account_book (date, detail, id_acc, cost, status)
VALUES ('$date', '$detail', '$id_acc', '$cost', '$status')" ;

$insert = mysqli_query($conn, $sql);
if ($insert) {
    ?>
    <script type="text/javascript">
        window.location = '?menu=acc-book-show&action=save';
    </script>
    <?php
   
}else{
    ?>
    <script type="text/javascript">
        window.location = '?menu=acc-book-addForm&action=same';
    </script>
    <?php

}
?>