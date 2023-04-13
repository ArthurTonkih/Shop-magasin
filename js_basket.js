$('.cart-delete').click(function(){
	console.log('Привет мир')
	id=$(this).attr('id')
	el=$(this)
	$.ajax({
			url: 'req.php',
			type: 'POST',
			data: {
				id: id,
				req: 'delcart'
			},
			success: function(data){
				console. log(data)
				if (data.indexOf('ok')!=-1) {
					el.closest('tr').remove()
				}
			}
		})
})
