<?php

$username = $_POST['username'];
$password = $_POST['password'];

$username = $conn->real_escape_string($username);
$password = $conn->real_escape_string($password);


$sql = "SELECT * FROM users WHERE username='$username' AND password='$password' ";


$query = $conn->query($sql);
$row = $query->fetch_array();

if ($query->num_rows > 0) {

   $_SESSION['LOGIN_ADMIN'] = $row['username'];


      ?>
      <script type="text/javascript">
        alert('เข้าสู่ระบบเรียบร้อย');
          window.location = "index.php";
      </script>
      <?php

} else {
   ?>
   <script type="text/javascript">
      alert("เข้าสู่ระบบไม่สำเร็จ !!");
       history.back();
   </script>
   <?php

}
?>
