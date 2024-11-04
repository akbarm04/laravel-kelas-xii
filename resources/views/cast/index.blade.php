<!DOCTYPE html>
<html lang="en">
<head>
    @include('templates.component.head')
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

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID CASTS</th>
                    <th>NAME</th> 
                    <th>BIO</th>
                    <th>AGE</th>
                    <th>Actions</th> <!-- Added this header for actions -->
                </tr>
            </thead>
            <tbody>
                @foreach($casts as $cast)
                    <tr>
                        <td>{{ $cast->id }}</td>
                        <td>{{ $cast->name }}</td>
                        <td>{{ $cast->bio }}</td>
                        <td>{{ $cast->age }}</td>
                     
                        </td>
                        <td>
                            <!-- Example actions; adjust as needed -->
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

                <!-- Example of an additional row below existing data -->
                <tr>
                    <td colspan="7" class="text-center">No more cast to display</td> <!-- Adjust colspan to match the number of columns -->
                </tr>
            </tbody>
        </table>
    </div>

    @include('templates.component.footer')
</body>
</html>
