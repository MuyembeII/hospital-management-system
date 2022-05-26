{{-- inpatient patient view: the component to capture inpatient details  --}}

@extends('template')

@section('content')
<section class="hero is-info is-small">
	<div class="hero-body">
		<div class="container has-text-centered">
			<p class="title">IPD</p>
			<p class="subtitle">Create a new inpatient clinical service</p>
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
					<p class="has-text-danger">Inpatient record creation failed!</p>
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
					<!-- Columns - Vitals, Physical Exam and Pharmacy -->
					<div class="columns">
						<!-- Column 1 -->
						<div class="column is-4">
							<!-- Input:  Temperature -->
							<div class="field">
								<div class="control">
									<label class="label" for="temperature">Temperature <small>(celsius)</small></label>
									<input class="input" type="text" name="temperature" id="temperature">
								</div>
							</div>
							<!-- Input:  Weight -->
							<div class="field">
								<div class="control">
									<label class="label" for="weight">Weight <small>(kg)</small></label>
									<input class="input" type="text" name="weight" id="weight">
								</div>
							</div>
							<!-- Choice Select One:  Prescription -->
							<div class="field">
								<div class="control">
									<label class="label" for="sex">Prescription</label>
									<div class="select is-fullwidth">
										<select name="prescription_id" id="prescription_id" class="regular-text">
											<option value="1">Panado</option>
											<option value="2">Bruffen</option>
											<option value="3">Paracetamol</option>
											<option value="4">ORS</option>
											<option value="5">ARVs</option>
											<option value="6">Cough Syrup</option>
											<option value="7">Coartem</option>
											<option value="8">Penincilin</option>
											<option value="9">Amoxyle</option>
											<option value="10">Pen V</option>
										</select>
									</div>
								</div>
							</div>
						</div>

						<!-- Column 2 -->
						<div class="column is-4">
							<!-- Input:  Height -->
							<div class="field">
								<div class="control">
									<label class="label" for="height">Height <small>(meters)</small></label>
									<input class="input" type="input" name="height" id="height">
								</div>
							</div>
							<!-- Input:  Blood Pressure -->
							<div class="field">
								<div class="control">
									<label class="label" for="blood_pressure">BP <small>(mm Hg)</small></label>
									<input class="input" type="text" name="blood_pressure" id="blood_pressure" placeholder="E.g 120/65">
								</div>
							</div>
							<!-- Input:  Ward/Servicr Area -->
							<div class="field">
								<div class="control">
									<label class="label" for="ward">Ward</label>
									<input class="input" type="text" name="ward" id="ward">
								</div>
							</div>

						</div>

						<!-- Column 3 -->
						<div class="column is-4">
						    <!-- Input:  Duration -->
                            <div class="field">
                            	<div class="control">
                            		<label class="label" for="duration">Duration <small>(days)</small></label>
                            		<input class="input" type="number" name="duration" id="duration">
                            	</div>
                            </div>
							<!-- Input:  Date of Discharge -->
                            <div class="field">
                            	<div class="control">
                            		<label class="label" for="blood_pressure"> Discharged? </label>
                            		<input type="checkbox" name="discharged" id="discharged">
                            	</div>
                            	<div class="control">
                            		<label class="label" for="dob">Date of Discharge</label>
                            		<input class="input bulmaCalendar" type="date" name="discharged_date" id="discharged_date" data-display-mode="dialog">
                            	</div>
                            </div>

						</div>
					</div>

					<div class="columns">
                        <!-- Column 4 -->
                        <div class="column is-6">
                            <!-- Text:  Diagnosis Details -->
                            <div class="field">
                            	<div class="control mb-1">
                            		<label class="label" for="diagnosis">Diagnosis Details</label>
                            		<textarea name="diagnosis" id="diagnosis" class="textarea"></textarea>
                            	</div>
                            </div>
                        </div>
                        <!-- Column 5 -->
                        <div class="column is-6">
                            <!-- Text:  Reason for Visit -->
                            <div class="field">
                            	<div class="control mb-1">
                            		<label class="label" for="diagnosis">Notes</label>
                            		<textarea name="reason_for_visit" id="reason_for_visit" class="textarea"></textarea>
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
											Save&nbsp;&nbsp; <i class="fas fa-paper-plane"></i>
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
