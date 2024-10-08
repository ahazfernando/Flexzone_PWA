<!DOCTYPE html>
<html lang="en">
<head>
    @include('livewire.admin.css')
    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            display: flex;
            overflow: hidden;
        }
    </style>
</head>
<body>

    <div class="edit_css-sidebar">
        @include('livewire.admin.navbar')
    </div>

    <div class="edit_css-main-content">
        @include('livewire.admin.header')

        <form action="{{ url('/store_category') }}" method="POST">
            @csrf
            <div class="edit_css-category-center-container">
                <h1 class="edit_css-category-heading">Add Product Category</h1>
                <div class="edit_css-category-form-container">
                    <input type="text" name="category_name" placeholder="Enter product category">
                    <button type="submit">Add Category</button>
                </div>

                <div class="edit_css-category-table-container">
                    <table class="edit_css-category-table">
                        <thead>
                            <tr>
                                <th>Product Category</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($category as $product_type)
                            <tr>
                                <td>{{ $product_type->category_name }}</td>
                                <td><a href="{{ url('edit_category', $product_type->id) }}" class="edit_css-edit-btn">Edit</a></td>
                                <td><a onclick="confirmation(event)" href="{{url('category_delbtn', $product_type->id)}}" class="edit_css-delete-btn">Delete</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </form>
    </div>
    @include('livewire.admin.footer')
</body>
</html>
