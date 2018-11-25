<div class="container">
    <br>
    <?php
$arr_month = ["","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค."];
?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center ">
                    <span class="h5 align-middle">บัญชีงบทดลอง</span>
                </div>
                <div class="card-body">
                    <?php
        $sql = "SELECT * FROM tb_account_book GROUP BY YEAR(date) ORDER BY YEAR(date) ASC";
        $queryYear = mysqli_query($conn, $sql);
        while($rowYear = mysqli_fetch_array($queryYear)){
            $yearOriginal = date("Y", strtotime($rowYear['date']));
            $year = date("Y", strtotime($rowYear['date'])) + 543;
        ?>


                    <table class="table table-bordered table-hover">
                        <thead >
                            <tr class="text-center">
                                <th rowspan="2" class="align-middle">รายการ</th>
                                <th rowspan="2" class="align-middle">เลขที่<br>บัญชี</th>
                                <th colspan="2">เดบิต</th>
                                <th colspan="2">เครดิต</th>
                            </tr>
                            <tr class="text-center">
                                <!-- <th>รายการ</th> -->
                                <!-- <th>เลขที่บัญชี</th> -->
                                <th>บาท</th>
                                <th>สต.</th>
                                <th>บาท</th>
                                <th>สต.</th>
                            </tr>
                        </thead>

                        <?php
                $total_debit_all = 0;
                $total_credit_all = 0;

                $sql = "SELECT * FROM tb_account_number ORDER BY acc_number";
                $query = mysqli_query($conn, $sql);
                
                while($rowAccNum = mysqli_fetch_array($query)){
                    
                    $id_acc = $rowAccNum['id'];

                    $Root_Arr = array();
                    
                    $debitArr = array();
                    $creditArr = array();
                    
                    // Debit
                    $sql = "SELECT * FROM tb_account_book WHERE id_acc = '$id_acc' AND status = 'debit' ORDER BY date ASC, id ASC";
                    
                    $queryBook = mysqli_query($conn, $sql);
                    $indexDebit = 0;
                    while($rowBook = mysqli_fetch_array($queryBook)){
                        $date = $rowBook['date'];
                        $countBook = mysqli_fetch_array(mysqli_query($conn, 
                        "SELECT COUNT(*) as count_book 
                        FROM tb_account_book 
                        WHERE date = '$date' AND status = 'credit'  "));

                        $acc_title = "";
                        if($countBook['count_book'] > 1){
                            $acc_title = "สมุดรายวันทั่วไป";
                        }else{
                            $getTitleBook = mysqli_fetch_array(mysqli_query($conn, 
                            "SELECT n.acc_title as acc_title
                             FROM tb_account_number n, tb_account_book b 
                             WHERE n.id = b.id_acc AND b.date = '$date' AND b.status = 'credit' "));
                             $acc_title = $getTitleBook['acc_title'];
                        }

                        $debitArr = array(
                            'id' => $rowBook['id'].'' ,
                            'date' => $rowBook['date'].'' ,
                            'acc_title' => $acc_title.'' ,
                            'detail' => $rowBook['detail'].'' ,
                            'id_acc' => $rowBook['id_acc'].'' ,
                            'acc_page' => 'ร.ว.1' ,
                            'cost' => $rowBook['cost'].'' ,
                            'status' => $rowBook['status'].''
                        );
                        
                        $Root_Arr[$indexDebit]['debit'] = $debitArr;
                        $indexDebit++;
                    }

                    // Credit
                    $sql = "SELECT * FROM tb_account_book WHERE id_acc = '$id_acc' AND status = 'credit'  ORDER BY date, id ASC ";
                    
                    $queryBook = mysqli_query($conn, $sql);
                    $indexCredit = 0;
                    while($rowBook = mysqli_fetch_array($queryBook)){
                        $date = $rowBook['date'];
                        $countBook = mysqli_fetch_array(mysqli_query($conn, 
                        "SELECT COUNT(*) as count_book 
                        FROM tb_account_book 
                        WHERE date = '$date' AND status = 'debit' "));

                        $acc_title = "";
                        if($countBook['count_book'] > 1){
                            $acc_title = "สมุดรายวันทั่วไป";
                        }else{
                            $getTitleBook = mysqli_fetch_array(mysqli_query($conn, 
                            "SELECT n.acc_title as acc_title
                             FROM tb_account_number n, tb_account_book b 
                             WHERE n.id = b.id_acc AND b.date = '$date' AND b.status = 'debit' "));
                             $acc_title = $getTitleBook['acc_title'];
                        }
                        $creditArr = array(
                            'id' => $rowBook['id'].'' ,
                            'date' => $rowBook['date'].'' ,
                            'acc_title' => $acc_title.'' ,
                            'detail' => $rowBook['detail'].'' ,
                            'id_acc' => $rowBook['id_acc'].'' ,
                            'acc_page' => 'ร.ว.1' ,
                            'cost' => $rowBook['cost'].'' ,
                            'status' => $rowBook['status'].''
                        );
                        $Root_Arr[$indexCredit]['credit'] = $creditArr;
                        $indexCredit++;
                    }
                    // $Root_Arr = array('debit' => $debitArr, 'credit' => $creditArr);
                    // echo '<pre>';
                    //print_r($Root_Arr);
                    // echo '</pre>';

                ?>


                        <?php
                        

                        $total_debit = 0;
                        $total_credit = 0;

                        $check_month_duplicate = 0;
                        $check_day_duplicate = 0;
                        for($i = 0; $i < count($Root_Arr); $i++ ){
                            
                        ?>


                        <?php
                                if($Root_Arr[$i]['debit']['cost'] != ''){
                                    $total_debit = $total_debit + (int)$Root_Arr[$i]['debit']['cost'];
                                    //echo number_format($Root_Arr[$i]['debit']['cost']);
                                }
                                ?>


                        <?php
                                if($Root_Arr[$i]['credit']['cost'] != null){
                                    $total_credit = $total_credit + $Root_Arr[$i]['credit']['cost'];
                                    //echo number_format($Root_Arr[$i]['credit']['cost']);
                                }
                                ?>


                        <?php
                        }
                        ?>

                        
                        <tbody>
                            <tr class="text-center">
                                <td class="text-left">
                                        <?=$rowAccNum['acc_title']?>
                                </td>
                                <td>    
                                        <?=$rowAccNum['acc_number']?>
                                </td>
                                <td class="text-right">
                                    <?php
                                    if($total_debit >= $total_credit ){
                                        $total_debit_all = $total_debit_all + ($total_debit - $total_credit);
                                        ?>
                                        <?=number_format($total_debit - $total_credit)?>
                                        <?php
                                    }
                                    ?>
                                </td>
                                <td>
                                <?php
                                    if($total_debit > 0){
                                        
                                        $splits = explode(".", "".number_format($total_debit, 2));
                                        if($splits[1] == "00"){
                                            echo "-";
                                        }else{
                                            echo $splits[1];
                                        }
                                    }
                                    ?>
                                </td>
                                <td class="text-right">
                                    <?php
                                    if($total_credit > $total_debit ){
                                        $total_credit_all = $total_credit_all + ($total_credit - $total_debit);
                                        
                                        ?>
                                        <?=number_format($total_credit - $total_debit)?>
                                        <?php
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php

                                    if($total_credit > 0){
                                        
                                        $splits = explode(".", "".number_format($total_credit, 2));
                                        if($splits[1] == "00"){
                                            echo "-";
                                        }else{
                                            echo $splits[1];
                                        }
                                    }
                                    
                                    ?>
                                </td>
                            </tr>
                        </tbody>
                        

                        <?php
                }
                ?>
                        <tfoot>
                            <tr>
                                <th> &nbsp; </th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                            <tr>
                                <th> <h5>ผลรวม</h5> </th>
                                <th></th>
                                <th class="text-right">
                                    <b><?=number_format($total_debit_all)?></b>
                                </th>
                                <th></th>
                                <th class="text-right">
                                    <b><?=number_format($total_credit_all)?></b>
                                </th>
                                <th></th>
                            </tr>
                        </tfoot>
                    </table>
                    <?php
        }
        ?>
                </div>
            </div>
        </div>
    </div>
</div>