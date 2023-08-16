@if(Session::has('error'))
    <p class="alert alert-danger">{{Session::get('error')}}</p>
@endif

@foreach($errors->all() as $error)
<p class="alert alert-danger">Danh Mục Này Đã Được Thêm</p>
@endforeach