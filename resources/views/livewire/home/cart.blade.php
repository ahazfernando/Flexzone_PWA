<!doctype html>
<html lang="en">
<head>
  @include('livewire.home.css')
</head>
<body>
  <!-- Start Header/Navigation -->
  @include('livewire.home.header')
  <!-- End Header/Navigation -->

  <div class="intro-excerpt">
    <h1 class="cart-title">Cart</h1>
  </div>

  <div class="container">
    <div class="row mb-5">
      <form class="col-md-12" method="post">
        <div class="site-blocks-table">
          <table class="table">
            <thead>
              <tr>
                <th class="product-thumbnail">Image</th>
                <th class="product-name">Product</th>
                <th class="product-price">Price</th>
                <th class="product-remove">Remove</th>
              </tr>
            </thead>
            <tbody>
              <!-- The total cart amount is initialized from here-->
              <?php $net_total = 0; ?>
              @foreach($carting as $cartitem)
              <tr>
                <td class="product-thumbnail">
                  <img src="/products/{{$cartitem->pro_image}}" alt="Image" class="img-fluid">
                </td>
                <td class="product-name">
                  <h2 class="h5 text-black">{{ $cartitem->pro_name }}</h2>
                </td>
                <td>LKR&nbsp;{{ $cartitem->pro_price }}</td>
                <td><a href="{{ url('remove_cart_item', $cartitem->id) }}" class="cart-remove-btn">Remove</a></td>
              </tr>
              <!-- The Grand Total of the products -->
              <?php $net_total += $cartitem->pro_price; ?>
              @endforeach
            </tbody>
          </table>
        </div>
      </form>
    </div>

    <div class="main-content">
      <!-- Final Amount -->
      <div class="cart-totals-container">
        <div class="row justify-content-end">
          <div class="col-md-12">
            <div class="row text-right border-bottom mb-5">
              <h3 class="text-black h4 text-uppercase">Cart Totals</h3>
            </div>
            <div class="row mb-5">
              <div class="col-md-6">
                <span class="text-black">Total</span>
              </div>
              <div class="col-md-6 text-right">
                <strong class="text-black">LKR&nbsp;{{ $net_total }}</strong>
              </div>
            </div>
            <div class="row">
            <form class="col-md-12" method="get">
            <a href="{{ url('payment_cod') }}" 
            style="display: inline-block; padding: 10px 20px; border-radius: 25px; text-decoration: none; color: #fff; background-color: #ff4433; font-size: 16px;">
            Cash on Delivery</a>
            <a href="{{ url('payment_cash', $net_total) }}" 
            style="display: inline-block; padding: 10px 20px; border-radius: 25px; text-decoration: none; color: #fff; background-color: #ff4433; font-size: 16px;">
            Pay Using Card</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Start Footer Section -->
  @include('livewire.home.footer')
  <!-- End Footer Section -->  
</body>
</html>
