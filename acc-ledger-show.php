<div class="container-fluid">
<br>
<?php
$arr_month = ["","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค."];
?>
    <div class="row">
        <div class="col-md-12">

        <?php
        $sql = "SELECT * FROM tb_account_book GROUP BY YEAR(date) ORDER BY YEAR(date) ASC";
        $queryYear = mysqli_query($conn, $sql);
        while($rowYear = mysqli_fetch_array($queryYear)){
            $yearOriginal = date("Y", strtotime($rowYear['date']));
            $year = date("Y", strtotime($rowYear['date'])) + 543;
        ?>

            <?php
                $sql = "SELECT * FROM tb_account_number ORDER BY acc_number";
                $query = mysqli_query($conn, $sql);
                while($rowAccNum = mysqli_fetch_array($query)){
                    $id_acc = $rowAccNum['id'];

                    $Root_Arr = array();

                    $debitArr = array();
                    $creditArr = array();

                    // Debit 
                    $sql = "SELECT * FROM tb_account_book WHERE id_acc = '$id_acc' AND status = 'debit' ";                
                    $queryBook = mysqli_query($conn, $sql);
                    while($rowBook = mysqli_fetch_array($queryBook)){
                        $date = $rowBook['date'];
                        $countBook = mysqli_fetch_array(mysqli_query($conn, 
                        "SELECT COUNT(*) as count_Book 
                        FROM tb_account_book 
                        WHERE date = '$date' AND status = 'credit' "));
                        
                        $acc_title = "";
                        if ($countBook['count_book'] > 1) {
                            $acc_title = "สมุดรายวันทั่วไป";
                        }else{
                            $getTitleBook = mysqli_fetch_array(mysqli_query($conn, 
                            "SELECT n.acc_title as acc_title
                            FROM tb_account_number n, tb_account_book b 
                            WHERE n.id = b.id_acc AND b.date = '$date' AND b.status = 'credit' "));
                            $acc_title = $getTitleBook['acc_title'];
                        }
                        
                        $debitArr = array(
                            'id' => $rowBook['id'] ,
                            'date' => $rowBook['date'] ,
                            'acc_title'=> $acc_title ,
                            'detait' => $rowBook['detait'] ,
                            'id_acc' => $rowBook['id_acc'] ,
                            'cost' => $rowBook['cost'] ,
                            'status' => $rowBook['status']                        
                        );
                    }

                    // Credit 
                    $sql = "SELECT * FROM tb_account_book WHERE id_acc = '$id_acc' AND status = 'credit' ";                
                    $queryBook = mysqli_query($conn, $sql);
                    while($rowBook = mysqli_fetch_array($queryBook)){
                        $date = $rowBook['date'];
                        $countBook = mysqli_fetch_array(mysqli_query($conn, 
                        "SELECT COUNT(*) as count_Book 
                        FROM tb_account_book 
                        WHERE date = '$date' AND status = 'debit' "));
                        
                        $acc_title = "";
                        if ($countBook['count_book'] > 1) {
                            $acc_title = "สมุดรายวันทั่วไป";
                        }else {
                            $getTitleBook = mysqli_fetch_array(mysqli_query($conn, 
                            "SELECT n.acc_title as acc_title
                            FROM tb_account_number n, tb_account_book b 
                            WHERE n.id = b.id_acc AND b.date = '$date' AND b.status = 'debit' "));
                            $acc_title = $getTitleBook['acc_title'];
                        }
                        
                        $creditArr = array(
                            'id' => $rowBook['id'] ,
                            'date' => $rowBook['date'] ,
                            'acc_title'=> $acc_title ,
                            'detait' => $rowBook['detait'] ,
                            'id_acc' => $rowBook['id_acc'] ,
                            'cost' => $rowBook['cost'] ,
                            'status' => $rowBook['status']                        
                        );
                    }
                    $Root_Arr = array($debitArr, $creditArr);
                ?>
            <div class="card">
                
                <div class="card-header text-center">
                    <span class="h5 align-middle">บัญชี <?=$rowAccNum['acc_title']?></span>
                    <span class="pull-right h5"><?=$rowAccNum['acc_number']?></span>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                            
                            <tr class="text-center">
                                <th colspan="2">พ.ศ.<?=$year?></th>
                                <th rowspan="2" class="align-middle">รายการ</th>
                                <th rowspan="2" class="align-middle">หน้า<br>บัญชี</th>
                                <th colspan="2">เดบิต</th>
                                <th colspan="2">พ.ศ.<?=$year?></th>
                                <th rowspan="2" class="align-middle">รายการ</th>
                                <th rowspan="2" class="align-middle">หน้า<br>บัญชี</th>
                                <th colspan="2">เคดิต</th>
                            </tr>
                            <tr class="text-center">
                                <th>เดือน</th>
                                <th>วันที่</th>
                                <th>บาท</th>
                                <th>สต.</th>
                                <th>เดือน</th>
                                <th>วันที่</th>
                                <th>บาท</th>
                                <th>สต.</th>
                            </tr>
                        </thead>
                        <tbody>
                        
                        <?php
                        $check_month_duplicate =  0;
                        $check_day_duplicate =  0;
                        for($i = 0; $i < count($Root_Arr); $i++ ){
                            $month = date("m", strtotime($Root_Arr[$i]['date']));

                        
                        ?>
                            <tr class="text-center">
                                <!-- เดือน -->
                                <td>
                                <?php                                               
                                if($check_month_duplicate != $month){
                                    echo $arr_month[(int)$month];
                                }                                
                                ?>
                                </td>
                                <!-- วันที่ -->
                                <td>
                                <?php
                                $day = date("d", strtotime($Root_Arr[$i]['date']));
                                if($check_day_duplicate != $day){
                                    echo (int)$day;
                                }  
                                
                                ?>
                                </td>
                                <!-- รายการ -->
                                <td class="text-left"><?=$Roor_Arr[$i]['acc_title']?></td>
                                <td>ร.ว.1</td>
                                <td class="text-right"><?=$Roor_Arr[$i]['cost']?></td>
                                <td>-</td>
                                <td>ม.ค.</td>
                                <td>1</td>
                                <td class="text-left">เงินสด</td>
                                <td>ร.ว.1</td>
                                <td class="text-right">1000</td>
                                <td>-</td>
                        <?php
                            $check_month_duplicate = $month;
                        }
                        ?>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <br>
            <?php
                }
                ?>
            
    <?php
        }
        ?>
        </div>
    </div>
</div>