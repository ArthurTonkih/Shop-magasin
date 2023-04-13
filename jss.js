$('.cartadd').click(function(){
	idProduct = this.id;
	console.log(idProduct);
	$.ajax({
		url: 'save.php',
		type: 'POST',
		data: {
				idProduct: idProduct
				},
		success:function (data) {
			console.log(data)
			if (data=='ok'){
				let n = parseInt($('.number-product').text())
				n++
				$('.number-product').text(n)
					}
			else{ console.log('Данные не сохранены') }
		}
	});
})



$('.categories input').change(function(){
	$('.categories li').removeClass('categories-activ')
	$(this).closest('li').toggleClass('categories-activ')
})