<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog</title>
    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>


    <div class="container">
        <div class="mt-5">
            <h1 class="text-center">Users</h1>

            <div class="table-responsive mt-5">
                <a href="{{ url('/blog/add') }}" class="btn btn-primary mb-3"> Add New</a>
                @if (Session::has('message'))
                    <p class="alert alert-success">{{ session('message') }}</p>
                @endif


                {{-- <form method="GET">
                    <div class="input-group mb-3">
                        <input type="text" name="name" class="form-control" placeholder="cari title"
                            aria-label="title" aria-describedby="button-addon2" value="{{ $name }}">
                        <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Cari</button>
                    </div>
                </form> --}}
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No </th>
                            <th>Name </th>
                            <th>Email </th>
                            <th>Phone </th>
                            <th>Action </th>
                        </tr>
                    </thead>
                    <tbody class="">
                        @if ($data->count() == 0)
                            <tr>
                                <td class="collapse-table text-center" colspan="4">data
                                    <strong>{{ $name }}</strong> tidak
                                    ditemukan
                                </td>
                            </tr>
                        @else
                            @foreach ($data as $item)
                                <tr>
                                    {{-- <td>{{ ($data->currentpage() - 1) * $data->perpage() + $loop->index + 1 }}</td> --}}
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->phone->phone_number ?? '-' }}</td>
                                    <td>
                                        <a href="/users/view/{{ $item->id }}" class="btn btn-info">View</a>
                                        <a href="/users/edit/{{ $item->id }}" class="btn btn-success">Edit</a>

                                        <form action="/users/delete/{{ $item->id }}" class="btn btn-danger"
                                            method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                        @endif
                    </tbody>
                </table>
                {{-- {{ $data->links() }} --}}
            </div>


        </div>


    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

</body>

</html>
