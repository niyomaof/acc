<?php include("chk.php") ; ?>
<div class="breadcrumb-area">
        <!-- Top Breadcrumb Area -->
        <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center" style="background-image: url(img/bg-img/24.jpg); height:400px">
        <h3 class="text-white">แก้ไขหมายเลขบัญชี</h3>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="?menu=home"><i class="fa fa-home"></i> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a href="?menu=acc-number-addForm">เพิ่มหมายเลขบัญชี</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a href="?menu=acc-number-show">แสดงหมายเลขบัญชี</a></li>
                            <li class="breadcrumb-item active" aria-current="page">แก้ไขหมายเลขบัญชี</a></li>
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