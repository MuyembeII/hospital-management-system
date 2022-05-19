{{-- patient details view: the component to visualize all client details  --}}

@extends('template')

@section('content')
<section class="hero is-info is-small">
	<div class="hero-body">
		<div class="container has-text-centered">
			<p class="title">Patient Details</p>
			<p class="subtitle">Patient management services for appointments and pharmarcy.</p>
		</div>
	</div>
</section>

<section class="container">
	<div class="columns features">
	    <div class="column is-3">
            <a class="button is-primary is-block is-alt is-large" href="{{ route('patients.edit', $patient->id) }}">Edit Patient</a>
            <br />
            <a class="button is-primary is-block is-alt is-large" href="{{ route('appointment.create') }}"> Create Appointment</a>
            <br />
            <a class="button is-primary is-block is-alt is-large" href="{{ url('patients') }}">Back To Patients List</a>
            <aside class="menu">
                <p class="menu-label">
                    Services
                </p>
                <ul class="menu-list has-text-centered">
                    <li class="is-right is-link">
                        <a class="patient-service" href="{{ route('patients.create') }}">Out patient/OPD</a>
                    </li>
                    <li class="is-right is-link">
                        <a class="patient-service" href="{{ route('patients.create') }}">In patient/IPD</a>
                    </li>
                    <li class="is-right">
                        <a class="patient-service" href="{{ route('patients.create') }}">Pharmarcy</a>
                    </li>
                </ul>
            </aside>
	    </div>
		<div class="column is-9">
			<!-- Profile -->
			<div class="card">
				<div class="card-content">
					<h3 class="title is-4">Profile</h3>
                    <div class="columns">
                        <div class="column is-half">
                            <div class="content">
                                <table class="table-profile profile-table is-half is-striped">
                                    <tr>
                                        <th colspan="1"></th>
                                        <th colspan="2"></th>
                                    </tr>
                                    <tr>
                                        <td>Name:</td>
                                        <td>{{ $patient->first_name }}&nbsp;{{ $patient->last_name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Gender :</td>
                                        <td>{{ $patient->sex }}</td>
                                    </tr>
                                    <tr>
                                        <td>Date of Birth :</td>
                                        <td>{{ $patient->dob }}</td>
                                    </tr>
                                    <tr>
                                        <td>Address:</td>
                                        <td>{{ $patient->address }}</td>
                                    </tr>
                                    <tr>
                                        <td>Contact Number:</td>
                                        <td>{{ $patient->contactnumber }}</td>
                                    </tr>
                                    <tr>
                                        <td>Email:</td>
                                        <td>{{ $patient->email }}</td>
                                    </tr>
                                    <tr>
                                        <td>NRC Number:</td>
                                        <td>{{ $patient->nrc }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="column is-half">
                            <div class="content">
                                <table class="table-profile profile-table is-half is-striped">
                                    <tr>
                                        <th colspan="1"></th>
                                        <th colspan="2"></th>
                                    </tr>
                                    <tr>
                                        <td>Occupation:</td>
                                        <td>{{ $patient->occupation }}</td>
                                    </tr>
                                    <tr>
                                        <td>Birth Place:</td>
                                        <td>{{ $patient->birth_place }}</td>
                                    </tr>
                                    <tr>
                                        <td>Nationality:</td>
                                        <td>{{ $patient->nationality }}</td>
                                    </tr>
                                    <tr>
                                        <td>Language:</td>
                                        <td>Bemba</td>
                                    </tr>
                                    <tr>
                                        <td>Religion:</td>
                                        <td>{{ $patient->religion }}</td>
                                    </tr>
                                    <tr>
                                        <td>Guardian:</td>
                                        <td>{{ $patient->guardian }}</td>
                                    </tr>
                                    <tr>
                                        <td>Guardian Address:</td>
                                        <td>{{ $patient->guardian_address }}</td>
                                    </tr>
                                    <tr>
                                        <td>Guardian Contact:</td>
                                        <td>{{ $patient->guardian_contact }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>

					<hr class="content-divider">
					<h3 class="title is-6">Patient Appointments</h1>
				</div>
			</div>
		<div>
	</div>
</section>
