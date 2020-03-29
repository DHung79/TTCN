<div class="box box-margin" style="height: 400px;">
	<h4>Thông Báo Chính</h4>
	<marquee direction="up" height="100%" onmouseover="this.stop();" onmouseout="this.start();">
		<ul>
			@foreach($thongbaochinh as $news)
			<li><a href="{{route('viewTin',['tentin'=>$news->tenkhongdau.'-'.$news->id])}}">{{$news->tentin}}</a></li>
			<hr>
			@endforeach
		</ul>
	</marquee>
</div>