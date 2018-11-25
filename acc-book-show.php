<div class="container">
<?php
$arr_month = ["","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค."];
?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>สมุบัญชีรายวันทั่วไป</h4>
            </div>
            <div class="card-body">
                <?php
                $check_year_duplicate = 0;
                $sql = "SELECT * FROM tb_account_book GROUP BY YEAR(date) ORDER BY YEAR(date) ASC";
                $queryYear = mysqli_query($conn, $sql);
                while($rowYear = mysqli_fetch_array($queryYear)){
                    $yearOriginal = date("Y", strtotime($rowYear['date']));
                    $year = date("Y", strtotime($rowYear['date'])) + 543;
                ?>
                <table class="table table-bordered table-hover">
                    
                    <thead >
                        <tr class="text-center">
                            <th colspan="2">พ.ศ.<?=$year?> </th>
                            <th rowspan="2" class="align-middle">รายการ</th>
                            <th rowspan="2" class="align-middle">เลขที่<br>บัญชี</th>
                            <th colspan="2">เดบิต</th>
                            <th colspan="2">เครดิต</th>
                        </tr>
                        <tr class="text-center">
                            <th>เดือน</th>
                            <th>วันที่</th>
                            <!-- <th>รายการ</th> -->
                            <!-- <th>เลขที่บัญชี</th> -->
                            <th>บาท</th>
                            <th>สต.</th>
                            <th>บาท</th>
                            <th>สต.</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        
                        $check_month_duplicate = 0;
                        $check_day_duplicate = 0;
                        $total_debit = 0.00;
                        $total_credit = 0.00;
    
                        $sql = "SELECT * FROM tb_account_book WHERE YEAR(date) = '$yearOriginal' ORDER BY date ASC, id ASC";
                        $queryBook = mysqli_query($conn, $sql);
                        $arr_book[] = array();
                        while($row = mysqli_fetch_array($queryBook)){
                            $arr_book[] = $row;
                        }
                        $queryBook = mysqli_query($conn, $sql);
                        $index = 1;
                        while($rowBook = mysqli_fetch_array($queryBook)){ 
                            
                            $month = date("m", strtotime($rowBook['date']));
                            $id_acc = $rowBook['id_acc'];
                            $sql = "SELECT * FROM tb_account_number 
                                        WHERE id = '$id_acc' ";
                            $queryAccNum = mysqli_query($conn, $sql);
                            $rowAccNum = mysqli_fetch_array($queryAccNum);
                        ?>
                        <tr class="text-center">
                            <td> 
                                <?php
                                
                                
                                if($check_month_duplicate != $month){
                                    echo $arr_month[(int)$month];
                                }
                                
                                ?>
                            </td>
                            <td>
                            <?php
                                $day = date("d", strtotime($rowBook['date']));
                                
                                if($check_day_duplicate != $day){
                                    echo (int)$day;
                                }
                                $check_day_duplicate = $day;
                                ?>
                            </td>
                            <td class="text-left"> 
                                <?php
                                if($rowBook['status'] == "note"){
                                    echo "<b>".$rowBook['detail']."</b>";
                                }else if($rowBook['status'] == "debit"){
                                    echo $rowAccNum['acc_title'];
                                }else if($rowBook['status'] == "credit"){
                                    echo "&nbsp; &nbsp; &nbsp; &nbsp;".$rowAccNum['acc_title'];
                                }
                                ?>
                            </td>
                            <td><?=$rowAccNum['acc_number']?></td>
                            <td class="text-right">
                                <?php
                                if($rowBook['status'] == 'debit'){
                                    echo number_format($rowBook['cost']);
                                    $total_debit = $total_debit + $rowBook['cost'];
                                }
                                ?>
                            </td>
                            <td>
                                <?php
                                if($rowBook['status'] == 'debit'){
                                    $splits = explode(".", "".$rowBook['cost']);
                                    if($splits[1] == "00"){
                                        echo "-";
                                    }else{
                                        echo $splits[1];
                                    }
                                }else if($rowBook['status'] == 'credit'){
                                    echo "";
                                } else if($rowBook['status'] == 'note'){
                                    echo "";
                                }else{
                                    echo "-";
                                }
                                ?>
                            </td>
                            <td class="text-right">
                            <?php
                                if($rowBook['status'] == 'credit'){
                                    echo number_format($rowBook['cost']);
                                    $total_credit = $total_credit + $rowBook['cost'];
                                }
                            ?>
                            </td>
                            <td>
                                <?php
                                if($rowBook['status'] == 'debit'){
                                    echo "";
                                }else if($rowBook['status'] == 'credit'){
                                    $splits = explode(".", "".$rowBook['cost']);
                                    if($splits[1] == "00"){
                                        echo "-";
                                    }else{
                                        echo $splits[1];
                                    }
                                }else if($rowBook['status'] == 'note'){
                                    echo "";
                                }else{
                                    echo "-";
                                }
                                ?>

                                
                            </td>
                        </tr>
                        <?php
                        $next_month = date("m", strtotime($arr_book[$index+1]['date']));
                        
                        if((int)$next_month != (int)$month ){
                        ?>
                        <tr class="text-center">
                            <td colspan="4" class="text-right"> <b>รวม</b> </td>
                            <td class="text-right">
                                <b> <?=number_format($total_debit)?> </b>
                            </td>
                            <td>
                            <?php
                                $splits = explode(".", "".number_format($total_debit,2));
                                if($splits[1] == "00"){
                                    echo "-";
                                }else{
                                    echo $splits[1];
                                }
                            
                                ?>
                            </td>
                            <td class="text-right">
                                <b> <?=number_format($total_credit)?> </b>
                            </td>
                            <td>
                            <?php
                                $splits = explode(".", "".number_format($total_credit,2));
                                if($splits[1] == "00"){
                                    echo "-";
                                }else{
                                    echo $splits[1];
                                }
                            
                                ?>
                            </td>
                        </tr>
                        <?php
                            // clear value for next month
                            $total_debit = 0.00;
                            $total_credit = 0.00;
                        }
                        ?>

                        <?php
                            $check_month_duplicate = $month;
                            $index++;
                        }
                        ?>
                    </tbody>

                </table>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>
</div>