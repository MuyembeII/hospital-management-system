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
                        <a class="button is-success submit-button" href="{{ route('main') }}">
                            Back To Main&nbsp;&nbsp; <i class="fas fa-rotate-left"></i>
                        </a>
                        <a class="button is-success submit-button" href="{{ url('appointments') }}">
                            Back To Appointments&nbsp;&nbsp; <i class="fas fa-rotate-left"></i>
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
				                                    <td>Patient Sex</td>
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
				                                    <td>Date of Birth</td>
				                                    <td>{{ $patient->dob }}</td>
				                                </tr>
				                                <tr>
				                                    <td>Blood Pressure:&nbsp;&nbsp;</td>
				                                    <td>{{ $outpatient->blood_pressure }}</td>
				                                </tr>
				                                <tr>
				                                    <td>Weight:&nbsp;&nbsp;</td>
				                                    <td>{{ $outpatient->weight }}&nbsp;<small><i>kg</i></small></td>
				                                </tr>
				                                <tr>
				                                    <td>Height:&nbsp;&nbsp;</td>
				                                    <td>{{ $outpatient->height }}&nbsp;<small><i>meters</i></small></td>
				                                </tr>
																				<tr>
				                                    <td>Temperature:&nbsp;&nbsp;</td>
				                                    <td>{{ $outpatient->temperature }}&nbsp;<small><i>celsius</i></small></td>
				                                </tr>
																				<tr>
				                                    <td>Diagnosis:&nbsp;&nbsp;</td>
				                                    <td>{{ $outpatient->diagnosis }}</td>
				                                </tr>
				                            </table>
															    </div>
															  </div>
															  <footer class="card-footer">
															    <a href="#" class="card-footer-item">Save</a>
															    <a href="#" class="card-footer-item">Edit</a>
															    <a href="#" class="card-footer-item">Delete</a>
															  </footer>
															</div>
														</div>
														<div class="column">
															<div class="card">
															  <header class="card-header">
															    <p class="card-header-title">
															      Addition Details
															    </p>
															    <button class="card-header-icon" aria-label="more options">
															      <span class="icon">
															        <i class="fas fa-angle-down" aria-hidden="true"></i>
															      </span>
															    </button>
															  </header>
															  <div class="card-content">
															    <div class="content">
															      <i class="fa fa-prescription-bottle-medical has-text-primary">&nbsp;Prescription:</i> <p class="subtitle is-6">{{ $medicine->name }} - <small><i>{{ $medicine->quantity }}&nbsp;{{ $medicine->drug_type }}(s)</i></small></p>
																		<i class="fa fa-user-doctor has-text-primary">&nbsp;Service Provider:</i> <p class="subtitle is-6">{{ $user->name }} - <small><i>{{ $user->user_type }}</i></small></p>
																		Reason for Visit Details: <p class="subtitle is-6">{{ $outpatient->reason_for_visit }}</p>
																		<br>
															      <time datetime="{{ $outpatient->created_at }}">Date of Creation: {{ $outpatient->created_at }}</time>
															    </div>
															  </div>
															  <footer class="card-footer">
															    <a href="#" class="card-footer-item">Save</a>
															    <a href="#" class="card-footer-item">Edit</a>
															    <a href="#" class="card-footer-item">Delete</a>
															  </footer>
															</div>
														</div>
												</div>
                    </div>
                </div>
			</div>
		</div>
	</div>
</div>
