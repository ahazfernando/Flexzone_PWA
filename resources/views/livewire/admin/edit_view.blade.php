<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/public">
    @include('livewire.admin.css')
</head>

<body>
    <div class="container-scroller">
        @include('livewire.admin.navbar')

        <div class="container-fluid page-body-wrapper">
            @include('livewire.admin.header')

            <div class="viewkey-container-wrapper">
                <img src="/products/{{$product->product_image}}" alt="Picture of the current image" class="viewkey-image">

                <div class="viewkey-container">
                    <h2 class="viewkey-heading">Edit Product</h2>

                    <form action="{{url('/update_product',$product->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="viewkey-form-group">
                            <label class="viewkey-label" for="product_name">Product Name</label>
                            <input type="text" id="product_name" name="product_name" class="viewkey-input" value="{{$product->product_name}}">
                        </div>

                        <div class="viewkey-form-row">
                            <div class="viewkey-form-group">
                                <label class="viewkey-label" for="product_price">Product Price</label>
                                <input type="text" id="product_price" name="product_price" class="viewkey-input" value="{{$product->product_price}}">
                            </div>

                            <div class="viewkey-form-group">
                                <label class="viewkey-label" for="product_discount">Product Discount</label>
                                <input type="text" id="product_discount" name="product_discount" class="viewkey-input" value="{{$product->product_discount}}">
                            </div>
                        </div>

                        <div class="viewkey-form-row">
                            <div class="viewkey-form-group">
                                <label class="viewkey-label" for="product_quantity">Product Quantity</label>
                                <input type="number" id="product_quantity" name="product_quantity" class="viewkey-input" value="{{$product->product_quantity}}">
                            </div>
                        </div>

                        <div class="viewkey-form-row">
                            <div class="viewkey-form-group">
                                <label class="viewkey-label" for="product_category">Product Category</label>
                                <select name="product_category" class="viewkey-select">
                                    <option value="{{$product->product_category}}">{{$product->product_category}}</option>
                                    @foreach($category as $items)
                                        <option value="{{$items->category_name}}">{{$items->category_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="viewkey-form-group">
                            <label class="viewkey-label" for="product_description">Product Description</label>
                            <textarea id="product_description" name="product_description" class="viewkey-textarea">{{$product->product_description}}</textarea>
                        </div>

                        <div class="viewkey-form-group">
                            <label class="viewkey-label" for="product_image">Update Product Image</label>
                            <input type="file" id="product_image" name="product_image" class="viewkey-image-input">
                        </div>

                        <div class="viewkey-form-footer">
                            <button type="submit" class="viewkey-button">Update</button>
                        </div>
                    </form>
                </div>
            </div>

            @include('livewire.admin.footer')
        </div>
    </div>
</body>
</html>
