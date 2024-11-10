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
	<h1 class="text-center mb-4">Edit Cast</h1>
	<form id="filmEditForm" action="{{ route('cast.update', $cast->id) }}" method="POST" enctype="multipart/form-data">
		@csrf
		@method('PUT')
		<div class="form-group">
			<label for="name">Masukan Nama Cast</label>
			<input type="text" class="form-control" name="name" id="name" value="{{ $cast->name }}">
		</div>
		<div class="form-group">
			<label for="bio">Bio</label>
			<textarea name="bio" id="bio" class="form-control" cols="30" rows="10">{{ $cast->bio }}</textarea>
		</div>
		<div class="form-group">
			<label for="age">Age</label>
			<input type="number" class="form-control" name="age" id="age" value="{{ $cast->age }}">
		</div>
		<button type="submit" class="btn btn-primary">Update Data</button>
	</form>
</div>
<!-- //comedy-w3l-agileits -->
<!-- footer -->
@include('templates.component.footer')
<!-- //footer -->
<!-- SweetAlert2 JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
<script src="{{ asset('template/js/bootstrap.min.js') }}"></script>
<script>
	$(document).ready(function(){
		$(".dropdown").hover(            
			function() {
				$('.dropdown-menu', this).stop(true, true).slideDown("fast");
				$(this).toggleClass('open');        
			},
			function() {
				$('.dropdown-menu', this).stop(true, true).slideUp("fast");
				$(this).toggleClass('open');       
			}
		);

		$('#filmEditForm').on('submit', function(e) {
			e.preventDefault(); // Mencegah pengiriman form secara default
			var isValid = true;
			var errors = [];

			if ($('#name').val().trim() === '') {
				isValid = false;
				errors.push("Name");
			}
			if ($('#bio').val().trim() === '') {
				isValid = false;
				errors.push("Bio");
			}
			if ($('#age').val().trim() === '') {
				isValid = false;
				errors.push("Age");
			}
	

			if (!isValid) {
				var errorText = "Tolong isi kolom:\n" + errors.join(", ");
				Swal.fire({
					title: 'Peringatan!',
					text: errorText,
					icon: 'error',
					confirmButtonText: 'Tutup'
				});
			} else {
				var formData = new FormData(this); // Menggunakan FormData untuk menangani form dengan file
				$.ajax({
    url: $(this).attr('action'),
    type: 'POST',
    data: formData,
    contentType: false,
    processData: false,
    success: function(response) {
        if (response.success) {
            Swal.fire({
                title: 'Berhasil!',
                text: response.success,
                icon: 'success',
                confirmButtonText: 'Tutup'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "{{ route('cast.index') }}"; 
                }
            });
        } else {
            Swal.fire({
                title: 'Error!',
                text: response.error,
                icon: 'error',
                confirmButtonText: 'Tutup'
            });
        }
    },
    error: function(xhr) {
        Swal.fire({
            title: 'Error!',
            text: 'Terjadi kesalahan saat memperbarui Cast.',
            icon: 'error',
            confirmButtonText: 'Tutup'
        });
    }
});

			}
		});
	});
</script>
<!-- here stars scrolling icon -->
<script type="text/javascript">
	$(document).ready(function() {
		$().UItoTop({ easingType: 'easeOutQuart' });
	});
</script>
	@stack('script')
<!-- //here ends scrolling icon -->
</body>
</html>
