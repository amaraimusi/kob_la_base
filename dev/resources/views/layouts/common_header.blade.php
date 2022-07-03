
<nav class="navbar navbar-expand-lg navbar-light bg-success">
	<div class="container-fluid">
		<a class="navbar-brand text-light" href="{{ url('/home') }}">○○システム</a>
	
		<div class="collapse navbar-collapse" >
			<ul class="navbar-nav">
					<li>
						<a class="nav-link text-light" href="#">ダミー1</a>
					</li>
					<li>
						<a class="nav-link text-light" href="#">ダミー2</a>
					</li>
			</ul>
		</div><!-- collapse navbar-collapse -->
	</div><!--  container-fluid -->
	
	<!-- メニュー右寄区分 -->
	<ul class="navbar-nav">
		<li class="nav-item dropdown">
		
			@auth
				<div class="dropdown">
					<button class="btn btn-success dropdown-toggle" type="button" id="dropdown_topmenu1" data-bs-toggle="dropdown" aria-expanded="false">
					{{$userInfo['nickname']}}
					</button>
					<ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown_topmenu1">
						<li><span class="dropdown-item">{{$userInfo['authority_wamei']}}</span></li>
						<li><span class="dropdown-item">{{$userInfo['name']}}</span></li>
						<li><a href="logout" class="dropdown-item">ログアウト</a></li>
					</ul>
				</div>
				
			@else
				<a href="{{ route('login') }}" class="nav-link text-light">ログイン</a>
			@endguest

		</li>
	</ul>
</nav>
<div style="height:4px"></div>

	