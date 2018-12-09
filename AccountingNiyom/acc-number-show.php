<?php include("chk.php") ; ?>
<div class="breadcrumb-area">
        <!-- Top Breadcrumb Area -->
        <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center" style="background-image: url(img/bg-img/24.jpg); height:400px">
        <h3 class="text-white">แสดงหมายเลขบัญชี</h3>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="?menu=home"><i class="fa fa-home"></i> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a href="?menu=acc-number-addForm">เพิ่มหมายเลขบัญชี</a></li>
                            <li class="breadcrumb-item active" aria-current="page">แสดงหมายเลขบัญชี</li>
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
                <h4>แสดงหมายเลขบัญชี</h4>
            </div>
            <div class="card-body">
                
                <table id="dataTable" class="table table-bordered table-hover" >
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>เลขที่บัญชี</th>
                            <th>รายการ</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM tb_account_number ORDER BY acc_number ASC";
                        $query = mysqli_query($conn, $sql);
                        
                        $index = 1;
                        while($row = mysqli_fetch_array($query)){
                        
                        ?>
                        <tr>
                            <td> <?=$index?> </td>
                            <td> <?=$row['acc_number']?> </td>
                            <td> <?=$row['acc_title']?> </td>
                            <td>
                                <a href="?menu=acc-number-editForm&id=<?=$row['id']?>" class="btn btn-outline-primary">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                
                                <a href="?menu=acc-number-delDB&id=<?=$row['id']?>" class="btn btn-outline-danger" onclick="return confirm('ยืนยันการลบ')">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <?php
                            $index++;
                        }
                        ?>
                    </tbody>
                </table>
                
            </div>
        </div>
    </div>
</div>
</div>