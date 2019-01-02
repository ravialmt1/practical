$(document).ready(function(){
	$(document).on('click','.fc-day',function(){
		var date = $(this).attr('data-date');
		$.get('http://localhost/practical/events/create',{'date':date},function(data){
		$('#modal').modal('show')
.find('#modalContent')
.html(data)	
		})
	})
	
}

);