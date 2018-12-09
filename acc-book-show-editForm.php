<?php include("chk.php") ; ?>
<div class="container">
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4> แก้ไขการบันทึกบัญชี </h4>
            </div>
            <div class="card-body">
                
                <form action="?menu=acc-book-show-editDB"  method="POST">
                    <?php
                    $id = $_REQUEST['id'];
                    $sql = "SELECT * FROM tb_account_book WHERE id = '$id'";
                    $query = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_array($query);
                    ?>
                    <div class="form-group">
                        <label>ID</label>
                        <input type="number" name="id" value="<?=$row['id']?>" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label>วันที่</label>
                        <input type="date" name="date" value="<?=$row['date']?>" class="form-control" >
                    </div>

                    <?php
                    $sql = "SELECT * FROM tb_account_number ORDER BY acc_number ASC";
                    $result = mysqli_query($conn, $sql);
                    ?>
                    <div class="form-group">
                        <label>รายการ</label>
                        <select class="form-control" name="id_acc">
                            <option value="0">เลือกรายการ</option>
                            <?php
                            while ($data = mysqli_fetch_array($result)) {
                                if ($data['id'] == $row['id_acc']) {
                                    ?>
                                    <option value="<?php echo $data["id"];?>" selected>                                    
                                        <?php echo $data["acc_number"].' - '.$data["acc_title"];?>
                                    </option>
                                    <?php
                                }else {
                                    ?>
                                    <option value="<?php echo $data["id"];?>">
                                        <?php echo $data["acc_number"].' - '.$data["acc_title"];?>
                                    </option>
                                    <?php
                                }
                            
                            }
                            ?>
                        </select>                       
                    </div>
                    <div class="form-group">
                        <label>บาท</label>
                        <input type="text" step="0.01" name="cost" value="<?=$row['cost']?>" class="form-control" required>
                    </div> 
                    <div class="form-group">
                        <label>ประเภท</label>
                        <input type="text" name="status" value="<?=$row['status']?>" class="form-control" required>
                    </div>   

                    <div class="form-group">
                        <label>รายละเอียด</label>
                        <input type="text" name="detail" value="<?=$row['detail']?>" class="form-control" >
                    </div> 

                    <button type="submit" class="btn btn-primary">แก้ไข</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>