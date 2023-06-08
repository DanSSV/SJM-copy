document.getElementById("submit-button").addEventListener("click", function() {
  var productName = document.getElementById("product-name").value;
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      var result = JSON.parse(this.responseText);
      document.getElementById("brand").value = result.brand;
      document.getElementById("category").value = result.category;  
      document.getElementById("price").value = result.price;
      document.getElementById("stock").value = result.stock;
      document.getElementById("status").value = result.status;
    }
  };
  xhttp.open("POST", "php/get_product_info.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("product_name=" + productName);
});
// Attach an event listener to the "Confirm" button click event
document.getElementById("confirm-button").addEventListener("click", function() {
  // Retrieve the product name and quantity entered by the user
  var productName = document.getElementById("product-name").value;
  var quantity = document.getElementById("quantity").value;
  
  // Send an AJAX request to the server-side script
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "php/updateStock.php", true);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.onreadystatechange = function() {
    if (xhr.readyState === 4 && xhr.status === 200) {
      // Update the "Stock" input field with the new stock quantity
      document.getElementById("stock").value = xhr.responseText;
    }
  };
  xhr.send("productName=" + productName + "&quantity=" + quantity);
});
