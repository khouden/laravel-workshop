<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $article->title }}</title>
    <style>
        body { font-family: sans-serif; max-width: 700px; margin: 40px auto; padding: 0 20px; }
        h1 { margin-bottom: 8px; }
        .meta { color: #888; font-size: 0.9rem; margin-bottom: 20px; }
        .content { line-height: 1.7; color: #333; }
        a.back { display: inline-block; margin-top: 24px; color: #4f46e5; text-decoration: none; font-weight: bold; }
        a.back:hover { text-decoration: underline; }
    </style>
</head>
<body>

    <h1>{{ $article->title }}</h1>
    <div class="meta">Published {{ $article->created_at->diffForHumans() }}</div>
    <div class="content">{{ $article->content }}</div>

    <a class="back" href="{{ route('articles.index') }}">← Back to articles</a>

</body>
</html>
