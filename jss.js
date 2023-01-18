

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
			if (data =='ok'){
				let n = parseInt($('.idProduct').text())
				n++
				$('.idProduct').text(n)
					}
			else{ console.log('Данные не сохранены') }
		}
	});
})