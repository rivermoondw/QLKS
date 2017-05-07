<div class="row">
    <!-- left column -->
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <?php echo validation_errors(); ?>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php
            $att = array('role' => 'form');
            echo form_open('', $att);
            ?>
            <div class="box-body">
                <div class="form-group">
                    <label>First name</label>
                    <input type="text" class="form-control" placeholder="Nhập first name" name="fname"
                           value="<?php echo set_value('fname', $customer['fname']); ?>">
                </div>
                <div class="form-group">
                    <label>Last name</label>
                    <input type="text" class="form-control" placeholder="Nhập last name" name="lname"
                           value="<?php echo set_value('lname', $customer['lname']); ?>">
                </div>
                <div class="form-group">
                    <label>CMTND</label>
                    <input type="text" class="form-control" placeholder="Nhập CMTND" name="id"
                           value="<?php echo set_value('id', $customer['id']); ?>">
                </div>
                <div class="form-group">
                    <label>Ngày Sinh</label>
                    <input type="text" class="form-control" placeholder="Nhập ngày sinh" name="dob"
                           value="<?php echo set_value('dob', $customer['dob']); ?>">
                </div>
                <div class="form-group">
                    <label>Giới tính</label>
                    <!-- <input type="text" class="form-control" placeholder="Nhập gioi tính" name="sex" -->
                           <!-- value="<?php echo set_value('sex', ''); ?>"> -->
                    <input type="radio" class="form-control" name="sex" value="<?php echo set_value('sex', $customer['sex']); ?>" checked> Nam<br>
                    <input type="radio" class="form-control" name="sex" value="<?php echo set_value('sex', $customer['sex']); ?>" checked> Nữ<br>
                </div>
                <div class="form-group">
                    <label>Số điện thoại</label>
                    <input type="text" class="form-control" placeholder="Nhập SDT" name="phone"
                           value="<?php echo set_value('phone', $customer['phone']); ?>">
                </div>
                <div class="form-group">
                    <label>Địa chỉ</label>
                    <input type="text" class="form-control" placeholder="Nhập địa chỉ" name="address"
                           value="<?php echo set_value('address', $customer['address']); ?>">
                </div>
            </div>
            <!-- /.box-body -->

            <div class="box-footer">
                <input type="submit" name="submit" value="Xác nhận" class="btn btn-primary">
            </div>
            <?php echo form_close(); ?>
        </div>
        <!-- /.box -->
    </div>
    <!--/.col (left) -->
</div>
<!-- /.row -->