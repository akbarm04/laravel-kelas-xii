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
    <div class="card">
        <div class="card-header">
            <h2>{{ $cast->id}}</h2>
        </div>
        <div class="card-body">
            <p><strong>Nama:</strong> {{ $cast->name }}</p>
            <p><strong>Bio:</strong> {{ $cast->bio }}</p>
            <p><strong>Age:</strong> {{ $cast->age }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('cast.index') }}" class="btn btn-sm btn-info">Kembali</a>
        </div>
    </div>

<!-- footer -->
@include('templates.component.footer')
<!-- //footer -->
</body>
</html>