<div class="box box-margin" style="height: 400px;">
	<h4>Thông Báo Chính</h4>
	<marquee direction="up" height="100%" onmouseover="this.stop();" onmouseout="this.start();">
		<ul>
			@foreach($thongbaochinh as $news)
			<li><a href="{{route('viewTin',['tieude'=>$news->tenkhongdau.'-'.$news->id])}}">{{$news->tieude}}</a></li>
			<hr>
			@endforeach
		</ul>
	</marquee>
</div>