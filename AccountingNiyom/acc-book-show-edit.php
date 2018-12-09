<?php include("chk.php") ; ?>
<div class="breadcrumb-area">
        <!-- Top Breadcrumb Area -->
        <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center" style="background-image: url(img/bg-img/24.jpg); height:400px">
        <h3 class="text-white">แสดงรายการบัญชี</h3>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="?menu=home"><i class="fa fa-home"></i> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a href="?menu=acc-book-addForm">บันทึกบัญชี</a></li>   
                            <li class="breadcrumb-item active" aria-current="page">แสดงรายการบัญชี</li>                      
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
                <h4>แสดงรายการบัญชี</h4>
            </div>
            <div class="card-body">
                
                <table id="dataTable" class="table table-bordered table-hover" >
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>วันที่</th>
                            <th>รายการ</th>
                            <th>เลขที่บัญชี</th>
                            <th>จำนวนเงิน</th>
                            <th>สถานะ</th> 
                            <th>รายละเอียดเพิ่มเติม</th>                                             
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM tb_account_book ORDER BY date ASC"; 
                        $queryBook = mysqli_query($conn, $sql);
                        
                        $index = 1;
                        while($rowBook = mysqli_fetch_array($queryBook)){ 
                        
                            $id_acc = $rowBook['id_acc'];
                            $sql = "SELECT * FROM tb_account_number 
                                        WHERE id = '$id_acc' ";
                            $queryAccNum = mysqli_query($conn, $sql);
                            $rowAccNum = mysqli_fetch_array($queryAccNum);
                        ?>
                        <tr>
                            <td> <?=$index?> </td>
                            <td><?=$rowBook['date']?></td>
                            <td> <?=$rowAccNum['acc_number']?> </td>
                            <td> <?=$rowAccNum['acc_title']?></td>
                            <td><?=$rowBook['cost']?> </td>
                            <td><?=$rowBook['status'];?></td>
                            <td><?=$rowBook['detail']?> </td>
                            
                            <td>
                                <a href="?menu=acc-book-show-editForm&id=<?=$rowBook['id']?>" class="btn btn-outline-primary">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                
                                <a href="?menu=acc-book-delDB&id=<?=$rowBook['id']?>" class="btn btn-outline-danger" onclick="return confirm('ยืนยันการลบ')">
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