<?php
// on server
  $servername = "db"; // localhost
  $username = "root";
  $password = "1234"; // ไม่มี password
  $dbname = "acc_db";

  // on server
  // echo phpinfo();
  
  $conn = mysqli_connect($servername, $username, $password, $dbname);

  if ($conn->connect_error) {
    die("Connect Database fail : " . mysqli_connect_error($conn));
  }

   mysqli_query($conn, " set global sql_mode='STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' ");
   mysqli_query($conn, " set session sql_mode='STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' ");

  $query = mysqli_set_charset($conn, "utf8");



  ?>