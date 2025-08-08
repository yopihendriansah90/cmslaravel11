<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>View</title>
</head>

<body>
    <div class="container">
        <div class="mt-5">
            <h1 class="text-center">{{ $data->title }}</h1>
            <p>{{ $data->description }}</p>

            <div class="container">
                Tags: @if ($data->tags->count() == 0)
                    -
                @endif
                @foreach ($data->tags as $tag)
                    <span class="badge bg-primary me-2"> #{{ $tag->name }}</span>
                @endforeach
            </div>
            <div class="d-flex flex-column align-items-end">
                {{ $data->created_at }}
                <br>
                Create By Admin
            </div>
        </div>
        <div class="mt-5">
            <h5>Komentar</h5>
            @if (Session::has('message'))
                <p class="alert alert-success">{{ session('message') }}</p>
            @endif

            <form action="{{ url('comment/' . $data->id) }}" method="post">
                @csrf
                <input type="text" name="user_id">
                <textarea class="form-control" name="comment_text" id="comment_text" rows="5" style="resize: none"></textarea>
                <button class="btn btn-primary mt-3" type="submit">Kirim</button>
        </div>
        </form>
        <hr>
        <div class="mt-5">
            <ul>

                @foreach ($data->comments as $comment)
                    <li>
                        <p>user: {{ $comment->user->name }} | {{ $comment->created_at }}</p>
                        <p>Komkentar: {{ $comment->comment_text }}</p>



                    </li>
                @endforeach
            </ul>
        </div>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>
</body>

</html>
