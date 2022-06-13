{{-- outpatient service view: the component to view patient details  --}}

@extends('template')

@section('content')
<section class="hero is-info is-small">
	<div class="hero-body">
		<div class="container has-text-centered">
			<p class="title">Out Patient Department - {{ $patient->first_name }}&nbsp;{{ $patient->last_name }}</p>
			<p class="subtitle">OPD Visit Details</p>
		</div>
	</div>
</section>
<div class="section-light has-background-link-light">
	<div class="container has-background-white-bis">
		<div class="columns is-multiline" data-aos="fade-in-up" data-aos-easing="linear">
			<div class="column is-full">
				<div class="ml-4 my-2">
					<p class="control">
						<a class="button is-primary is-outlined" href="{{ route('main') }}">
							Back To Main&nbsp;&nbsp; <i class="fas fa-rotate-left"></i>
						</a>
						<a class="button is-primary is-outlined" href="{{ url('outpatient') }}">
							Back To OPD&nbsp;&nbsp; <i class="fas fa-rotate-left"></i>
						</a>
					</p>
				</div>
			</div>
			<div class="column is-10 is-offset-1">
				<!-- OPD Details -->
				<div class="card">
					<div class="card-content">
						<div class="columns">
							<div class="column is-half">
								<div class="card">
									<header class="card-header">
										<p class="card-header-title">
											Visit Details
										</p>
										<button class="card-header-icon" aria-label="more options">
											<span class="icon">
												<i class="fas fa-angle-down" aria-hidden="true"></i>
											</span>
										</button>
									</header>
									<div class="card-content">
										<div class="content">
											<table class="table-profile profile-table is-half is-striped">
												<tr>
													<th colspan="1"></th>
													<th class="title is-5" colspan="2"></th>
												</tr>

												<tr>
													<td>Patient Sex:</td>
													<td>
														@if (($patient->sex) === 'M')
															Male
														@elseif (($patient->sex) === 'F')
															Female
														@else
															Other
														@endif
													</td>
												</tr>
												<tr>
													<td>Date of Birth:</td>
													<td>
														<p>
															{{ $patient->dob }}.
															<small class="has-text-link">
																<i>{{$verbose_age}}</i>
															</small>
														</p>
													</td>
												</tr>
												<tr>
													<td>Diagnosis:&nbsp;&nbsp;</td>
													<td>{{ $outpatient->diagnosis }}</td>
												</tr>
												<!-- Patient Vitals -->
												<tr class="has-background-light">
													<td><p class="has-text-link">Vitals</p></td>
													<td><span><i class="fa fa-ellipsis has-text-light"></i></span></td>
												</tr>
												<tr>
													<td>Temperature:&nbsp;&nbsp;</td>
													<td>{{ $outpatient->temperature }}&nbsp;
														<small class="has-text-link">
															<i>celsius</i>
														</small>
													</td>
												</tr>
												<tr>
													<td>Blood Pressure:&nbsp;&nbsp;</td>
													<td>{{ $outpatient->blood_pressure }}</td>
												</tr>
												<tr>
													<td>Weight:&nbsp;&nbsp;</td>
													<td>{{ $outpatient->weight }}&nbsp;
														<small class="has-text-link"><i>kg</i></small>
													</td>
												</tr>
												<tr>
													<td>Height:&nbsp;&nbsp;</td>
													<td>{{ $outpatient->height }}&nbsp;
														<small class="has-text-link"><i>meters</i></small>
													</td>
												</tr>
											</table>
										</div>
									</div>
								</div>
							</div>
							<div class="column">
								<div class="card">
									<header class="card-header">
										<p class="card-header-title">
											Additional Details
										</p>
										<button class="card-header-icon" aria-label="more options">
											<span class="icon">
												<i class="fas fa-angle-down" aria-hidden="true"></i>
											</span>
										</button>
									</header>
									<div class="card-content">
										<div class="content">
											<!-- Prescription informatics -->
											<i class="fa fa-prescription-bottle-medical has-text-primary is-6">
												&nbsp;Prescription:
											</i>
											<p class="subtitle is-6">
												{{ $medicine->name }} -
												<small>
													<i>{{ $medicine->quantity }}&nbsp;{{ $medicine->drug_type }}(s)</i>
												</small>
											</p>

											<!-- Service provider details -->
											<i class="fa fa-user-doctor has-text-primary">
												&nbsp;Service Provider:</i>
											<p class="subtitle is-6">
												{{ $user->name }} -
												<small class="has-text-link"><i>{{ $user->user_type }}</i></small>
											</p>

											<!-- Visit summary -->
											<u>Reason for Visit Details</u>:
											<p class="subtitle is-6">
												{{ $outpatient->reason_for_visit }}
											</p>
											<hr/>

											<time datetime="{{ $outpatient->created_at }}">
												<i class="fa fa-calendar has-text-primary"></i>
												<span>&nbsp;Date of Creation:</span>
												<span class="has-text-info">
													{{ $outpatient->created_at }}
												</span>
											</time>
											<p class="subtitle is-6">
												<i class="fa fa-phone has-text-primary"></i>
												<span>&nbsp;Patient Contact:</span>
												<span class="has-text-info">
													{{ $patient->contactnumber }}
												<span/>
											</p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
