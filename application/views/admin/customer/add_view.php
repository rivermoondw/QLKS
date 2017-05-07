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
                <div class="form-group <?php echo (form_error('fname')) ? 'has-error' : ''; ?>">
                    <label>First name</label>
                    <input type="text" class="form-control" placeholder="Nhập first name" name="fname"
                           value="<?php echo set_value('fname', ''); ?>">
                </div>
                <div class="form-group <?php echo (form_error('lname')) ? 'has-error' : ''; ?>">
                    <label>Last name</label>
                    <input type="text" class="form-control" placeholder="Nhập last name" name="lname"
                           value="<?php echo set_value('lname', ''); ?>">
                </div>
                <div class="form-group <?php echo (form_error('id')) ? 'has-error' : ''; ?>">
                    <label>CMTND</label>
                    <input type="text" class="form-control" placeholder="Nhập CMTND" name="id"
                           value="<?php echo set_value('id', ''); ?>">
                </div>
                <div class="form-group <?php echo (form_error('dob')) ? 'has-error' : ''; ?>">
                    <label>Ngày Sinh</label>
                    <input type="text" class="form-control" placeholder="Nhập ngày sinh" name="dob"
                           value="<?php echo set_value('dob', ''); ?>">
                </div>
                <div class="form-group <?php echo (form_error('sex')) ? 'has-error' : ''; ?>">
                    <label>Giới tính</label>
                    <!-- <input type="text" class="form-control" placeholder="Nhập gioi tính" name="sex" -->
                           <!-- value="<?php echo set_value('sex', ''); ?>"> -->
                    <input type="radio" class="form-control" name="sex" value="<?php echo set_value('sex', ''); ?>" checked> Nam<br>
                    <input type="radio" class="form-control" name="sex" value="<?php echo set_value('sex', ''); ?>" checked> Nữ<br>
                </div>
                <div class="form-group <?php echo (form_error('phone')) ? 'has-error' : ''; ?>">
                    <label>Số điện thoại</label>
                    <input type="text" class="form-control" placeholder="Nhập SDT" name="phone"
                           value="<?php echo set_value('phone', ''); ?>">
                </div>
                <div class="form-group <?php echo (form_error('address')) ? 'has-error' : ''; ?>">
                    <label>Địa chỉ</label>
                    <input type="text" class="form-control" placeholder="Nhập địa chỉ" name="address"
                           value="<?php echo set_value('address', ''); ?>">
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