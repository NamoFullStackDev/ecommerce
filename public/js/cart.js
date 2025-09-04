function addToCart(productId) {
  $.ajax({
    url: BASE_URL + "products/addtocart/" + productId,
    type: "POST",
    dataType: "json",
    success: function(response) {
      if (response.status === 'success') {
        // Update cart count in navbar
        $("#cart-count").text(response.totalItems);

        // Update quantity display under product
        $("#product-qty-" + productId).html("<b>In Cart: </b>" + response.cartQty).show();
      }
    }
  });
}

function updateCart(productId, action) {
  debugger;
  $.ajax({
    url: BASE_URL + "products/updatecart/" + productId,
    type: "POST",
    data: { action: action },
    dataType: "json",
    success: function(response) {
      if (response.status === 'success') {
        $("#cart-count").text(response.totalItems);

        if (response.itemQty > 0) {
          $("#qty-" + productId).html("<strong>" + response.itemQty + "</strong>");
          $("#total-" + productId).text(response.cart[productId].price * response.itemQty);
        }
        else {
          $("#row-" + productId).remove();
        }

        $("#cart-subtotal").text(response.subtotal);
        $("#grand-total").text(response.grandTotal);
      }
    }
  });

}