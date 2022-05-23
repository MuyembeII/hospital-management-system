{{-- users registration view: the component to capture users details  --}}

@extends('users')

@section('content')
{{-- patient registration view: the component to capture patient details  --}}

@extends('template')

@section('content')
<section class="hero is-info is-small">
	<div class="hero-body">
		<div class="container has-text-centered">
			<p class="title">Hospice User Registration</p>
			<p class="subtitle">Create a new hospice user service provider.</p>
		</div>
	</div>
</section>
<div class="section-light has-background-link-light">
	<div class="container has-background-white-bis">
		<div class="columns is-multiline" data-aos="fade-in-up" data-aos-easing="linear">
			<div class="column is-8 is-offset-2">

                <!-- Form validation message box -->
				@if ($errors->any())
				<div class="box">
				    <p class="has-text-danger">User registration failed!</p>
				    <article class="message is-danger">
                        <span class="icon has-text-warning">
                            <i class="fab fa-triangle-exclamation"></i>
                        </span>
                        <div class="message-body">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </article>
				</div>
				@endif

				<form action="{{ route('register') }}" method="POST">
					@csrf
					<div class="columns">
						<!-- Column 1 -->
						<div class="column is-6">
							<!-- Input: Name -->
							<div class="field">
								<div class="control">
									<label class="label" for="name">Name</label>
									<input class="input" type="text" name="name" id="name" required autofocus>
								</div>
							</div>
							<!-- Input:  Password -->
							<div class="field">
								<div class="control">
									<label class="label" for="password">Password</label>
									<input class="input" type="password" name="password" id="password" required>
								</div>
							</div>
							<!-- Input:  Confirm Password -->
                            <div class="field">
                                <div class="control">
                            	    <label class="label" for="password_confirmation">Confirm Password</label>
                            		<input class="input" type="password" name="password_confirmation" id="password_confirmation" required>
                                </div>
                            </div>

						</div>

						<!-- Column 2 -->
						<div class="column is-6">
							<!-- Email Input:  Email Address -->
							<div class="field">
								<div class="control">
									<label class="label" for="email">Email Address</label>
									<input class="input" type="email" name="email" id="email" placeholder="patient@info.com">
								</div>
							</div>
							<!-- Input:  Contact Details -->
							<div class="field">
								<div class="control">
									<label class="label" for="contactnumber">Contact Number</label>
									<input class="input" type="text" name="contactnumber" id="contactnumber">
								</div>
							</div>

							<!-- Choice Select One:  User Type -->
                            							<div class="field">
                            								<div class="control">
                            									<label class="label" for="user_type">User Type</label>
                            									<div class="select is-fullwidth">
                            										<select name="user_type" id="user_type" class="regular-text">
                            											<option value="Receptionist">Receptionist</option>
                            											<option value="Doctor">Doctor</option>
                            											<option value="Pharmacist">Pharmacist</option>
                            											<option value="Pharmacist">Nurse</option>
                            											<option value="Pharmacist">Dentist</option>
                            											<option value="Pharmacist">Optician</option>
                            											<option value="Pharmacist">Clinical Officer</option>
                            										</select>
                            									</div>
                            								</div>
                            							</div>

							@if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                                <div class="mt-4">
                                    <x-jet-label for="terms">
                                        <div class="flex items-center">
                                            <x-jet-checkbox name="terms" id="terms"/>

                                            <div class="ml-2">
                                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                                ]) !!}
                                            </div>
                                        </div>
                                    </x-jet-label>
                                </div>
                            @endif

                            <div class="flex items-center justify-end mt-4">
                                            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                                                {{ __('Already registered?') }}
                                            </a>
                                        </div>
						</div>
					</div>
					<hr class="content-divider">
					<!-- Events:  Patient registration form action handlers -->
					<div class="card has-background-white-ter">
						<div class="columns">
							<div class="column is-4 mx-2">
								<div class="field has-addons">
									<p class="control">
										<button class="button is-primary submit-button" type="submit">
											Register&nbsp;&nbsp; <i class="fas fa-paper-plane"></i>
										</button>
									</p>
									<p class="control">
										<a class="button is-warning" href="{{ url('patients') }}" aria-current="page">
											Cancel&nbsp;&nbsp; <i class="fas fa-circle-xmark"></i>
										</a>
									</p>
									</div>
								</div>
							</div>
						</div>
				</form>
			</div>
		</div>
	</div>
</div>
