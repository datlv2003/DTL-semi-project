@extends('frontend/master-frontend')
@section('title',"Chi Tiết Sản Phẩm")
@section('main')
	<link rel="stylesheet" href="css/details.css">
				<div id="main" class="col-md-9">
					<!-- main -->
					<!-- phan slide la cac hieu ung chuyen dong su dung jquey -->
					<div id="slider">
						<div id="demo" class="carousel slide" data-ride="carousel">

							<!-- Indicators -->
							<ul class="carousel-indicators">
								<li data-target="#demo" data-slide-to="0" class="active"></li>
								<li data-target="#demo" data-slide-to="1"></li>
								<li data-target="#demo" data-slide-to="2"></li>
							</ul>

							<!-- The slideshow -->
							<div class="carousel-inner">
								<div class="carousel-item active">
									<img src="img/home/slide-1.png" alt="Los Angeles" >
								</div>
								<div class="carousel-item">
									<img src="img/home/slide-2.png" alt="Chicago">
								</div>
								<div class="carousel-item">
									<img src="img/home/slide-3.png" alt="New York" >
								</div>
							</div>

							<!-- Left and right controls -->
							<a class="carousel-control-prev" href="#demo" data-slide="prev">
								<span class="carousel-control-prev-icon"></span>
							</a>
							<a class="carousel-control-next" href="#demo" data-slide="next">
								<span class="carousel-control-next-icon"></span>
							</a>
						</div>
					</div>

					<div id="banner-t" class="text-center">
						<div class="row">
							<div class="banner-t-item col-md-6 col-sm-12 col-xs-12">
								<a href="#"><img src="img/home/banner-t-1.png" alt="" class="img-thumbnail"></a>
							</div>
							<div class="banner-t-item col-md-6 col-sm-12 col-xs-12">
								<a href="#"><img src="img/home/banner-t-1.png" alt="" class="img-thumbnail"></a>
							</div>
						</div>					
					</div>

					<div id="wrap-inner" class="col-md-9">
						<div  class="row list-product">
							<div class="col-md-12">
							<div class="clearfix"></div>
							<h3>{{$item->prod_name}}</h3>
								<div id="product-img" class="col-xs-12 col-sm-12 col-md-3 text-center">
									<img  src="{{asset('editor/editor/storage/app/avatar/'.$item->prod_img)}}">
								</div>
								<div id="product-details" class="col-xs-12 col-sm-12 col-md-9">
									<p>Giá: <span class="price">{{number_format($item->prod_price,0,',','.')}}</span></p>
									<p>Bảo hành: {{$item->prod_warranty}}</p> 
									<p>Phụ kiện: {{$item->prod_accessories}}</p>
									<p>Tình trạng:{{$item->prod_condition}}</p>
									<p>Khuyến mại: {{$item->prod_promotion}}</p>
									<p>Còn hàng: @if($item->prod_status==1)Còn Hàng @else Hết Hàng @endif </p>
									<p class="add-cart text-center"><a href="{{asset('cart/add/'.$item->prod_id)}}">Thêm Vào Giỏ Hàng</a></p>
								</div>		
							</div>
							</div>							
						</div>
						<div id="product-detail">
							<h3>Chi tiết sản phẩm</h3>
							<p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
								quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
								consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
								cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
								proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
								quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
								consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
								cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
							proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
						</div>
						<div id="comment" class="row list-product">
							<div class="col-md-12">
							<h3>Bình luận</h3>
							<div class="col-md-9 comment">
								<form method="post">
								<div class="form-group">
										<label for="email">Email:</label>
										<input required type="email" class="form-control" id="email" name="email">
									</div>
									<div class="form-group">
										<label for="name">Tên:</label>
										<input required type="text" class="form-control" id="name" name="name">
									</div>
									<div class="form-group">
										<label for="cm">Bình luận:</label>
										<textarea required rows="10" id="cm" class="form-control" name="content"></textarea>
									</div>
									<div class="form-group text-right">
										<button type="submit" class="btn btn-default">Gửi</button>
									</div>
									{{csrf_field()}}
								</form>
							</div>
						</div>
						</div>
						<div id="comment-list">
							@foreach($comments as $comment )
							<ul>
								<li class="com-title">
									{{$comment->com_name}}
									<br>
									<span>{{ date('d/m/Y H:i', strtotime($comment->created_at)) }}
									</span>	
								</li>
								<li class="com-details">
									{{$comment->com_content}}
								</li>
							</ul>
							@endforeach
						</div>
					</div>					
					<!-- end main -->
				</div>
@endsection