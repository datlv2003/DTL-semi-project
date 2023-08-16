<!DOCTYPE html>
<html>
	<head>
		<base href="{{asset('/layout/backend/giaodien/') }}/">
		<base href="{{asset('/layout/backend/giaodien/js') }}/">
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>@yield('title')</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/datepicker3.css" rel="stylesheet">
		<link href="css/styles.css" rel="stylesheet">
		<script src="public/layout/backend/giaodien/js/lumino.glyphs.js"></script>
		<script src="{{ asset('/layout/backend/giaodien/js/lumino.glyphs.js') }}"></script>
		<script type="text/javascript" src="{{asset('/layout/backend/giaodien/ckeditor/ckeditor.js/') }}"></script> 
		
	</head>
<body>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="{{asset('admin/home')}}">DTL Tech Admin</a>
				<ul class="user-menu">
					<li class="dropdown pull-right">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> 
                            {{Auth::user()->email}} <span class="caret"></span></a>
							
						<ul class="dropdown-menu">
						  <li><a class="dropdown-item" href="{{asset('logout')}}">Logout</a></li>
						</ul>
					  </li>

				</ul>
			</div>
							
		</div><!-- /.container-fluid -->
	</nav>
		
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<ul class="nav menu">
			<li role="presentation" class="divider"></li>
			<li class="active"><a href="{{asset('admin/home')}}"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Trang chủ</a></li>
			<li><a href="{{asset('admin/product')}}"><svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"></use></svg> Sản phẩm</a></li>
			<li><a href="{{asset('admin/category')}}"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph"></use></svg> Danh mục</a></li>
			<li role="presentation" class="divider"></li>
		</ul>
		
	</div><!--/.sidebar-->
    
    {{-- main --}}
    @yield('main')
	
	<!-- Thay đổi đường dẫn của các tệp tin JavaScript bằng asset -->
<script src="{{ asset('layout/backend/giaodien/js/jquery-1.11.1.min.js') }}"></script>
<script src="{{ asset('layout/backend/giaodien/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('layout/backend/giaodien/js/chart.min.js') }}"></script>
<script src="{{ asset('layout/backend/giaodien/js/chart-data.js') }}"></script>
<script src="{{ asset('layout/backend/giaodien/js/easypiechart.js') }}"></script>
<script src="{{ asset('layout/backend/giaodien/js/easypiechart-data.js') }}"></script>
<script src="{{ asset('layout/backend/giaodien/js/bootstrap-datepicker.js') }}"></script>

	<script>
		$('#calendar').datepicker({
		});

		!function ($) {
		    $(document).on("click","ul.nav li.parent > a > span.icon", function(){          
		        $(this).find('em:first').toggleClass("glyphicon-minus");      
		    }); 
		    $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
	
										
										function changeImg(input){
											//Nếu như tồn thuộc tính file, đồng nghĩa người dùng đã chọn file mới
											if(input.files && input.files[0]){
												var reader = new FileReader();
												//Sự kiện file đã được load vào website
												reader.onload = function(e){
													//Thay đổi đường dẫn ảnh
													$('#avatar').attr('src',e.target.result);
												}
												reader.readAsDataURL(input.files[0]);
											}
										}
										
										$(document).ready(function() {
											$('#avatar').click(function(){
												// alert('hanh')
												// console.log('date');
												$('#img').click();
											});
										});
										
</script>
</body>

</html>
