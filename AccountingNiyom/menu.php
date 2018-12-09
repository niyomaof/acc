
        <!-- ***** Top Header Area ***** -->
        <div class="top-header-area">
            <div class="container-fluid">
                <div class="row "style="margin-left:400px" >
                    <div class="col-12" style="margin-left:-150px">
                        <div class="top-header-content d-flex align-items-center justify-content-between">
                            <!-- Top Header Content -->
                            <div class="top-header-meta">
                                <a href="#" data-toggle="tooltip" data-placement="bottom" title="niyom_aof@hotmail.com"><i class="fa fa-envelope-o" aria-hidden="true"></i> <span>Email: niyom_aof@hotmail.com</span></a>
                                <a href="#" data-toggle="tooltip" data-placement="bottom" title="+1 234 122 122"><i class="fa fa-phone" aria-hidden="true"></i> <span>Call Us: 093-3843251</span></a>
                            </div>

                            <!-- Top Header Content -->
                            <div class="top-header-meta d-flex">
                            <?php

                            if(isset($_SESSION['LOGIN_ADMIN'])){
                            ?>
                             <a href="?menu=logout" onclick="return confirm('ต้องการเข้าระบบ?')">
                             <i class="fa fa-sign-out" aria-hidden="true"></i> 
                             <span>Logout</span></a>                           
                            <?php

                            }else {
                            ?>
                             <a href="?menu=login" onclick="return confirm('ต้องการเข้าระบบ?')">
                             <i class="fa fa-user" aria-hidden="true"></i> 
                             <span>Login</span></a>                           
                            <?php
                            }
                            ?>                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ***** Navbar Area ***** -->
        <div class="alazea-main-menu">
            <div class="classy-nav-container breakpoint-off " style="margin-left:400px">
                <div class="container-fluid"  style="margin-left:-150px">
                    <!-- Menu -->
                    <nav class="classy-navbar justify-content-between" id="alazeaNav">

                        <!-- Nav Brand -->
                        
                        <a href="?menu=index" class="nav-brand"><img src="img/core-img/logo.png" alt=""></a>

                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <!-- Menu -->
                        <div class="classy-menu" style="margin-left:50px">

                            <!-- Close Button -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>

                            <!-- Navbar Start -->
                            <div class="classynav">
                                <ul>
                                    <li><h4><a href="?menu=home">Home</a></h4></li>
                                    <li><a href="#">จัดการหมายเลขบัญชี</a>
                                        <ul class="dropdown">
                                            <li><a href="?menu=acc-number-addForm">เพิ่มเลขบัญชี</a></li>
                                            <li><a href="?menu=acc-number-show">แสดงรายการเลขบัญชี</a></li>                                           
                                        </ul>
                                    </li>
                                    <li><a href="#">บันทึกบัญชี</a>
                                        <ul class="dropdown">
                                            <li><a href="?menu=acc-book-addForm">บันทึกบัญชี</a></li>
                                            <li><a href="?menu=acc-book-show-edit">แสดงรายการบันทึกบัญชี</a></li>                                           
                                        </ul>
                                    </li>
                                    <li><a href="?menu=acc-book-show">สมุดรายวันทั่วไป</a></li>
                                    <li><a href="?menu=acc-ledger-show">บัญชีแยกประเภท</a></li>
                                    <li><a href="?menu=acc-test-show">งบทดลอง</a></li>
                                    <li><a href="?menu=acc-worksheet-show">กระดาษทำการ</a></li>
                                </ul>    
                            </div>
                            <!-- Navbar End -->
                        </div>
                    </nav>

                    <!-- Search Form -->
                    <div class="search-form">
                        <form action="#" method="get">
                            <input type="search" name="search" id="search" placeholder="Type keywords &amp; press enter...">
                            <button type="submit" class="d-none"></button>
                        </form>
                        <!-- Close Icon -->
                        <div class="closeIcon"><i class="fa fa-times" aria-hidden="true"></i></div>
                    </div>
                </div>
            </div>
        </div>