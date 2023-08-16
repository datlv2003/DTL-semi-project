@extends('frontend/master-frontend')
@section('title',"Danh Mục Sản Phẩm")
@section('main')
	<link rel="stylesheet" href="css/category.css">
	

					<div id="wrap-inner" class="col-md-9">
						<div class="row list-product">
							<h3>{{$catename->cate_name}}</h3>
							<div class="product-list row">
								@foreach($items as $item)
								<div class="product-item col-md-3 col-sm-6 col-xs-12">
									<a href="#"><img src="{{asset('editor/editor/storage/app/avatar/'
									.$item->prod_img)}}" 
										class="img-thumbnail"></a>
									<p><a href="#">{{$item->prod_name}}</a></p>
									<span class="price">{{number_format($item->prod_price,0,',','.')}}$</span>	  
									<div class="marsk">
										<a href="{{asset('details/'.$item->prod_id.'/'.$item->prod_slug.'.html')}}">
											Xem chi tiết</a>
									</div>                                    
								</div>
							@endforeach
							</div>                	                	
						</div>

						<div id="pagination" class="pagination2k3">
							{{$items->links()}}
						</div>
					</div>
@stop
	