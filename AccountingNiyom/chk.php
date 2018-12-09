<?php

if(!isset($_SESSION['LOGIN_ADMIN'])){
  ?>
  <script type="text/javascript">
      window.location = '?menu=login';
  </script>
  <?php
}
?>
