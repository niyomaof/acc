<div class="container">
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>แสดงรายการเลขบัญชี</h4>
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