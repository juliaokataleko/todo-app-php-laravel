<!-- Footer -->
@if(!isset($no_footer))
<section id="footer" class="bg-secondary text-center">
	<div class="container">
		
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-2 text-center text-white">
				@auth()
				<a class="nav-link active" href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
					<i class="fas fa-sign-out-alt"></i> {{ __('Terminar Sessão') }}
				</a>

				<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
					@csrf
				</form>
				@endauth

				<p class="h6">&copy <?php echo date("Y"); ?> 
					Direitos Reservados.<a class="text-green ml-2" 
					href="{{ BASE_URL }}" target="_blank">{{ getenv('APP_NAME') }}</a>
				</p>
			</div>
			</hr>
		</div>
	</div>
</section>
@endif
<!-- ./Footer -->