<div class="row">
    <div class="col-md-12">
        <div class="box box-primary box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Thông tin phòng</h3>
            </div>
            <div class="box-body">
                <table class="table table-condensed">
                    <thead>
                    <tr>
                        <th>Tên phòng</th>
                        <th>Số điện thoại</th>
                        <th>Hạng phòng</th>
                        <th>Loại phòng</th>
                        <th>Giá phòng</th>
                        <th>Tình trạng</th>
                        <th>Ngày đặt phòng</th>
                    </tr>
                    </thead>
                    <?php
                    if (isset($room) && count($room)){
                        foreach ($room as $key => $val){
                            ?>
                            <tr>
                                <td><?php echo htmlspecialchars($val['room']); ?></td>
                                <td><?php echo htmlspecialchars($val['tel']); ?></td>
                                <td><?php echo htmlspecialchars($val['rank']); ?></td>
                                <td><?php echo htmlspecialchars($val['type']); ?></td>
                                <td><?php echo htmlspecialchars($val['price']); ?></td>
                                <td><?php echo ($val['state']==0)?'Còn trống':'Đang thuê'; ?></td>
                                <td></td>
                            </tr>
                            <?php
                        }
                    }
                    else{
                        echo '<tr><td colspan="7">Không có dữ liệu</td></tr>';
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="box box-success box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Thông tin khách</h3>
            </div>
            <div class="box-body">
                <table class="table table-condensed">
                    <thead>
                    <tr>
                        <th>Tên khách</th>
                        <th>Chứng minh thư</th>
                        <th>Ngày sinh</th>
                        <th>Giới tính</th>
                        <th>SĐT</th>
                        <th>Địa chỉ</th>
                    </tr>
                    </thead>
                    <tr>
                        <td>Hoàng Vũ Lộc</td>
                        <td>123456789</td>
                        <td>27-02-1996</td>
                        <td>Nam</td>
                        <td>0123456789</td>
                        <td>Hải Phòng</td>
                    </tr>
                    <tr>
                        <td>Hoàng Vũ Lộc</td>
                        <td>123456789</td>
                        <td>27-02-1996</td>
                        <td>Nam</td>
                        <td>0123456789</td>
                        <td>Hải Phòng</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Dịch vụ sử dụng</h3>
            </div>
            <div class="box-body">
                <table class="table table-condensed">
                    <thead>
                    <tr>
                        <th>Tên dịch vụ</th>
                        <th>Số lần sử dụng</th>
                        <th>Giá dịch vụ</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>101</td>
                        <td>101</td>
                        <td>101</td>
                    </tr>
                    </tbody>
                    <tfoot>
                    <tr>
                        <th colspan="2">Tổng tiền</th>
                        <th>2000000</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Dịch vụ của khách sạn</h3>
            </div>
            <div class="box-body">
                <table class="table table-condensed">
                    <tr>
                        <th>Tên dịch vụ</th>
                        <th>Đơn giá</th>
                    </tr>
                    <tr>
                        <td>101</td>
                        <td>101</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>