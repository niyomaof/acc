<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4> บันทึกบัญชี </h4>
            </div>
            <div class="card-body">
                <form action="?menu=acc-book-addDB"  method="POST">
                    
                    <div class="form-group">
                        <label>วันที่</label>
                        <input type="date" class="form-control" name="date" placeholder="กรอกวันที่" required>
                    </div>

                    <?php
                    $sql = "SELECT * FROM tb_account_number ORDER BY acc_number ASC";
                    $result = mysqli_query($conn, $sql);
                    ?>
                    <div class="form-group">
                        <label>รายการ</label>
                        <select class="form-control" name="id_acc">
                            <option value="">เลือกรายการ</option>
                            <?php
                            while ($data = mysqli_fetch_array($result)) {
                            ?>
                            <option value="<?php echo $data["id"];?>">
                                <?php echo $data["acc_number"].' - '.$data["acc_title"];?>
                            </option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>จำนวณเงิน</label>
                        <input type="text" name="cost" class="form-control" placeholder="กรอกจำนวนเงิน" required>
                    </div>

                    <div class="form-group">
                        <label>ประเภท</label>
                        <select class="form-control"name="status">
                            <option value="">เลือกประเภท</option>
                            <option value="debit">เดบิด</option>
                            <option value="cardit">เครดิต</option>
                            <option value="note">หมายเหตุ</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>รายละเอียดเพิ่มเติม</label>
                        <input type="text" name="detail" class="form-control" placeholder="รายละเอียดเพิ่มเติม" >
                    </div>
                    <button type="submit" class="btn btn-success">บันทึก</button>
                </form>
            </div>
        </div>
    </div>
</div>