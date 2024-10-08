<!DOCTYPE html>
<html lang="en">
<head>
    @include('livewire.admin.css')

    <script>
        function confirmation(event) {
            if (!confirm('Are you sure you want to delete this product?')) {
                event.preventDefault();
            }
        }
    </script>
</head>
<body>
    <div class="container-scroller">
        @include('livewire.admin.navbar')
        @include('livewire.admin.header')
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="int-table-container">
                    <table class="int-centered-table">
                        <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Product Price</th>
                                <th>Product Description</th>
                                <th>Product Quantity</th>
                                <th>Product Discount</th>
                                <th>Product Category</th>
                                <th>Product Image</th>
                                <th>Edit Details</th>
                                <th>Delete Product</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($product as $item)
                            <tr>
                                <td>{{ $item->product_name }}</td>
                                <td>{{ $item->product_price }}</td>
                                <td>{{ $item->product_description }}</td>
                                <td>{{ $item->product_quantity }}</td>
                                <td>{{ $item->product_discount }}</td>
                                <td>{{ $item->product_category }}</td>
                                <td><img src="/products/{{ $item->product_image }}" alt="Product Image" class="int-product-image"></td>
                                <td><a href="{{ url('edit_product', $item->id) }}" class="int-edit-button">Edit</a></td>
                                <td><a href="{{ url('del_product', $item->id) }}" class="int-delete-button" onclick="confirmation(event)">Delete</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="int-pagination-wrapper">
                    {{ $product->links() }}
                </div>
            </div>
        </div>
    </div>
    @include('livewire.admin.footer')
</body>
</html>
