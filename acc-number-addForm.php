<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4> เพิ่มหมายเลขบัญชี </h4>
            </div>
            <div class="card-body">
                <form action="?menu=acc-number-addDB"  method="POST">
                    
                    <div class="form-group">
                        <label>เลขที่บัญชี</label>
                        <input type="number" name="acc_number" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>รายการ</label>
                        <input type="text" name="acc_title" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-success">บันทึก</button>
                </form>
            </div>
        </div>
    </div>
</div>