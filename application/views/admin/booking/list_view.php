<div class="row">
    <div class="box box-primary">
        <div class="box-body">
            <?php
            if (isset($list_room) && count($list_room)){
                foreach ($list_room as $key => $val){
            ?>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box <?php echo ($val['state'] == 0)?'bg-aqua':'bg-red' ?>">
                    <a href="#" class="custom"><span class="info-box-icon"><i class="fa fa-home"></i></span></a>
                    <div class="info-box-content">
                        <span class="info-box-number"><?php echo $val['room']; ?></span>
                        <span class="info-box-text"><?php echo $val['rank']; ?></span>
                        <span class="info-box-text"><?php echo $val['type']; ?></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <?php
                }
            }
            else{
                echo 'Không có dữ liệu';
            }
            ?>
        </div>
    </div>
</div>
<!-- /.row -->