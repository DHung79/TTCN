<script type="text/javascript">
	$(document).ready(function(){
		$.get('{{route('menu')}}',function(data){
			$('#nav').html(data);
		})
	})
</script>