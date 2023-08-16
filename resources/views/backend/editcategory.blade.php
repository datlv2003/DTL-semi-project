@extends('backend/master')
@section('title','Sửa Danh Mục')
@section('main')	
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Danh mục sản phẩm</h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-xs-12 col-md-5 col-lg-5">
					<div class="panel panel-primary">
						<div class="panel-heading">
							Sửa danh mục
						</div>
						<div class="panel-body">
							@if(count($errors) > 0)
								@foreach($errors->all() as $error)
									<p class="alert alert-danger">{{ $error }}</p>
								@endforeach
							@endif

							@include('error.note')
							<form action="" method="post">
							<div class="form-group">
								<label>Tên danh mục:</label>
    							<input required type="text" name="name" class="form-control" placeholder="Tên danh mục..." value="{{$cate->cate_name}}">
							</div>
							<div class="form-group">
								<input type="submit" name="submit" class="form-control btn btn-primary" placeholder="Tên Danh Mục ..." value="Thêm Mới">
							</div>
							<div class="form-group">
								<a href="{{asset('admin/category')}}" class="form-control btn btn-danger">HỦY BỎ</a>
							</div>
							{{ csrf_field() }}
						</form>
						</div>
					</div>
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->
@stop
