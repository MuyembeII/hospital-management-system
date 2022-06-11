{{-- patient appointment list view: the component to capture patient details  --}}

@extends('template')

@section('content')
<section class="hero is-info is-small">
	<div class="hero-body">
		<div class="container has-text-centered">
			<p class="title">Patient Appointments</p>
			<p class="subtitle">List of all patient appointments</p>
		</div>
	</div>
</section>
<div class="section-light has-background-link-light">
	<div class="container has-background-white-bis">
		<div class="columns is-multiline" data-aos="fade-in-up" data-aos-easing="linear">
		    <div class="column is-full">
		        <div class="field has-addons ml-4 my-2">
                                <p class="control">
                                    <a class="button is-success submit-button" href="{{ route('main') }}">
                                        Back To Main&nbsp;&nbsp; <i class="fas fa-rotate-left"></i>
                                    </a>
                                </p>
                            </div>
		    </div>
			<div class="column is-10 is-offset-1">
                <div class="box content">
                    <!-- Form success message box -->
                    @if(session()->get('success'))
                    <div class="box">
                        <p class="has-text-success">Task completed!</p>
                        <article class="message is-success">
                            <span class="icon has-text-link">
                                <i class="fas fa-circle-check"></i>
                            </span>
                            <div class="message-body">
                                {{ session()->get('success') }}
                            </div>
                        <article>
                    </div>
                    @endif
                    <table class="table">
                        <thead>
                            <tr class="has-text-bold">
                                <th>Patient Name</th>
                                <th>Sex</th>
                                <th>Age</th>
                                <th>Appointment Status</th>
                                <th>Appointment Date</th>
                                <th>Service Type</th>
                                <th class="px-3">&nbsp;&nbsp;&nbsp;&nbsp;Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($appointments as $appointment)
                            <tr>
                                <td>
                                    <a class="has-text-link" href="{{ route('patients.show', $appointment -> patient_id) }}">
                                        {{ $appointment->first_name }}&nbsp;{{ $appointment->last_name }}
                                    </a>
                                </td>
                                <td>{{ $appointment->sex }}</td>
                                <td>{{ $appointment->age }}</td>
                                <td>{{ $appointment->appointment_status }}</td>
                                <td>{{ $appointment->appointment_date }}</td>
                                <td>{{ $appointment->service_type }}</td>
                                <td>
                                    <form action="{{ route('appointments.destroy', $appointment->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <div class="action-buttons">
                                            <div class="control is-grouped">
                                                <a class="button is-small is-outlined" href="{{ route('appointments.show', $appointment -> id) }}">
                                                    <i class="fa fa-eye has-text-warning"></i>
                                                </a>
                                                <a class="button is-small is-outlined" href="{{ route('appointments.edit', $appointment -> id) }}">
                                                    <i class="fa fa-pen-to-square has-text-link"></i>
                                                </a>
                                                <button class="button is-small is-outlined" type="submit">
                                                    <i class="fa fa-trash has-text-danger"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center">No appointments found.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
			</div>
		</div>
	</div>
</div>
