{{-- pharmacy service view: the component to view pharmacy details  --}}

@extends('template')

@section('content')
<section class="hero is-info is-small">
	<div class="hero-body">
		<div class="container has-text-centered">
			<p class="title">Pharmacy - {{ $patient->first_name }}&nbsp;{{ $patient->last_name }}</p>
			<p class="subtitle">Pharmacy Visit Details</p>
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
						<a class="button is-primary is-outlined" href="{{ url('pharmacy') }}">
							Back To Pharmacy&nbsp;&nbsp; <i class="fas fa-rotate-left"></i>
						</a>
					</p>
				</div>
			</div>
			<div class="column is-10 is-offset-1">
				<!-- Pharmacy Details -->
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

												<!-- Patient Vitals -->
												<tr class="has-background-light">
													<td><p class="has-text-link">Medicine</p></td>
													<td><span><i class="fa fa-ellipsis has-text-light"></i></span></td>
												</tr>
												<tr>
                          <tr>
  													<td>Dispensation Date:&nbsp;&nbsp;</td>
  													<td>{{ $pharmacy->dispensation_date }}</td>
  												</tr>
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
												&nbsp;Dispensation:
											</i>
											<p class="subtitle is-6">
												{{ $pharmacy->name }} -
												<small>
													<i>{{ $pharmacy->quantity }}&nbsp;{{ $pharmacy->drug_type }}(s)</i>
												</small>
											</p>


											<!-- Visit summary -->
											<u>Details</u>:
											<p class="subtitle is-6">
												{{ $pharmacy->dispensation_description }}
											</p>
											<hr/>

											<time datetime="{{ $pharmacy->created_at }}">
												<i class="fa fa-calendar has-text-primary"></i>
												<span>&nbsp;Date of Creation:</span>
												<span class="has-text-info">
													{{ $pharmacy->created_at }}
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
