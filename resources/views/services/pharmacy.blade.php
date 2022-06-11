{{-- patient drug pick ups view: the component for drug dispensations  --}}

@extends('template')

@section('content')
<section class="hero is-info is-small">
	<div class="hero-body">
		<div class="container has-text-centered">
			<p class="title">Pharmacy</p>
			<p class="subtitle">Patient drug dispensations and medicine management.</p>
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
					<p class="has-text-danger">Drug dispensation create failed!</p>
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

				<form action="{{ route('appointments.store') }}" method="POST">
					@csrf
					<div class="columns">
						<!-- Column 1 -->
						<div class="column is-8">
							<!-- Choice Select One:  Drug Name -->
							<div class="field">
								<div class="control">
									<label class="label" for="appointment_status">Drug Name</label>
									<div class="select is-fullwidth">
										<select name="appointment_status" id="appointment_status" class="regular-text">
											<option value="Pending">Panado</option>
											<option value="Attended">Paracetamol</option>
											<option value="Missed">ORS</option>
										</select>
									</div>
								</div>
							</div>
							<!-- Input:  Appointment Date -->
							<div class="field">
								<div class="control">
									<label class="label" for="dispensation_date">Date of Dispensation</label>
									<input class="input bulmaCalendar" type="date" name="dispensation_date" id="dispensation_date" data-display-mode="dialog">
								</div>
							</div>
							<!-- Input:  Drug Quantification -->
							<div class="field">
								<div class="control">
									<label class="label" for="sex">Quantity</label>
									<input class="input" type="number" name="duration" id="duration">
								</div>
							</div>
							<!-- Input:  Appointment Details -->
							<div class="field">
								<div class="control">
									<label class="label" for="dispensation_description">Dispensation Remarks</label>
									<textarea name="dispensation_description" id="dispensation_description" class="textarea"></textarea>
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
											Save Appointment&nbsp;&nbsp; <i class="fas fa-paper-plane"></i>
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
