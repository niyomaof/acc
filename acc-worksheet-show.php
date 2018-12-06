<?php include("chk.php") ; ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center">
                    <span class="h5 align-middle">กระดาษทำการ</span>
                </div>
                <div class="card-body">

                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr class="text-center">
                                <th rowspan="2" class="align-middle">ชื่อบัญชี</th>
                                <th rowspan="2" class="align-middle">เลขที่<br>บัญชี</th>
                                <th colspan="2">งบทดลอง</th>
                                <th colspan="2">งบกำไรขาดทุน</th>
                                <th colspan="2">งบดุล</th>

                            </tr>

                            <tr class="text-center">
                                <th>เดบิต</th>
                                <th>เครดิต</th>
                                <th>เดบิต</th>
                                <th>เครดิต</th>
                                <th>เดบิต</th>
                                <th>เครดิต</th>


                            </tr>
                        </thead>
                        <?php
                        $total_test_debit_all = 0;
                        $total_test_credit_all = 0;

                        $total_profit_and_lost_debit_all = 0;
                        $total_profit_and_lost_credit_all = 0;
                        
                        $total_balance_debit_all = 0;
                        $total_balance_credit_all = 0;

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
                                <!-- เดบิต งบทดลอง -->

                                <td>
                                    <?php
                                    if($total_debit >= $total_credit ){
                                        $total_test_debit_all = $total_test_debit_all + ($total_debit - $total_credit);
                                        ?>
                                    <?=number_format($total_debit - $total_credit)?>
                                    <?php
                                    }
                                    ?>
                                </td>
                                <!-- เคดิต งบทดลอง-->
                                <td>
                                    <?php
                                    if($total_credit > $total_debit ){
                                        $total_test_credit_all = $total_test_credit_all + ($total_credit - $total_debit);
                                        
                                        ?>
                                    <?=number_format($total_credit - $total_debit)?>
                                    <?php
                                    }
                                    ?>
                                </td>
                                <!-- เดบิต งบกำไรขาดทุน-->
                                <td>
                                    <?php
                                $acc_numfirst = $rowAccNum['acc_number'];
                                if($acc_numfirst[0] == '4' || $acc_numfirst[0] == '5'){
                                    if($total_debit >= $total_credit ){
                                        $total_profit_and_lost_debit_all = $total_profit_and_lost_debit_all + ($total_debit - $total_credit);
                                        ?>
                                    <?=number_format($total_debit - $total_credit)?>
                                    <?php
                                    }
                                }
                                    ?>
                                </td>
                                <!-- เคดิต งบกำไรขาดทุน-->
                                <td>
                                    <?php
                                $acc_numfirst = $rowAccNum['acc_number'];
                                if($acc_numfirst[0] == '4' || $acc_numfirst[0] == '5'){
                                    if($total_credit > $total_debit ){
                                        $total_profit_and_lost_credit_all = $total_profit_and_lost_credit_all + ($total_credit - $total_debit);
                                        
                                        ?>
                                    <?=number_format($total_credit - $total_debit)?>
                                    <?php
                                    }
                                }
                                    ?>
                                </td>
                                <!-- เดบิต งบดุล-->
                                <td>
                                    <?php
                                $acc_numfirst = $rowAccNum['acc_number'];
                                if($acc_numfirst[0] == '1' || $acc_numfirst[0] == '2' || $acc_numfirst[0] == '3'){
                                    if($total_debit >= $total_credit ){
                                        $total_balance_debit_all = $total_balance_debit_all + ($total_debit - $total_credit);
                                        ?>
                                    <?=number_format($total_debit - $total_credit)?>
                                    <?php
                                    }
                                }
                                    ?>
                                </td>

                                <!-- เคดิต งบดุล-->
                                <td>
                                    <?php
                                $acc_numfirst = $rowAccNum['acc_number'];
                                if($acc_numfirst[0] == '1' || $acc_numfirst[0] == '2' || $acc_numfirst[0] == '3'){                                                              
                                    if($total_credit > $total_debit ){
                                        $total_balance_credit_all = $total_balance_credit_all + ($total_credit - $total_debit);
                                        
                                        ?>
                                    <?=number_format($total_credit - $total_debit)?>
                                    <?php
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
                                <th class="text-center">
                                    <b>
                                        <?=number_format($total_test_debit_all)?></b>
                                </th>
                                <th class="text-center">
                                    <b>
                                        <?=number_format($total_test_credit_all)?></b>
                                </th>

                                <th class="text-center">
                                    <b>
                                        <?=number_format($total_profit_and_lost_debit_all)?></b>
                                </th>
                                <th class="text-center">
                                    <b>
                                        <?=number_format($total_profit_and_lost_credit_all)?></b>
                                </th>


                                <th class="text-center">
                                    <b>
                                        <?=number_format($total_balance_debit_all)?></b>
                                </th>
                                <th class="text-center">
                                    <b>
                                        <?=number_format($total_balance_credit_all)?></b>
                                </th>
                            </tr>
                            
                            <tr class="text-center">
                                <th>
                                    <h5>กำไรสุทธิ</h5>
                                </th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <!-- งบกำไรขาดทุน กลาง-->
                                <th>
                                    <?php
                               
                               if($total_profit_and_lost_debit_all <= $total_profit_and_lost_credit_all){
                                $total_profit_and_lost =  $total_profit_and_lost_credit_all - $total_profit_and_lost_debit_all;
                                    ?>
                                    <b>
                                        <?=number_format( $total_profit_and_lost)?></b>
                                    <?php
                                    }
                           
                                    ?>
                                </th>
                                <th>
                                    <?php
                                if ($total_profit_and_lost_credit_all < $total_profit_and_lost_debit_all) {                                                      
                                $total_profit_and_lost = $total_profit_and_lost_debit_all - $total_profit_and_lost_credit_all;                                   
                                    ?>
                                    <b>
                                        <?=number_format( $total_profit_and_lost)?></b>
                                    <?php
                                    }
                                    ?>
                                </th> 
                                <!-- งบดุล กลาง-->
                                <th>
                                    <?php                              
                               if($total_balance_debit_all <= $total_balance_credit_all){
                                $total_balance =  $total_balance_credit_all - $total_balance_debit_all;
                                    ?>
                                    <b>
                                        <?=number_format( $total_balance)?></b>
                                    <?php
                                    }                          
                                    ?>
                                </th>
                                <th>
                                    <?php                              
                               if($total_balance_credit_all < $total_balance_debit_all){
                                $total_balance =  $total_balance_debit_all - $total_balance_credit_all;
                                    ?>
                                    <b>
                                        <?=number_format( $total_balance)?></b>
                                    <?php
                                    }                          
                                    ?>
                                </th>
                            </tr>
                                   
                            <tr class="text-center">
                                <th>&nbsp;</th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <!-- งบกำไรขาดทุน ผลรวมล่างสุด-->
                                <th>
                                <?php
                                    if ($total_profit_and_lost_debit_all < $total_profit_and_lost_credit_all ) {
                                        $total_profit_and_lost_all =  $total_profit_and_lost + $total_profit_and_lost_debit_all;
                                        ?>                                        
                                        <?=number_format($total_profit_and_lost_all)?>
                                        <?php
                                    } else {
                                       ?>                                      
                                       <?=number_format($total_profit_and_lost_debit_all)?>
                                       <?php
                                    }                                    
                                ?>
                                
                                </th>
                                <th>
                                <?php
                                    if ($total_profit_and_lost_credit_all < $total_profit_and_lost_debit_all ) {
                                        $total_profit_and_lost_all = $total_profit_and_lost + $total_profit_and_lost_credit_all;
                                        ?>
                                        <?=number_format($total_profit_and_lost_all)?>
                                        <?php
                                    } else {
                                       ?>
                                       <?=number_format($total_profit_and_lost_credit_all)?>
                                       <?php
                                    }                                   
                                ?>
                                
                                </th>
                                <!-- งบดุล ผลรวมล่างสุด -->
                                <th>
                                <?php
                                    if ($total_balance_debit_all < $total_balance_credit_all) {
                                        $total_balance_all = $total_balance + $total_balance_debit_all;
                                    ?>
                                    
                                        <?=number_format($total_balance_all)?>
                                    <?php
                                    } else {
                                    ?>
                                    
                                        <?=number_format($total_balance_debit_all)?>
                                    <?php  
                                    }                                   
                                ?>
                                
                                </th>
                                <th>
                                <?php
                                    if ($total_balance_credit_all < $total_balance_debit_all ) {
                                    $total_balance_all = $total_balance + $total_balance_credit_all;
                                    ?>                                   
                                        <?=number_format($total_balance_all)?>
                                    <?php
                                    } else {
                                    ?>                                   
                                        <?=number_format($total_balance_credit_all)?>
                                    <?php
                                    }                               
                                ?>
                                </th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>