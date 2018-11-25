<div class="container">
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4> แก้ไขหมายเลขบัญชี </h4>
            </div>
            <div class="card-body">
                
                <form action="?menu=acc-number-editDB"  method="POST">
                    <?php
                    $id = $_REQUEST['id'];
                    $sql = "SELECT * FROM tb_account_number WHERE id = '$id' ";
                    $query = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_array($query);
                    ?>
                    <div class="form-group">
                        <label>ID</label>
                        <input type="number" name="id" value="<?=$row['id']?>" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label>เลขที่บัญชี</label>
                        <input type="number" name="acc_number" value="<?=$row['acc_number']?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>รายการ</label>
                        <input type="text" name="acc_title" value="<?=$row['acc_title']?>" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">แก้ไข</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>