<!doctype html>
<html lang="en">
<head>
  @include('livewire.home.css')
  <style type="text/css">
    h1 {
      margin-top: 50px;
    }
  </style>

  <script>
    // This handles the increments of quantity
    function updateQuantity(isIncrement) {
      let quantityInput = document.getElementById('productQuantity');
      let quantity = parseInt(quantityInput.value);

      if (isIncrement) {
        quantityInput.value = quantity + 1;
      } else {
        if (quantity > 1) {
          quantityInput.value = quantity - 1;
        }
      }
    }
  </script>
</head>

<body>
  <div class="hero_area">@include('livewire.home.header')</div>

  <div class="m-card_product_view">
    <!-- The imported imaged from the databse -->
    <div class="m-card_img-box">
      <img src="/products/{{$product->product_image}}" alt="Supplement Image">
    </div>

    <!-- Product details section -->
    <div class="m-card_details">
      <h1>{{ $product->product_name }}</h1>
      <h4>Price: LKR&nbsp;{{$product->product_price}}</h4>
      <p class="m-card_supp_info">About the Product <br>{{ $product->product_description }}</p>
      <p class="m-card_supp_quan">Available Quantity: &nbsp;{{ $product->product_quantity }}</p>
      <!-- Add to cart button -->
      <a href="{{ url('add_to_cart', $product->id) }}" class="btn btn-success m-card_add-to-cart">Add to Cart</a>
    </div>
  </div>

  @include('livewire.home.footer')
</body>
</html>
