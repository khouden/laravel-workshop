<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body { font-family: sans-serif; max-width: 700px; margin: 40px auto; padding: 0 20px; }
        h1 { margin-bottom: 10px; }
        .badge { display: inline-block; background: #d1fae5; color: #065f46; padding: 4px 10px; border-radius: 4px; font-size: 0.85rem; margin-bottom: 20px; }
        .info { background: #eff6ff; border-left: 4px solid #3b82f6; padding: 12px 16px; border-radius: 4px; color: #1e40af; }
    </style>
</head>
<body>

    <h1>📊 Dashboard</h1>
    <span class="badge">✅ Middleware passed — token is valid</span>

    <div class="info">
        <strong>How it works:</strong> This page is protected by an inline middleware that checks for <code>?token=secret123</code> in the URL.
        Without the correct token, you get a 403 error.
    </div>

</body>
</html>
