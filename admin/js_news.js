$('.news-delete').click(function(){
	console. log('Привет мир')
	id=$(this).attr('id')
	el=$(this)
	$.ajax({
			url: 'req_news.php',
			type: 'POST',
			data: {
				id: id,
				req_news: 'delnews'
			},
			success: function(data){
				console.log(data)
				if (data.indexOf('ok')!=-1) {
					el.closest('tr').remove()
				}
			}
		})
})