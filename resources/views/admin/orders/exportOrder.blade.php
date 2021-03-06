@extends('admin.layoutsite')
@section('title')
    Quản Lý Hóa Đơn Xuất
@endsection
@section('main')
<nav aria-label="Page breadcrumb" class="my-3">
    <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item breadcrumb-customer"><i class="fas fa-tachometer-alt"></i>Danh Sách Đơn Hàng Đã Tạo Hóa Đơn Và Nhập Số Serinumber </li>
             {{-- <li class="breadcrumb-item active">Sản Phẩm </li> --}}
            </ol>
    </div>

</nav>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
                <div class="table-responsive-sm">
                    <table class="table table-striped" id="table_index">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Mã Hóa Đơn</th>
                            <th scope="col">Tên Người Nhận</th>
                            <th scope="col">Số Điện Thoại</th>
                            <th scope="col">Địa Chỉ</th>
                            <th scope="col"><i class="fas fa-money-check-alt"></i> Tổng Hóa Đơn</th>
                            <th scope="col"><i class="fas fa-clock"></i> Thời Gian Tạo Hóa Đơn</th>
                            <th scope="col"><i class="fas fa-cash-register"></i> Thanh toán</th>
                            <th scope="col">Nhân Viên</th>
                            <th scope="col">Hành Động</th>
                          </tr>
                        </thead>
                        <tbody>
                        </tbody>
                      </table>
                </div>
        </div>
    </div>
</div>


@endsection
@section('script')
       <script>
           $(document).ready(function(){
            var Vietnamese ="{{ asset('jtable/Vietnamese.json') }}";

            $('#table_index').DataTable({
                processing:true,
                serverSide:true,
                language: {
                    "url": Vietnamese
                },
                ajax: '{{ Route('fetch_view_export_orders') }}',
                columns:[
                    {data:'stt',render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }},
                    {data:'codeOder',name:'codeOder'},
                    {data:'fullName',name:'fullName'},
                    {data:'phoneOder',name:'phoneOder'},
                    {data:'Address',name:'Address'},
                    {data:'totalOrder',name:'totalOrder'},
                    {data:'exportDate',name:'exportDate'},
                    {data:'Payments',name:'Payments'},
                    {data:'fullNameAdmin',name:'fullNameAdmin'},
                    {data:'action',name:'action'},

                ]
            });


            $('#table_serinumber').DataTable({
                processing:true,
                serverSide:true,
                language: {
                    "url": Vietnamese
                },
                ajax: '{{ Route('getAllSerinumber') }}',
                columns:[
                    {data:'stt',render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }},
                    {data:'codeproducts',name:'codeproducts'},
                    {data:'serinumberProducts',name:'serinumberProducts'},


                ]
            });
           });
           $(document).on('click','.update_erorr_products',function(event){
            event.preventDefault();
            var id=$(this).attr('href');
            let url ="{{ Route('update_erorr_products',':id') }}";
            url =url.replace(':id',id);
                $.ajax({
                    url:url,
                    type:"GET",
                    success:function(data)
                    {

                        alertify.success(data.success);
                        setTimeout(function(){
                            $('#table_index').DataTable().ajax.reload();



                        }, 1000);
                    }
                });
           });
           $(document).on('click','.update_success_products',function(event){
            event.preventDefault();
            var id=$(this).attr('href');
            let url ="{{ Route('updateOrderSuccess',':id') }}";
            url =url.replace(':id',id);
                $.ajax({
                    url:url,
                    type:"GET",
                    success:function(data)
                    {

                        alertify.success(data.success);
                        setTimeout(function(){
                            $('#table_index').DataTable().ajax.reload();



                        }, 1000);
                    }
                });
           });
       </script>
@endsection
