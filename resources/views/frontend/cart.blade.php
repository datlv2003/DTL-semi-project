@extends('frontend/master-frontend')
@section('title', "Giỏ Hàng")
@section('main')
    <link rel="stylesheet" href="css/cart.css">
	<script>
		$(document).ready(function () {
			$('.quantity-input').on('change', function () {
				var rowId = $(this).data('rowid');
				var quantity = $(this).val();
	
				updateCartItem(rowId, quantity);
			});
	
			function updateCartItem(rowId, quantity)
			 {
        $.post(
            '{{ route("cart.updateQuantity") }}', // Sửa tên route thành cart.updateQuantity
            { quantity: quantity, rowId: rowId, _token: '{{ csrf_token() }}' },
            function (data) {
                if (data.success) {
                    // Tính lại tổng giá trị và cập nhật hiển thị
                    var newTotal = data.newTotal;
                    $('.total-price').text(newTotal + ' $');
                }
            }
        );
            }
		});
		document.getElementById("goBackButton").addEventListener("click", function() {
        history.back(); // Trở lại trang trước đó
    });
	</script>
    
    <div id="main" class="col-md-9">
        <div id="wrap-inner">
            <div id="list-cart">
                <h3>Giỏ hàng</h3>
				<form action="{{ route('cart.updateQuantity') }}" method="post">
					@csrf                  
                    <table class="table table-bordered .table-responsive text-center">
                        <tr class="active">
                            <td width="11.111%">Ảnh mô tả</td>
                            <td width="22.222%">Tên sản phẩm</td>
                            <td width="22.222%">Số lượng</td>
                            <td width="16.6665%">Đơn giá</td>
                            <td width="16.6665%">Thành tiền</td>
                            <td width="11.112%">Xóa</td>
                        </tr>
                        @foreach($items as $item)
                        <tr>
                            <td>
                                <div id="product-img" class="col-xs-12 col-sm-12 col-md-3 text-center">
                                    <img style="width: 130px; height: 150px"
                                         src="{{ asset('editor/editor/storage/app/avatar/'.$item->attributes['img']) }}">
                                </div>
                            </td>
                            <td>{{ $item->name }}</td>
							<td>
								<div class="form-group">
									<input class="form-control quantity-input" type="number"
										   value="{{$item->quantity}}" data-rowid="{{$item->id}}">
								</div>
							</td>
                            <td><span class="price">{{number_format($item->price, 0, ',', '.') }} $</span></td>
                            <td><span class="price">{{number_format($item->price * $item->quantity, 0, ',', '.') }} $</span></td>
                            <td><a href="{{asset('cart/delete/'.$item->id)}}">Xóa</a></td>
                        </tr>
                        @endforeach
                    </table>
                    <div class="row" id="total-price">
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            Tổng thanh toán: <span class="total-price">{{$total}} $</span>
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <a href="{{asset('/')}}" class="my-btn btn">Mua tiếp</a>
							<a href="{{ url()->previous() }}" class="my-btn btn">Trở lại</a>
                            <a href="{{asset('cart/delete/all')}}" class="my-btn btn">Xóa giỏ hàng</a>
                        </div>
                    </div>
                </form>
            </div>
            <div id="xac-nhan">
                <h3>Xác nhận mua hàng</h3>
                <form method="post">
                    <div class="form-group">
                        <label for="email">Email address:</label>
                        <input required type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="name">Họ và tên:</label>
                        <input required type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="phone">Số điện thoại:</label>
                        <input required type="number" class="form-control" id="phone" name="phone">
                    </div>
                    <div class="form-group">
                        <label for="add">Địa chỉ:</label>
                        <input required type="text" class="form-control" id="add" name="add">
                    </div>
                    <div class="form-group text-right">
                        <button type="submit" class="btn btn-default">Thực hiện đơn hàng</button>
                    </div>
					@csrf
                </form>
            </div>
        </div>
    </div>
@endsection
