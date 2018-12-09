<?php include("chk.php") ; ?>
<div class="breadcrumb-area">
        <!-- Top Breadcrumb Area -->
        <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center" style="background-image: url(img/bg-img/24.jpg); height:400px">
        <h3 class="text-white">บันทึกบัญชี</h3>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="?menu=home"><i class="fa fa-home"></i> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">บันทึกบัญชี</li>   
                            <li class="breadcrumb-item active" aria-current="page"><a href="?menu=acc-book-show-edit">แสดงรายการบัญชี</a></li>                      
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
</div>
<div class="container">
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header text-center">
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
                            <option value="0">เลือกรายการ</option>
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
                        <label>จำนวนเงิน</label>
                        <input type="number" step="0.01" name="cost" class="form-control" placeholder="กรอกจำนวนเงิน">
                    </div>

                    <div class="form-group">
                        <label>ประเภท</label>
                        <select class="form-control"name="status" required>
                            <option value="">เลือกประเภท</option>
                            <option value="debit">เดบิด</option>
                            <option value="credit">เครดิต</option>
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
</div>