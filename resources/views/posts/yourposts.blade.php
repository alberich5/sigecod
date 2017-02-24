<table class="table table-striped">
    <thead>
    @foreach($posts as $post)
        <tr>
            <th>{{$post->nombre_usuario}}
                <br>
                {{$post->contenido}}
            </th>
            <th>
                    <form action="/posts/editposts" class="form-horizontal" method="post">
                        <input type="hidden" class="form-control" name="id" value="{{ $post->id }}">
                        <input type="submit" class="btn btn-primary" value="Edit">
                    </form></th>
            <th>

                <form action="posts" class="form-horizontal" method="get">
                    <input type="hidden" class="form-control" name="id" value="{{ $post->id }}">
                    <input type="submit" class="btn btn-danger" value="Delete">
                </form>
            </th>
        </tr>
    @endforeach
    </thead>
</table>
{{$posts->links()}}