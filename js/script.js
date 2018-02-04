// bulma burger
document.addEventListener('DOMContentLoaded', function () {

  // Get all "navbar-burger" elements
  var $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

  // Check if there are any navbar burgers
  if ($navbarBurgers.length > 0) {

    // Add a click event on each of them
    $navbarBurgers.forEach(function ($el) {
      $el.addEventListener('click', function () {

        // Get the target from the "data-target" attribute
        var target = $el.dataset.target;
        var $target = document.getElementById(target);

        // Toggle the class on both the "navbar-burger" and the "navbar-menu"
        $el.classList.toggle('is-active');
        $target.classList.toggle('is-active');

      });
    });
  }

});

// register form

$('#regFirstName').on('input', function(){
	if($('#regFirstName').val().length > 3){
		$('#regFirstName').removeClass('is-danger');
		$('#regFirstName').addClass('is-success');
	}
	else {
		$('#regFirstName').addClass('is-danger');
	}
})

$('#regAddress').on('input', function(){
	if($('#regAddress').val().length > 3){
		$('#regAddress').removeClass('is-danger');
		$('#regAddress').addClass('is-success');
	}
	else {
		$('#regAddress').addClass('is-danger');
	}
})

$('#regEmail').on('input', function(){
	if($('#regEmail').val().length > 3){
		$('#regEmail').removeClass('is-danger');
		$('#regEmail').addClass('is-success');
	}
	else {
		$('#regEmail').addClass('is-danger');
	}
})

$('#regUserName').on('input', function(){
	if($('#regUserName').val().length > 3){
		$('#regUserName').removeClass('is-danger');
		$('#regUserName').addClass('is-success');
	}
	else {
		$('#regUserName').addClass('is-danger');
	}
})

$('#regPassword').on('input', function(){
	if($('#regPassword').val().length > 3){
		$('#regPassword').removeClass('is-danger');
		$('#regPassword').addClass('is-success');
	}
	else {
		$('#regPassword').addClass('is-danger');
	}
})

$('#regConpassword').on('input', function(){
	if($('#regConpassword').val() == $('#regPassword').val()){
		$('#regConpassword').removeClass('is-danger');
		$('#regConpassword').addClass('is-success');
	}
	else {
		$('#regConpassword').addClass('is-danger');
		$("<p>*passwords do not match</p>").appendTo("#conPasswordDiv");
	}
})



$('.btnLeft').click(function(){
	var qtyCartId = $(this).data('id');
	var price = $('#itemPrice'+qtyCartId).data('price');
	var qty = parseInt($("#qtyCart"+qtyCartId).text());
	if (qty > 1) {
		qty--;
		$("#qtyCart"+qtyCartId).html(qty);
		$("#itemPrice"+qtyCartId).html(price*qty);

		$.ajax ({
				method: 'post',
				url: 'changecartqty.php',
				data: {
					qtyCartId: qtyCartId,
					qty: qty
				},
				success: function(data){
				}
			})
	}
	else {
		$("#itemPrice"+qtyCartId).html(1);
	}

})

$('.btnRight').click(function(){
	var qtyCartId = $(this).data('id');
	var price = $('#itemPrice'+qtyCartId).data('price');
	var qty = parseInt($("#qtyCart"+qtyCartId).text());
	qty++;

	$("#qtyCart"+qtyCartId).html(qty); 
	$("#itemPrice"+qtyCartId).html(price*qty);
	$.ajax ({
				method: 'post',
				url: 'changecartqty.php',
				data: {
					qtyCartId: qtyCartId,
					qty: qty
				},
				success: function(data){
				}
			})
})

$('.order-dash-trigger').click(function(){
	$('#dash-users').addClass('hide-users');
	$("#dash-orders").removeClass("hide-orders");

})

$('.user-dash-trigger').click(function(){
	$('#dash-orders').addClass('hide-orders');
	$("#dash-users").removeClass("hide-users");

})
