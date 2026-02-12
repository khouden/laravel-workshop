<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <style>
        body { font-family: sans-serif; max-width: 500px; margin: 40px auto; padding: 0 20px; }
        h1 { margin-bottom: 20px; }
        form { display: flex; flex-direction: column; gap: 12px; }
        label { font-weight: bold; }
        input, textarea { padding: 8px; border: 1px solid #ccc; border-radius: 4px; font-family: inherit; }
        textarea { resize: vertical; min-height: 120px; }
        button { padding: 10px 16px; background: #4f46e5; color: #fff; border: none; border-radius: 4px; cursor: pointer; align-self: flex-start; }
        .alert-success { background: #d1fae5; color: #065f46; padding: 10px 16px; border-radius: 4px; margin-bottom: 20px; }
        .alert-error { background: #fee2e2; color: #991b1b; padding: 10px 16px; border-radius: 4px; margin-bottom: 20px; }
        .alert-error ul { margin: 4px 0 0 16px; padding: 0; }
    </style>
</head>
<body>

    <h1>📩 Contact</h1>

    @if(session('success'))
        <div class="alert-success">✅ {{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div class="alert-error">
            <strong>Please fix the following errors:</strong>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('contact.send') }}" method="POST">
        @csrf
        <label for="email">Email</label>
        <input type="email" name="email" id="email" placeholder="you@example.com" value="{{ old('email') }}" required>

        <label for="message">Message</label>
        <textarea name="message" id="message" placeholder="Your message (min 10 characters)">{{ old('message') }}</textarea>

        <button type="submit">Send</button>
    </form>

</body>
</html>
