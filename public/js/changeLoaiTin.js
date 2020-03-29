$(document).ready(function(){
	$('#add').click(function(){
		$('.form-add').slideDown();
	})
	$('#cancel').click(function(){
		$('.form-add').slideUp();
	})
	$('.edit-btn').click(function(){
		id = $(this).data('id');
		name = $(this).data('name');
		$('#id').val(id);
		$('#edit-name').val(name);
		$('.form-edit').slideDown();
	})
	$('#cancel-edit').click(function(){
		$('.form-edit').slideUp();
	})
})
