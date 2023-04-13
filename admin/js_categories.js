$('.categories-delete').click(function(){
	console. log('Привет мир')
	id=$(this).attr('id')
	el=$(this)
	$.ajax({
			url: 'req_categories.php',
			type: 'POST',
			data: {
				id: id,
				req: 'delcategories'
			},
			success: function(data){
				console. log(data)
				if (data.indexOf('ok')!=-1) {
					el.closest('tr').remove()
				}
			}
		})
})