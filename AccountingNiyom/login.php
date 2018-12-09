<!-- ##### Breadcrumb Area Start ##### -->
<div class="breadcrumb-area">
        <!-- Top Breadcrumb Area -->
        <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center" style="background-image: url(img/bg-img/24.jpg); height:400px">
        <h3 class="text-white">Login</h3>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="?menu=home"><i class="fa fa-home"></i> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Login</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
</div>
<!-- ##### Breadcrumb Area End ##### -->

<div class="container">
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4> Login </h4>
            </div>
            <div class="card-body">
                <form action="?menu=login-chk"  method="POST">
                    
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" placeholder="USERNAME" required>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control"  placeholder="PASSWORD" required>
                    </div>
                    <input type="submit" value="Login" class="btn btn-primary" />  <input type="reset" value="Reset" class="btn btn-default" />
                    
            </div>
        </div>
    </div>
</div>
</div>
     