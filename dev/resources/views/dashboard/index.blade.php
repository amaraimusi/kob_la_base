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

            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
@include('layouts.common_header')

<div class="container-fluid">
<div id="org_div" style="margin-top:20px;margin-bottom:60px;">
	<h3 class="text-primary">CrudBase 見本機能一覧</h3>
	<div class="row" style="margin-top:20px;">
	
		<!-- カード -->
		<div class="col-sm-3">
			<div class="card border-primary ">
				<div class="card-body" >
					<h5 class="card-title text-primary" style="font-weight:bold">見本管理画面</h5>
					<div class="card_msg">
						<p class="card-text" style="height:80px">管理画面の見本です。このシステムを元に様々なWEBシステムを開発しています。</p>
					</div>
					<a href="{{url('/neko')}}" class="btn btn-primary">ページへ移動</a>
				</div>
			</div>
		</div>
	
		
	</div><!--  row -->
	
</div>



</div><!-- container-fluid -->
@include('layouts.common_footer')


</body>
</html>