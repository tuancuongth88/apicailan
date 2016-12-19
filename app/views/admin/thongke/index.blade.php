@extends('admin.layout.default')
@section('title')
    {{ $title='Quản lý thống kê' }}
@stop
@section('content')
    <div class="row margin-bottom">
        <div class="col-xs-12">
            {{ Form::open(array('action' => 'ThongKeController@findByParam','method'=>'post')) }}
                <span>Từ ngày</span> <input type="text" name="txt_tu_ngay" id="datepickerStartdate">
                <span>Đến ngày</span> <input type="text" name="txt_den_ngay" id="datepickerEnddate">
                <input type="submit" value="Tra cứu">
            {{ Form::close() }}
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Bảng thống kê</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tr>
                            <th>Số phiếu</th>
                            <th>Số xe</th>
                            <th>Khách hàng</th>
                            <th>Tên hàng</th>
                            <th>Kho</th>
                            <th>Ngày cân</th>
                            <th>XN</th>
                            <th>KL tổng</th>
                            <th>KL xe</th>
                            <th>KL tạp chất</th>
                            <th>KL hàng</th>
                            <th>Tạp chất</th>
                            <th>Đơn giá</th>
                            <th>Thành tiền</th>
                            <th></th>
                        </tr>
                        @foreach($data as $key => $value)
                            <tr>
                                <td>{{ $value->id_so_phieu }}</td>
                                <td>{{ $value->so_xe }}</td>
                                <td>{{ $value->ten_kh }}</td>
                                <td>{{ $value->ten_hang }}</td>
                                <td>{{ $value->kho }}</td>
                                <td>{{ $value->ngay_can }}</td>
                                <td>{{ $value->xuat_nhap }}</td>
                                <td>{{ $value->kl_tong }}</td>
                                <td>{{ $value->kl_xe }}</td>
                                <td>{{ $value->kl_tap_chat }}</td>
                                <td>{{ $value->kl_hang }}</td>
                                <td>{{ $value->tap_chat }}</td>
                                <td>{{ $value->don_gia }}</td>
                                <td>{{ $value->thanh_tien }}</td>
                                <td >
                                    {{--<a href="{{ action('UserController@update', $value->id) }}" class="btn btn-primary">Sửa</a>--}}
                                    {{--{{ Form::open(array('method'=>'DELETE', 'action' => array('UserController@destroy', $value->id), 'style' => 'display: inline-block;')) }}--}}
                                    {{--<button class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?');">Xóa</button>--}}
                                    {{--{{ Form::close() }}--}}
                                    {{--<a href="{{ action('UserController@resPassword', $value->id) }}" class="btn btn-primary">Đổi mật khẩu</a>--}}
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <ul class="pagination">
                <!-- phan trang -->
                {{ $data->appends(Request::except('page'))->links() }}
            </ul>
        </div>
    </div>

@stop

