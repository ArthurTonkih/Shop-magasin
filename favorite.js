$('.fa-star-o').click(function(){
	$(this).toggleClass('fav')
	id_products = this.id;
	console.log(id_products);
	$.ajax({
		url: 'save_fav.php',
		type: 'POST',
		data: {
            id_products: id_products
				},
		success:function (data) {
			console.log(data)
			if (data=='ok'){
				console.log('Данные сохранены')
					}
			else{ console.log('Данные не сохранены') }
		}
	});
})





// $('.categories input').change(function(){
// 	$('.categories li').removeClass('categories-activ')
// 	$(this).closest('li').toggleClass('categories-activ')
// })