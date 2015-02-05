$(document).ready(function(){
	$(document.body).on('click', '.brand-option a', loadBrands);
	$(document.body).on('click', '.brand-item a', loadBrand);
	$(document.body).on('click', '.product td.cart a', addItem);
	$(document.body).on('click', '.btn.checkout', checkout);

	$(document.body).on('click', '.cart-options .download', checkout);
	$(document.body).on('click', '.cart-options .clear', checkout);

	$('.cart-options').hide();
	if($('.brand-option a').length > 0) {
		$('.brand-option a')[0].click();
	}
});

var checkout = function() {
	$(this).hide();
	$('.cart-options').show();
}

var addItem = function() {
	$(this).attr('href');

	$.post("core.ajax.php?s=cart.add", {
		name: $(this).attr('href')
	}, cbAddItem);

	return false;
};

var cbLoadBrands = function(data, status) {
	alert('add product in cart');
}


var loadBrands = function() {
	$('.brand-option a.active').removeClass('active');

	$(this).addClass('active');

	$.post("core.ajax.php?s=brands.list", {
		name: $(this).attr('href')
	}, cbLoadBrands);

	return false;
};

var cbLoadBrands = function(data, status) {
	var n = $('.brand-item a').length;
	$('.brands-list-content').html('');

	if(data.body.length == 0) {
		var brand = $('<li class="list-group-item brand-item">No brands</li>');
		$('.brands-list-content').append(brand);
	}

	$.each(data.body, function(key, val) {
		var brand = $('<li class="list-group-item brand-item"> <a href="'+val.id+'">'+val.name+'</a></li>');
		$('.brands-list-content').append(brand);
	});

	/*
	if(n == 0 && $('.brand-item a').length > 0) {
		$('.brand-item a')[0].click();
	}
	*/
}


var loadBrand = function() {
	$('.product-name').text($(this).text());

	$.post("core.ajax.php?s=products.list", {
		brand: $(this).attr('href')
	}, cbLoadBrand);

	return false;
};

var cbLoadBrand = function(data, status) {
	$('.products .left, .products .right').html('');
	
	var i = 0;
	$.each(data.body, function(key, val) {
		var div = $('<div class="product"><table><tr><td> \
					<h2>'+val.name+'</h2> \
					<p>'+val.sdesc+'</p> \
					</td><td class="cart"> \
					<a href="'+val.id+'"><img src="images/cart.png" class="cart" /></a> \
					</td></tr></table></div>');

		i++;
		if(i % 2 == 1) {
			$('.products .left').append(div);
		} else {
			$('.products .right').append(div);
		}
	});
}