<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <style>
        body { font-family: sans-serif; max-width: 700px; margin: 40px auto; padding: 0 20px; }
        h1 { margin-bottom: 20px; }
        form.add-form { display: flex; gap: 10px; margin-bottom: 30px; }
        form.add-form input { padding: 8px; border: 1px solid #ccc; border-radius: 4px; }
        form.add-form button { padding: 8px 16px; background: #4f46e5; color: #fff; border: none; border-radius: 4px; cursor: pointer; }
        table { width: 100%; border-collapse: collapse; }
        th, td { text-align: left; padding: 10px; border-bottom: 1px solid #ddd; }
        th { background: #f3f4f6; }
        .btn-delete { background: #ef4444; color: #fff; border: none; padding: 6px 12px; border-radius: 4px; cursor: pointer; }
        .empty { color: #888; margin-top: 20px; }
        .alert-success { background: #d1fae5; color: #065f46; padding: 10px 16px; border-radius: 4px; margin-bottom: 20px; }
    </style>
</head>
<body>

    <h1>🛒 Products</h1>

    @if(session('success'))
        <div class="alert-success">✅ {{ session('success') }}</div>
    @endif

    {{-- Add product form --}}
    <form class="add-form" action="{{ route('products.store') }}" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Product name" required>
        <input type="number" name="price" placeholder="Price" step="0.01" required>
        <button type="submit">Add</button>
    </form>

    {{-- Products list --}}
    @if(count($products) > 0)
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $index => $product)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $product['name'] }}</td>
                        <td>{{ number_format($product['price'], 2) }} DH</td>
                        <td>
                            <form action="{{ route('products.destroy', $product['id']) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn-delete" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p class="empty">No products yet. Add one above!</p>
    @endif

</body>
</html>
