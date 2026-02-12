<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Stats</title>
    <style>
        body { font-family: sans-serif; max-width: 700px; margin: 40px auto; padding: 0 20px; }
        h1 { margin-bottom: 10px; }
        .badge { display: inline-block; background: #d1fae5; color: #065f46; padding: 4px 10px; border-radius: 4px; font-size: 0.85rem; margin-bottom: 20px; }
        .stats { display: grid; grid-template-columns: repeat(3, 1fr); gap: 16px; margin-top: 20px; }
        .stat-card { background: #f9fafb; border: 1px solid #e5e7eb; border-radius: 8px; padding: 20px; text-align: center; }
        .stat-card .number { font-size: 2rem; font-weight: bold; color: #4f46e5; }
        .stat-card .label { color: #6b7280; font-size: 0.9rem; margin-top: 4px; }
        .info { background: #eff6ff; border-left: 4px solid #3b82f6; padding: 12px 16px; border-radius: 4px; color: #1e40af; margin-top: 20px; }
    </style>
</head>
<body>

    <h1>🔒 Admin Stats</h1>
    <span class="badge">✅ Middleware passed — admin access granted</span>

    <div class="stats">
        <div class="stat-card">
            <div class="number">42</div>
            <div class="label">Users</div>
        </div>
        <div class="stat-card">
            <div class="number">128</div>
            <div class="label">Orders</div>
        </div>
        <div class="stat-card">
            <div class="number">€3,240</div>
            <div class="label">Revenue</div>
        </div>
    </div>

    <div class="info">
        <strong>How it works:</strong> This route is inside a <code>middleware(...)->group()</code> — all routes in the <code>/admin</code> prefix share the same token check middleware.
    </div>

</body>
</html>
