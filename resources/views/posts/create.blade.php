<div>
    <h1>Create Post</h1>

    <a href="{{ route('admin.posts.index') }}">Back to list</a>

    <form action="{{ route('admin.posts.store') }}" method="POST">
        @csrf

        <table>
            <tbody>
                <tr>
                    <td><label for="title">Title</label></td>
                    <td><input type="text" name="title" id="title"></td>
                </tr>
                <tr>
                    <td><label for="content">Content</label></td>
                    <td><textarea name="content" id="content" cols="30" rows="10"></textarea></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <button type="submit">Create</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
</div>
