$('.brands-delete').click(function(){
	console. log('Привет мир')
	id=$(this).attr('id')
	el=$(this)
	$.ajax({
			url: 'req_brands.php',
			type: 'POST',
			data: {
				id: id,
				req: 'delbrands'
			},
			success: function(data){
				console. log(data)
				if (data.indexOf('ok')!=-1) {
					el.closest('tr').remove()
				}
			}
		})
})