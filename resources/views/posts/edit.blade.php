<div>
    <h1>Edit Post</h1>

    <a href="{{ route('admin.posts.index') }}">Back to list</a>

    <form action="{{ route('admin.posts.update', $post->id) }}" method="POST">
        @csrf
        @method('PUT')

        <table>
            <tbody>
                <tr>
                    <td><label for="title">Title</label></td>
                    <td><input type="text" name="title" id="title" value="{{ $post->title }}"></td>
                </tr>
                <tr>
                    <td><label for="content">Content</label></td>
                    <td><textarea name="content" id="content" cols="30" rows="10">{{ $post->content }}</textarea></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <button type="submit">Update</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
</div>
