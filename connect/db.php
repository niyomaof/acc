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

  $query = mysqli_set_charset($conn, "utf8");

  ?>