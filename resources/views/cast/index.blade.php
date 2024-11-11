<!DOCTYPE html>
<html lang="en">
<head>
    @include('templates.component.head')
    <style>
        /* Tambahkan styling untuk scroll horizontal */
        .table-responsive {
            overflow-x: auto;
        }
    </style>
</head>
<body>
    @include('templates.component.header')
    @include('templates.component.login')
    @include('templates.component.navbar')

    <div class="general_social_icons">
        <nav class="social">
            <ul>
                <li class="w3_twitter"><a href="#">Twitter <i class="fa fa-twitter"></i></a></li>
                <li class="w3_facebook"><a href="#">Facebook <i class="fa fa-facebook"></i></a></li>
                <li class="w3_dribbble"><a href="#">Dribbble <i class="fa fa-dribbble"></i></a></li>
                <li class="w3_g_plus"><a href="#">Google+ <i class="fa fa-google-plus"></i></a></li>
            </ul>
        </nav>
    </div>

    <div class="container mt-5">
        <h1 class="text-center mb-4">Cast List</h1>
        <a href="{{ route('cast.create') }}" class="btn btn-success mb-3">Tambah Cast</a>

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID CASTS</th>
                        <th>NAME</th> 
                        <th>BIO</th>
                        <th>AGE</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($casts as $cast)
                        <tr>
                            <td>{{ $cast->id }}</td>
                            <td>{{ $cast->name }}</td>
                            <td>{{ $cast->bio }}</td>
                            <td>{{ $cast->age }}</td>
                            <td>
                                <a href="{{ route('cast.show', $cast->id) }}" class="btn btn-info btn-sm">View</a>
                                <a href="{{ route('cast.edit', $cast->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('cast.destroy', $cast->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">DELETE</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                    <!-- Row tambahan jika data cast habis -->
                    @if($casts->isEmpty())
                        <tr>
                            <td colspan="5" class="text-center">No more cast to display</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>

        <!-- Tambahkan pagination -->
        {{ $casts->links() }}
    </div>

    @include('templates.component.footer')
</body>
</html>
