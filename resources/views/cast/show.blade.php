<!DOCTYPE html>
<html lang="en">
@include('templates.component.head')

<body>
<!-- header -->
@include('templates.component.header')
<!-- //header -->
<!-- bootstrap-pop-up -->
@include('templates.component.login')
<!-- //bootstrap-pop-up -->
<!-- nav -->
@include('templates.component.navbar')
<!-- //nav -->
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

<!-- /w3l-medile-movies-grids -->
<div class="container mt-5">
    <h1 class="text-center mb-4">Detail Cast</h1>
    <div class="card mb-4">
        <div class="card-header">
            <h2>{{ $cast->name }}</h2>
        </div>
        <div class="card-body">
			<h4><strong>Bio:</strong> {{ $cast->bio }}</h4>
            <h4><strong>Age:</strong> {{ $cast->age }}</h4>
            <h4><strong>Nama:</strong> {{ $cast->name }}</h4>
        </div>
		<br>
        <div class="card-footer mb-10">
            <a href="{{ route('cast.index') }}" class="btn btn-sm btn-info mb-10">Kembali</a>
        </div>
    </div>
	<br>
    <!-- Daftar Film yang Diperankan -->
    <h3 class="mt-5">Film yang Diperankan</h3>
    <div class="row">
        @forelse($films as $film)
            <div class="col-md-4 mb-4 mt-4">
                <div class="card film-card h-100 shadow-sm">
                    <img src="/{{ $film->film->poster }}" class="card-img-top rounded-top film-poster" alt="{{ $film->film->title }}">
                    <div class="card-body mb-10">
                        <h5 class="card-title text-center" >{{ $film->film->title }}</h5>
                    </div>
					<br>
                </div>
            </div>
        @empty
            <p>Belum ada film yang diperankan oleh cast ini.</p>
        @endforelse
    </div>
</div>
<!-- footer -->
@include('templates.component.footer')
<!-- //footer -->

<!-- Additional styling -->
<style>
    .film-card {
        border-radius: 10px;
        overflow: hidden;
        transition: transform 0.3s;
    }
    .film-card:hover {
        transform: scale(1.03);
    }
    .film-poster {
        height: 350px;
        object-fit: cover;
    }
    .card-title {
        font-size: 1.1rem;
        color: #333;
    }
</style>
</body>
</html>
