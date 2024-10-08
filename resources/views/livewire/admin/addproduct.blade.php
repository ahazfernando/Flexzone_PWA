<!DOCTYPE html>
<html lang="en">
<head>
    @include('livewire.admin.css')

</head>
<body>
    <div class="container-scroller">
        @include('livewire.admin.navbar')
        <div class="container-fluid page-body-wrapper">
            @include('livewire.admin.header')
            <div class="add_category-container-wrapper">
                <img src="{{ asset('images/optimumnutrition_imgv3.jpg') }}" alt="Product Image" class="add_category-image">
                <div class="add_category-container">
                    <h2 class="add_category-heading">Add Product</h2>
                    <form action="{{url('/addproduct')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="add_category-form-group">
                            <label class="add_category-label" for="product_name">Product Name</label>
                            <input type="text" id="product_name" name="product_name" class="add_category-input" placeholder="Enter product name">
                        </div>

                        <div class="add_category-form-row">
                            <div class="add_category-form-group">
                                <label class="add_category-label" for="product_price">Product Price</label>
                                <input type="text" id="product_price" name="product_price" class="add_category-input" placeholder="Enter product price">
                            </div>

                            <div class="add_category-form-group">
                                <label class="add_category-label" for="product_discount">Product Discount</label>
                                <input type="text" id="product_discount" name="product_discount" class="add_category-input" placeholder="Enter product discount">
                            </div>
                        </div>

                        <div class="add_category-form-row">
                            <div class="add_category-form-group">
                                <label class="add_category-label" for="product_quantity">Product Quantity</label>
                                <input type="number" id="product_quantity" name="product_quantity" class="add_category-input" placeholder="Enter product quantity">
                            </div>

                            <div class="add_category-form-group">
                                <label class="add_category-label" for="product_category">Product Category</label>
                                <select id="product_category" name="product_category" class="add_category-select">
                                    <option value="">Select a category</option>
                                    @foreach($product_category as $items)
                                    <option value="{{$items->category_name}}">{{$items->category_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="add_category-form-group">
                            <label class="add_category-label" for="product_description">Product Description</label>
                            <textarea id="product_description" name="product_description" class="add_category-textarea" placeholder="Enter product description"></textarea>
                        </div>

                        <div class="add_category-form-group">
                            <label class="add_category-label" for="product_image">Product Image</label>
                            <input type="file" id="product_image" name="product_image" class="add_category-image-input">
                        </div>

                        <div class="add_category-form-footer">
                            <button type="submit" class="add_category-button">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
            @include('livewire.admin.footer')
        </div>
    </div>
</body>
</html>
