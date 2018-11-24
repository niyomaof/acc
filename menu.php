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
                    <a class="dropdown-item" href="?menu=acc-book-show">แสดงรายการเลขบัญชี</a>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="?menu=acc-ledger-show">บัญชีแยกประเภท</a>
            </li>

        </ul>
        

        <a class="btn btn-outline-dark" href="#" onclick="return confirm('ต้องการออกจากระบบ?')">Logout</a>



    </div>
</nav>