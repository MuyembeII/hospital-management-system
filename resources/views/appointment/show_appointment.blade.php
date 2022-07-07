{{-- patient appointment view: the component to capture patient details  --}}

@extends('template')

@section('content')
<section class="hero is-info is-small">
	<div class="hero-body">
		<div class="container has-text-centered">
			<p class="title">Patient Appointment - {{ $patient->first_name }}&nbsp;{{ $patient->last_name }}</p>
			<p class="subtitle">Appointment details</p>
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
                <!-- Patient Appointment Details -->
                <div class="card">
                    <div class="card-content">
                        <div class="section">
                            <table class="table-profile profile-table is-half is-striped">
                                <tr>
                                    <th colspan="1"></th>
                                    <th colspan="2"></th>
                                </tr>
                                <tr>
                                    <td>Appointment Status:&nbsp;&nbsp;</td>
                                    <td>{{ $appointment->appointment_status }}</td>
                                </tr>
                                <tr>
                                    <td>Appointment Date:&nbsp;&nbsp;</td>
                                    <td>{{ $appointment->appointment_date }}</td>
                                </tr>
                                <tr>
                                    <td>Service Type:&nbsp;&nbsp;</td>
                                    <td>{{ $appointment->service_type }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
			</div>
		</div>
	</div>
</div>
