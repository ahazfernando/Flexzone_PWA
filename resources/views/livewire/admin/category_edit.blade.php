<!DOCTYPE html>
<html lang="en">
<head>
    @include('livewire.admin.css')
    <style>
        body {
            background-color: black;
            color: white;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .ed-category-center-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            text-align: center;
        }

        .ed-category-heading {
            color: white;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .ed-category-form-input input[type="text"] {
            border-radius: 10px;
            padding: 10px;
            width: 300px;
            border: 1px solid #ccc;
            margin-bottom: 20px;
            color: black;
        }

        .ed-category-form-submit input[type="submit"] {
            background-color: #FF5733;
            color: white;
            font-weight: bold;
            border-radius: 10px;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            width: 320px;
            text-align: center;
        }

        .ed-category-form-submit input[type="submit"]:hover {
            background-color: #e14e28;
        }
    </style>
</head>
<body>
    <div class="ed-category-center-container">
        <h1 class="ed-category-heading">Edit Product Category</h1>
        <form action="{{ url('update_category', $category->id) }}" method="POST">
            @csrf
            <div class="ed-category-form-input">
                <input type="text" name="category_name" value="{{ $category->category_name }}">
            </div>
            <div class="ed-category-form-submit">
                <input type="submit" value="Update Category">
            </div>
        </form>
    </div>
    @include('livewire.admin.footer')
</body>
</html>
