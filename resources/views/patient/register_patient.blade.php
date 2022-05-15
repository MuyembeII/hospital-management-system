{{-- patient registration view: the component to capture patient details  --}}

@extends('template')

@section('content')
<section class="hero is-info is-small">
	<div class="hero-body">
		<div class="container has-text-centered">
			<p class="title">Patient Registration</p>
			<p class="subtitle">Create a new patient for clinical services</p>
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
				    <p class="has-text-danger">Patient registration failed!</p>
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

				<form action="{{ route('patients.store') }}" method="POST">
					@csrf
					<div class="columns">
						<!-- Column 1 -->
						<div class="column is-4">
							<!-- Input:  First Name -->
							<div class="field">
								<div class="control">
									<label class="label" for="first_name">First Name</label>
									<input class="input" type="text" name="first_name" id="first_name">
								</div>
							</div>
							<!-- Input:  Last Name -->
							<div class="field">
								<div class="control">
									<label class="label" for="last_name">Last Name</label>
									<input class="input" type="text" name="last_name" id="last_name">
								</div>
							</div>
							<!-- Choice Select One:  Gender?.Sex -->
							<div class="field">
								<div class="control">
									<label class="label" for="sex">Gender</label>
									<div class="select is-fullwidth">
										<select name="sex" id="sex" class="regular-text">
											<option value="U">Other</option>
											<option value="F">Female</option>
											<option value="M">Male</option>
										</select>
									</div>
								</div>
							</div>
						</div>

						<!-- Column 2 -->
						<div class="column is-4">
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
							<!-- Input:  Date of Birth -->
							<div class="field">
								<div class="control">
									<label class="label" for="dob">Date of Birth</label>
									<input class="input bulmaCalendar" type="date" name="dob" id="dob" data-display-mode="dialog">
								</div>
							</div>
						</div>

						<!-- Column 3 -->
						<div class="column is-4">
							<!-- Text:  Address Details -->
							<div class="field">
								<div class="control mb-1">
									<label class="label" for="address">Address Details</label>
									<textarea name="address" id="address" class="textarea"></textarea>
								</div>
							</div>
							<!-- Event:  Fast Registration -->
							<div class="field pt-5">
							    <div class="control mt-1">
							        <button class="button is-primary submit-button is-fullwidth" type="submit">
									    Quick Save &nbsp;&nbsp; <i class="fas fa-paper-plane"></i>
								    </button>
							    </div>
							</div>
						</div>
					</div>
					<hr />

					<!-- Capture additional client details -->
					<h3 class="title is-6">Additional Client Details</h1>
						<div class="columns">
						    <!-- Column 1 -->
							<div class="column is-4">
								<!-- Input:  Birth Place -->
								<div class="field">
									<div class="control">
										<label class="label" for="birth_place">Birth Place</label>
										<input class="input" type="text" name="birth_place" id="birth_place">
									</div>
								</div>
								<!-- Choice Select One:  Religion -->
								<div class="field">
									<div class="control">
										<label class="label" for="religion">Religion</label>
										<div class="select is-fullwidth">
											<select name="religion" id="religion" class="regular-text">
												<option value="Christian">...</option>
												<option value="Christian">Christian</option>
												<option value="Islam">Islam</option>
												<option value="Buddist">Buddist</option>
											</select>
										</div>
									</div>
								</div>
							</div>

							<!-- Column 2 -->
							<div class="column is-4">
								<!-- Input:  Nationality -->
								<div class="field">
									<label class="label" for="nationality">Nationality</label>
									<div class="control">
										<div class="select is-fullwidth">
											<select name="nationality" id="nationality" class="regular-text">
												<option value="Zambian">Zambia</option>
												<option value="Malawian">Malawi</option>
												<option value="Rwandanese">Rwanda</option>
												<option value="Angolan">Angola</option>
												<option value="Spannish">Spain</option>
											</select>
										</div>
									</div>
								</div>
								<!-- Input: National Registration Card -->
								<div class="field">
									<div class="control">
										<label class="label" for="contactnumber">National Registration Card ID</label>
										<input class="input" type="text" name="nrc" id="nrc">
									</div>
								</div>
								<!-- Input:  Occupation -->
								<div class="field">
									<div class="control">
										<label class="label" for="nrc">Occupation</label>
										<input class="input" type="text" name="occupation" id="occupation">
									</div>
								</div>
							</div>

							<!-- Column 3 -->
							<div class="column is-4">
							    <!-- Input:  Guardian -->
								<div class="field">
									<div class="control">
										<label class="label" for="nrc">Guardian</label>
										<input class="input" type="text" name="guardian" id="guardian">
									</div>
								</div>
							    <!-- Input:  Guardian Contact -->
								<div class="field">
									<div class="control">
										<label class="label" for="birth_place">Guardian Contact</label>
										<input class="input" type="text" name="guardian_contact" id="guardian_contact">
									</div>
								</div>
								<!-- Input:  Guardian Address -->
								<div class="field">
									<div class="control">
										<label class="label" for="guardian_address">Guardian Address</label>
										<textarea name="guardian_address" id="guardian_address" class="textarea"></textarea>
									</div>
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
												Save Patient&nbsp;&nbsp; <i class="fas fa-paper-plane"></i>
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
