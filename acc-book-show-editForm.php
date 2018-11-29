<div class="container">
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4> แก้ไขการบันทึกบัญชี </h4>
            </div>
            <div class="card-body">
                
                <form action="?menu=acc-number-editDB"  method="POST">
                    <?php
                    $id = $_REQUEST['id'];
                    $sql = "SELECT  b.date, b.detail, b.cost, b.status,u.acc_number, u.acc_title FROM tb_account_book AS b INNER JOIN tb_account_number AS u ON b.id = u.id";
                    $query = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_array($query);
                    ?>
                    <div class="form-group">
                        <label>ID</label>
                        <input type="number" name="id" value="<?=$row['id']?>" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label>วันที่</label>
                        <input type="date" name="date" value="<?=$row['date']?>" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label>รายการ</label>
                        <input type="text" name="id_acc" value="<?=$row['acc_title']?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>บาท</label>
                        <input type="text" step="0.01" name="cost" value="" class="form-control" required>
                    </div> 
                    <div class="form-group">
                        <label>ประเภท</label>
                        <input type="text" name="status" value="" class="form-control" required>
                    </div>                   
                    <button type="submit" class="btn btn-primary">แก้ไข</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>