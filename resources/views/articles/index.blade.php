<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Articles</title>
    <style>
        body { font-family: sans-serif; max-width: 700px; margin: 40px auto; padding: 0 20px; }
        h1 { margin-bottom: 20px; }
        .article-card { border: 1px solid #ddd; border-radius: 6px; padding: 16px; margin-bottom: 12px; }
        .article-card h2 { margin: 0 0 8px; font-size: 1.2rem; }
        .article-card p { color: #555; margin: 0 0 10px; }
        .article-card a { color: #4f46e5; text-decoration: none; font-weight: bold; }
        .article-card a:hover { text-decoration: underline; }
        .empty { color: #888; margin-top: 20px; }
    </style>
</head>
<body>

    <h1>📝 Articles</h1>

    @if($articles->count() > 0)
        @foreach($articles as $article)
            <div class="article-card">
                <h2>{{ $article->title }}</h2>
                <p>{{ Str::limit($article->content, 150) }}</p>
                <a href="{{ route('articles.show', $article) }}">Read more →</a>
            </div>
        @endforeach
    @else
        <p class="empty">No articles yet.</p>
    @endif

</body>
</html>
