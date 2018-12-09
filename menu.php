<nav class="navbar navbar-expand-lg navbar-dark bg-primary" >
    <a class="navbar-brand" href="#">Web Name</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">

            <li class="nav-item">
                <a class="nav-link" href="?menu=home">Home</a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    จัดการหมายเลขบัญชี
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="?menu=acc-number-addForm">เพิ่มเลขบัญชี</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="?menu=acc-number-show">แสดงรายการเลขบัญชี</a>
                </div>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    บันทึกบัญชี
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="?menu=acc-book-addForm">บันทึกบัญชี</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="?menu=acc-book-show-edit">แสดงรายการบันทึกบัญชี</a>
                </div>
            </li>

             <li class="nav-item">
                <a class="nav-link" href="?menu=acc-book-show">สมุดรายวันทั่วไป</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="?menu=acc-ledger-show">บัญชีแยกประเภท</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="?menu=acc-test-show">งบทดลอง</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="?menu=acc-worksheet-show">กระดาษทำการ</a>
            </li>


        </ul>
        <?php

        if(isset($_SESSION['LOGIN_ADMIN'])){
        ?>
        <a class="btn btn-danger" href="?menu=logout" onclick="return confirm('คุณต้องการจะออก');">
        <i class="fa fa-sign-in"></i>
        Logout</a>
        <?php

        }else {
        ?>
            <a class="btn btn-success"  href="?menu=login" onclick="return confirm('ต้องการเข้าระบบ?')">
            <i class="fa fa-sign-out"></i>
            Login</a>   
        <?php
        }
        ?>
    </div>
</nav>