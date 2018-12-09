<?php include("chk.php") ; ?>
<div class="breadcrumb-area">
        <!-- Top Breadcrumb Area -->
        <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center" style="background-image: url(img/bg-img/24.jpg); height:400px">
        <h3 class="text-white">เพิ่มหมายเลขบัญชี</h3>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="?menu=home"><i class="fa fa-home"></i> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">เพิ่มหมายเลขบัญชี</li>
                            <li class="breadcrumb-item active" aria-current="page"><a href="?menu=acc-number-show">แสดงหมายเลขบัญชี</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
</div>
<!-- ##### Breadcrumb Area End ##### -->
<div class="container">
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header text-center">
                <h4> เพิ่มหมายเลขบัญชี </h4>
            </div>
            <div class="card-body">
                <form action="?menu=acc-number-addDB"  method="POST">
                    
                    <div class="form-group">
                        <label>เลขที่บัญชี</label>
                        <input type="number" name="acc_number" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>รายการ</label>
                        <input type="text" name="acc_title" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-success">บันทึก</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>