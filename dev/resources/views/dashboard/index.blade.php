<?php 

//■■■□□□■■■□□□
// extract($crudBaseData, EXTR_REFS);

// require_once $crud_base_path . 'CrudBaseHelper.php';
// $cbh = new CrudBaseHelper($crudBaseData);
// $ver_str = '?v=' . $this_page_version; // キャッシュ回避のためのバージョン文字列
// $role = $userInfo['role'];

$ver_str = '?v=1.0.0';

?>
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ダッシュボード</title>
	
	
	<script src="{{ asset('/js/app.js') }}" defer></script>
	<script src="{{ asset('/js/Dashboard/index.js')  . $ver_str}} }}" defer></script>
	
	<link href="{{ asset('/css/app.css')  . $ver_str}}" rel="stylesheet">
	<link href="{{ asset('/js/font/css/open-iconic.min.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/common.css')  . $ver_str}}" rel="stylesheet">

	
</head>
<body>

@include('layouts.common_header')

<div class="container-fluid">

<h3 class="text-primary">○○システムのダッシュボード</h3>
<div class="row">
	<div class="col-12 col-md-2">
		<div>サイドメニュー1</div>
		<div>サイドメニュー2</div>
		<div>サイドメニュー3</div>
		<div>サイドメニュー4</div>
	</div>
	
	<div class="col-12 col-md-10">


		<div id="org_div" style="margin-top:20px;margin-bottom:60px;">
			<div class="row" style="margin-top:20px;">
			
				<!-- カード -->
				<div class="col-sm-3">
					<div class="card border-primary ">
						<div class="card-body" >
							<h5 class="card-title text-primary" style="font-weight:bold">ダミー</h5>
							<div class="card_msg">
								<p class="card-text" style="height:80px">ダミー</p>
							</div>
							<a href="{{url('#')}}" class="btn btn-primary">ページへ移動</a>
						</div>
					</div>
				</div>
			
				<!-- カード -->
				<div class="col-sm-3">
					<div class="card border-primary ">
						<div class="card-body" >
							<h5 class="card-title text-primary" style="font-weight:bold">ダミー</h5>
							<div class="card_msg">
								<p class="card-text" style="height:80px">ダミー</p>
							</div>
							<a href="{{url('#')}}" class="btn btn-primary">ページへ移動</a>
						</div>
					</div>
				</div>
	
			</div><!--  row -->
			
		</div>


	</div>
</div><!--  row  -->


</div><!-- container-fluid -->

@include('layouts.common_footer')

</body>
</html>