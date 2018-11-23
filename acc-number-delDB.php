<?php
$id = $_REQUEST['id'];

$sql = "DELETE FROM tb_account_number WHERE id = '$id' ";
$delete = mysqli_query($conn, $sql);

if ($delete) {
    ?>
    <script type="text/javascript">
        window.location = '?menu=acc-number-show&action=delete';
    </script>
    <?php
}else{
    echo 'ลบไม่ได้ ERROR';
}
?>