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
                        <div class="section">
                            <table class="table-profile profile-table is-half is-striped">
                                <tr>
                                    <th colspan="1"></th>
                                    <th colspan="2"></th>
                                </tr>
                                <tr>
                                    <td>Blood Pressure:&nbsp;&nbsp;</td>
                                    <td>{{ $outpatient->blood_pressure }}</td>
                                </tr>
                                <tr>
                                    <td>Weight:&nbsp;&nbsp;</td>
                                    <td>{{ $outpatient->weight }}</td>
                                </tr>
                                <tr>
                                    <td>Height:&nbsp;&nbsp;</td>
                                    <td>{{ $outpatient->height }}</td>
                                </tr>
																<tr>
                                    <td>Temperature:&nbsp;&nbsp;</td>
                                    <td>{{ $outpatient->temperature }}</td>
                                </tr>
																<tr>
                                    <td>Diagnosis:&nbsp;&nbsp;</td>
                                    <td>{{ $outpatient->diagnosis }}</td>
                                </tr>
																<tr>
                                    <td>Reason for Visit:&nbsp;&nbsp;</td>
                                    <td>{{ $outpatient->reason_for_visit }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
			</div>
		</div>
	</div>
</div>
