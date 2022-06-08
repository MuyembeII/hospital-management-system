{{-- patient registration view: the component to capture patient details  --}}

@extends('template')

@section('content')
<section class="hero is-info is-small">
	<div class="hero-body">
		<div class="container has-text-centered">
			<p class="title">{{ __('Edit Appointment') }} - {{ $patient->first_name }}&nbsp;{{ $patient->last_name }}</p>
			<p class="subtitle">Create a new appointment for clinical services</p>
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
					<p class="has-text-danger">Appointment create failed!</p>
					<article class="message is-danger">
						<span class="icon has-text-warning">
							<i class="fas fa-triangle-exclamation"></i>
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

				<form action="{{ route('appointment.update', $appointment->id) }}" method="POST">
					@method('PATCH')
					@csrf
					<div class="columns">
						<!-- Column 1 -->
						<div class="column is-8">
							<!-- Choice Select One:  Appointment Status -->
							<div class="field">
								<div class="control">
									<label class="label" for="appointment_status">Appointment Status</label>
									<div class="select is-fullwidth">
										<select name="appointment_status" id="appointment_status" class="regular-text">
											<option value="Pending" {{ $appointment->appointment_status == 'Pending' ? 'selected' : '' }} >Pending</option>
											<option value="Attended" {{ $appointment->appointment_status == 'Attended' ? 'selected' : '' }} >Attended</option>
											<option value="Missed" {{ $appointment->appointment_status == 'Missed' ? 'selected' : '' }} >Missed</option>
										</select>
									</div>
								</div>
							</div>
							<!-- Input:  Appointment Date -->
							<div class="field">
								<div class="control">
									<label class="label" for="appointment_date">Date of Appointment</label>
									<input class="input bulmaCalendar" type="date" name="appointment_date" id="appointment_date" value={{ $appointment->appointment_date }} data-display-mode="dialog">
								</div>
							</div>
							<!-- Choice Select One:  Service Type -->
							<div class="field">
								<div class="control">
									<label class="label" for="sex">Service Type</label>
									<div class="select is-fullwidth">
										<select name="service_type" id="service_type" class="regular-text">
											<option value="OPD" {{ $appointment->service_type == 'OPD' ? 'selected' : '' }} >OPD</option>
											<option value="IPD" {{ $appointment->service_type == 'IPD' ? 'selected' : '' }} >IPD</option>
											<option value="TB" {{ $appointment->service_type == 'TB' ? 'selected' : '' }} >TB</option>
											<option value="ART" {{ $appointment->service_type == 'OPD' ? 'selected' : '' }} >ART</option>
											<option value="Pharmacy" {{ $appointment->service_type == 'Pharmacy' ? 'selected' : '' }} >Pharmacy</option>
											<option value="Cancer" {{ $appointment->service_type == 'Cancer' ? 'selected' : '' }} >Cancer</option>
											<option value="Counselling" {{ $appointment->service_type == 'Counselling' ? 'selected' : '' }} >Counselling</option>
										</select>
									</div>
								</div>
							</div>
							<!-- Input:  Appointment Details -->
							<div class="field">
								<div class="control">
									<label class="label" for="appointment_details">Notes</label>
									<textarea class="textarea" name="appointment_details" id="appointment_details" > {{ $appointment->appointment_details }} </textarea>
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
										<a class="button is-warning" href="{{ route('patients.show', $patient -> id) }}" aria-current="page">
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
