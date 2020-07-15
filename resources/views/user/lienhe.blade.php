@extends('user.layoutsite')
@section('title')
       Liên Hệ
@endsection
@section('main')
<div class="clearfix my-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center ">
                <h3 class="title-product text-uppercase">
                    <span class="span-title">Liên Hệ</span>
                </h3>
            </div>
        </div>
</div>
<div class="clearfix my-5">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                    <div class="row my-2">
                        <div class="col-md-12">
                            <form>
                                <div class="form-group">
                                  <label for="exampleFormControlInput1">Họ Và Tên</label>
                                  <input type="text" class="form-control" id="exampleFormControlInput1" maxlength="50">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Email</label>
                                    <input type="email" class="form-control" id="exampleFormControlInput1" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Số Điện Thoại</label>
                                    <input type="tel" pattern="^\d{4}-\d{3}-\d{4}$" required class="form-control" id="exampleFormControlInput1" >
                                </div>
                                <div class="form-group">
                                  <label for="exampleFormControlTextarea1">Nội Dung </label>
                                  <textarea class="form-control counted" id="exampleFormControlTextarea1" rows="3"></textarea>
                                   <h6 class="pull-right" id="counter"></h6>

                                </div>
                                <button type="submit" class="btn btn-sm btn-success">
                                        Liên Hệ
                                </button>
                              </form>
                        </div>
                    </div>
                    <div class="row my-5">
                        <div class="col-md-12">
                            <div id="fb-root"></div>
                            <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v7.0&appId=3417082331657785&autoLogAppEvents=1" nonce="fkwaljGG"></script>
                            <div class="fb-comments" data-href="{{ Route('contact') }}" data-numposts="5" data-width="100%"></div>
                        </div>
                    </div>
            </div>
            <div class="col-md-4">
                <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FWatchStore-340207426736206%2F&tabs=timeline&width=400&height=200&small_header=false&adapt_container_width=false&hide_cover=false&show_facepile=true&appId=3417082331657785" width="400" height="200" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')
<script type="text/javascript" src="{{ asset('js/myJs/demsokitu.js') }}">


</script>
@endsection
