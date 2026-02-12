<div>
    <h1>All Posts</h1>

    <a href="{{ route('admin.posts.create') }}">Create a new post</a>

    {{-- Success message after create/update --}}
    @if (session('success'))
    <p style="color: green;">
        Post saved successfully: {{ session('success') }}
    </p>
    @endif
    {{-- Delete message after deleting --}}
    @if(session('deleted'))
    <p style="color : red;">
        Post deleted successfully
    </p>
    @endif

    {{-- Posts table --}}
    @if (count($posts) > 0)
        <table border="1" cellpadding="8">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post['id'] }}</td>
                        <td>{{ $post['title'] }}</td>
                        <td>{{ $post['content'] }}</td>
                        <td>
                            <a href="{{ route('admin.posts.edit', $post['id']) }}">Edit</a>
                            <form action="{{ route('admin.posts.delete', $post['id']) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button>Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No posts yet.</p>
    @endif
</div>
