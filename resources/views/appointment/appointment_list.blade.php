{{-- patient registration view: the component to capture patient details  --}}

<?php

    $patients->map(function ($value) {
        return Str::upper($value);
    });
?>
$patients = collect($patients);
@props(['type' => 'info', 'message'])

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
			<div class="column is-8 is-offset-2">
                <div class="box content">
                                            <table class="table">
                                                <thead>
                                                    <tr class="has-text-bold">
                                                        <th>Patient Name</th>
                                                        <th>Appointment Status</th>
                                                        <th>Appointment Date</th>
                                                        <th>Service Type</th>
                                                        <th class="px-3">Options</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    @forelse ($appointments as $appointment)
                                                    <tr>
                                                        <td>{{ $appointment->appointment_status }}</td>
                                                        <td>{{ $appointment->appointment_date }}</td>
                                                        <td>{{ $appointment->service_type }}</td>
                                                        <td>
                                                            <form method="POST">
                                                                <div class="action-buttons">
                                                                    <div class="control is-grouped">
                                                                        <a class="button is-small has-text-warning has-text-link" href="">
                                                                            <i class="fa fa-eye"></i>
                                                                        </a>
                                                                        <a href="" class="button is-small is-info has-text-link">
                                                                            <i class="fa fa-pen-to-square"></i>
                                                                        </a>
                                                                        <a class="button is-small is-danger"><i class="fa fa-trash"></i></a>
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
