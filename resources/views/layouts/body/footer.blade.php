<!-- Footer
		============================================= -->
		<footer id="footer" style="background-color:#752651;" class="text-white">
			<!-- Copyrights
			============================================= -->
			<div id="copyrights">
				<div class="container border-0">
					@php
					$settings = DB::table('settings')->first();
				  @endphp
					<div class="row">
						<div class="col-lg-6 copy-right">
							{{ trans('site/layout.copyright') }} &copy; 2020 <a href="{{url('/')}}">{{$settings->site_name}}</a> <br>
						</div>

						<div class="col-lg-6 border-0 socials">

							<a href="{{$settings->facebook}}" class="social-icon si-small si-dark si-facebook">
								<i class="fa-brands fa-facebook-f"></i>
								<i class="fa-brands fa-facebook-f"></i>
							</a>
	
							<a href="{{$settings->twitter}}" class="social-icon si-small si-dark si-twitter">
								<i class="fa-brands fa-twitter"></i>
								<i class="fa-brands fa-twitter"></i>
							</a>
	
							<a href="{{$settings->youtube}}" class="social-icon si-small si-dark si-youtube">
								<i class="fa-brands fa-youtube"></i>
								<i class="fa-brands fa-youtube"></i>
							</a>
	
							<a href="{{$settings->linkedin}}" class="social-icon si-small si-dark si-linkedin">
								<i class="fa-brands fa-linkedin"></i>
								<i class="fa-brands fa-linkedin"></i>
							</a>
	
							<a href="{{$settings->github}}" class="social-icon si-small si-dark si-github">
								<i class="fa-brands fa-github"></i>
								<i class="fa-brands fa-github"></i>
							</a>
	
						</div>
						
					</div>

				</div>
			</div><!-- #copyrights end -->
		</footer><!-- #footer end -->