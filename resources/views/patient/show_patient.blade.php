{{-- patient details view: the component to visualize all client details  --}}

@extends('template')


<section class="hero is-info is-small">
    <div class="hero-body">
        <div class="container has-text-centered">
            <p class="title">Patient Details - {{ $patient->first_name }}&nbsp;{{ $patient->last_name }}</p>
            <p class="subtitle h-title">Patient management services for appointments, OPD, IPD and pharmacy.</p>
        </div>
    </div>
</section>
@if(session()->get('success'))
    <div class="box">
        <article class="message is-success">
            <span class="icon has-text-link">
                <i class="fas fa-circle-check"></i>
            </span>
            <div class="message-body">
                {{ session()->get('success') }}
            </div>
        </article>
    </div>
@elseif (session()->get('error'))
    <div class="box">
        <article class="message is-error">
            <span class="icon has-text-link">
                <i class="fas fa-circle-check"></i>
            </span>
            <div class="message-body">
                {{ session()->get('success') }}
            </div>
        </article>
    </div>
@endif
<section class="container">
    <div>
        <div class="columns features">
            <!-- Patient Details Menu -->
            <div class="column is-3">
                <a class="button is-primary is-block is-alt is-large"
                   href="{{ route('patients.edit', $patient->id) }}">Edit Patient</a>
                <br/>
                <a onclick="openModal();" class="button is-primary is-block is-alt is-large"
                   data-target="create-appointment"> Create Appointment&nbsp; <i class="fas fa-wand-magic"></i></a>
                <br/>
                <a onclick="openDispensationModal();" class="button is-primary is-block is-alt is-large h-title"
                   data-target="create-pharmacy"> Create Pharmacy&nbsp; <i class="fas fa-wand-magic"></i></a>
                <br/>
                <a onclick="openCreateOPDModal();" class="button is-link is-block is-alt is-medium h-title"
                   data-target="create-opd"> Start OPD&nbsp; <i class="fas fa-play"></i></a>
                <br/>
                <a onclick="openCreateIPDModal();" class="button is-link is-block is-alt is-medium h-title"
                   data-target="create-ipd"> Start IPD&nbsp; <i class="fas fa-play"></i></a>
                <br/>
                <a class="button is-success is-block is-alt is-medium" href="{{ url('patients') }}">Back To
                    Patients List</a>
                <aside class="menu">
                    <p class="menu-label">
                        Services
                    </p>
                    <ul class="menu-list has-text-centered">
                        <li class="is-right is-link">
                            <a class="patient-service" onclick="openOPDModal();" data-target="show-opd">Out
                                patient/OPD</a>
                        </li>
                        <li class="is-right is-link">
                            <a class="patient-service" onclick="openIPDModal();" data-target="show-ipd">In
                                patient/IPD</a>
                        </li>
                        <li class="is-right">
                            <a class="patient-service" onclick="openPharmacyModal();"
                               data-target="show-pharmacy">Pharmacy</a>
                        </li>
                    </ul>
                </aside>
            </div>
            <div class="column is-9">
                <!-- Patient Profile -->
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
                                            <td class="h-title">{{ $patient->first_name }}
                                                &nbsp;{{ $patient->last_name }}</td>
                                        </tr>
                                        <tr>
                                            <td>Gender :</td>
                                            <td class="h-title">
                                                @if (($patient->sex) === 'M')
                                                    Male
                                                @elseif (($patient->sex) === 'F')
                                                    Female
                                                @else
                                                    Unknown
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Date of Birth :</td>
                                            <td class="h-title">{{ $patient->dob }}</td>
                                        </tr>
                                        <tr>
                                            <td>Address:</td>
                                            <td class="h-title">{{ $patient->address }}</td>
                                        </tr>
                                        <tr>
                                            <td>Contact Number:</td>
                                            <td class="h-title">{{ $patient->contactnumber }}</td>
                                        </tr>
                                        <tr>
                                            <td>Email:</td>
                                            <td class="h-title">{{ $patient->email }}</td>
                                        </tr>
                                        <tr>
                                            <td>NRC Number:</td>
                                            <td class="h-title">{{ $patient->nrc }}</td>
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
                                            <td class="h-title">{{ $patient->occupation }}</td>
                                        </tr>
                                        <tr>
                                            <td>Birth Place:</td>
                                            <td class="h-title">{{ $patient->birth_place }}</td>
                                        </tr>
                                        <tr>
                                            <td>Nationality:</td>
                                            <td class="h-title">{{ $patient->nationality }}</td>
                                        </tr>
                                        <tr>
                                            <td>Language:</td>
                                            <td class="h-title">{{ $patient->langauge }}</td>
                                        </tr>
                                        <tr>
                                            <td>Religion:</td>
                                            <td class="h-title">{{ $patient->religion }}</td>
                                        </tr>
                                        <tr>
                                            <td>Guardian:</td>
                                            <td class="h-title">{{ $patient->guardian }}</td>
                                        </tr>
                                        <tr>
                                            <td>Guardian Address:</td>
                                            <td class="h-title">{{ $patient->guardian_address }}</td>
                                        </tr>
                                        <tr>
                                            <td>Guardian Contact:</td>
                                            <td class="h-title">{{ $patient->guardian_contact }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <hr class="content-divider">
                        <!-- Patient Appointments -->
                        <h3 class="title is-4">Patient Appointments</h3>
                        <div class="box content">
                            <table class="table">
                                <thead>
                                <tr class="has-text-bold">
                                    <th>Appointment Status</th>
                                    <th>Appointment Date</th>
                                    <th>Service Type</th>
                                    <th class="px-3">Options</th>
                                </tr>
                                </thead>
                                <tbody class="h-title">
                                @forelse ($appointments as $appointment)
                                    <tr>
                                        <td>{{ $appointment->appointment_status }}</td>
                                        <td>{{ $appointment->appointment_date }}</td>
                                        <td>{{ $appointment->service_type }}</td>
                                        <td>
                                            <form method="POST">
                                                <div class="action-buttons">
                                                    <div class="control is-grouped">
                                                        <a class="button is-small is-outlined"
                                                           href="{{ route('patients.show', $patient -> id) }}">
                                                            <i class="fa fa-eye has-text-warning"></i>
                                                        </a>
                                                        <a href="{{ route('patients.edit', $appointment -> id) }}"
                                                           class="button is-small is-outlined">
                                                            <i class="fa fa-pen-to-square has-text-link"></i>
                                                        </a>
                                                        <a class="button is-small is-outlined">
                                                            <i class="fa fa-trash has-text-danger"></i>
                                                        </a>
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
    </div>
</section>


{{-- create appointment modal  --}}
<div id="create-appointment" class="modal">
    <div class="modal-background"></div>
    <div class="modal-card">
        <header class="modal-card-head">
            <div class="container has-text-centered">
                <p class="title">Patient Appointment</p>
                <p class="subtitleclass h-title">Create a new appointment for clinical services</p>
            </div>
            <button onclick="closeModal();" class="delete" aria-label="close"></button>
        </header>
        <section class="modal-card-body">
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
                                <input
                                    class="h-title"
                                    type="hidden"
                                    id="patient_id"
                                    name="patient_id"
                                    value="{{ $patient->id}}"
                                >
                                <input
                                    class="h-title"
                                    type="hidden"
                                    id="user_id"
                                    name="user_id"
                                    value="{{ Auth::user()->id }}">
                                <div class="columns">
                                    <!-- Column 1 -->
                                    <div class="column is-6">
                                        <!-- Choice Select One:  Appointment Status -->
                                        <div class="field">
                                            <div class="control">
                                                <label class="label" for="appointment_status">Appointment Status</label>
                                                <div class="select is-fullwidth">
                                                    <select
                                                        name="appointment_status"
                                                        id="appointment_status"
                                                        class="regular-text h-title"
                                                    >
                                                        <option value=""></option>
                                                        <option value="Pending">Pending</option>
                                                        <option value="Attended">Attended</option>
                                                        <option value="Missed">Missed</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Input:  Appointment Date -->
                                        <div class="field">
                                            <div class="control">
                                                <label class="label" for="appointment_date">Date of Appointment</label>
                                                <input class="input bulmaCalendar h-title" type="date"
                                                       name="appointment_date" id="appointment_date"
                                                       data-display-mode="dialog">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="column is-6">
                                        <!-- Choice Select One:  Service Type -->
                                        <div class="field">
                                            <div class="control">
                                                <label class="label" for="service_type">Service Type</label>
                                                <div class="select is-fullwidth">
                                                    <select name="service_type" id="service_type"
                                                            class="regular-text h-title">
                                                        <option value=""></option>
                                                        <option value="OPD">OPD</option>
                                                        <option value="IPD">IPD</option>
                                                        <option value="TB">TB</option>
                                                        <option value="ART">ART</option>
                                                        <option value="Pharmacy">Pharmacy</option>
                                                        <option value="Cancer">Cancer</option>
                                                        <option value="Counselling">Counselling</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Input:  Appointment Details -->
                                        <div class="field">
                                            <div class="control">
                                                <label class="label" for="appointment_details">Notes</label>
                                                <textarea name="appointment_details"
                                                          id="appointment_details"
                                                          class="textarea h-title"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr class="content-divider">
                                <div class="card has-background-white-ter py-1">
                                    <div class="columns">
                                        <div class="column is-4 mx-2">
                                            <div class="field has-addons">
                                                <p class="control">
                                                    <button
                                                        class="button is-primary submit-button"
                                                        type="submit"
                                                    >
                                                        Create Appointment&nbsp;&nbsp;
                                                        <i class="fas fa-paper-plane"></i>
                                                    </button>
                                                </p>
                                                <p class="control">
                                                    <a
                                                        class="button is-warning"
                                                        onclick="closeModal();"
                                                        aria-current="page"
                                                    >
                                                        Cancel&nbsp;&nbsp;
                                                        <i class="fas fa-circle-xmark"></i>
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
        </section>

    </div>
</div>

{{-- TABLES  --}}
{{-- Show OPD Modal  --}}
<div id="show-opd" class="modal">
    <div class="modal-background"></div>
    <div class="modal-card card-size">
        <header class="modal-card-head">
            <div class="container has-text-centered">
                <p class="title">Patient OPD Services</p>
                <p class="subtitle">List of the patient outpatient services.</p>
            </div>
            <button onclick="closeOPDModal();" class="delete" aria-label="close"></button>
        </header>
        <section class="modal-card-body">
            <div class="section-light has-background-link-light">
                <div class="container has-background-white-bis">
                    <div class="box content">
                        @if(session()->get('success'))
                            <div class="box">
                                <p class="has-text-success">OPD visit removed!</p>
                                <article class="message is-success">
                                                    <span class="icon has-text-link">
                                                        <i class="fas fa-circle-check"></i>
                                                    </span>
                                    <div class="message-body">
                                        {{ session()->get('success') }}
                                    </div>
                                </article>
                            </div>
                        @endif
                        <table class="table">
                            <thead>
                            <tr class="has-text-bold">
                                <th>Blood Pressure</th>
                                <th>Weight</th>
                                <th>Height</th>
                                <th>Temperature</th>
                                <th>Diagnosis</th>
                                <th class="px-3">Options</th>
                            </tr>
                            </thead>
                            <tbody class="h-title">
                            @forelse ($outpatients as $outpatient)
                                <tr>
                                    <td>
                                        {{ $outpatient->bp_systolic }}/{{ $outpatient->bp_diastolic }}
                                    </td>
                                    <td>{{ $outpatient->weight }}</td>
                                    <td>{{ $outpatient->height }}</td>
                                    <td>{{ $outpatient->temperature }}</td>
                                    <td>{{ $outpatient->diagnosis }}</td>
                                    <td>
                                        <form
                                            method="POST"
                                            action="{{ route('outpatient.destroy', $outpatient->id) }}"
                                        >
                                            @csrf
                                            @method('DELETE')
                                            <div class="action-buttons">
                                                <div class="control is-grouped">
                                                    <a class="button is-small is-outlined"
                                                       href="{{ route('outpatient.show', $outpatient -> id) }}">
                                                        <i class="fa fa-eye has-text-warning"></i>
                                                    </a>
                                                    <a class="button is-small is-outlined"
                                                       href="{{ route('outpatient.edit', $outpatient -> id) }}">
                                                        <i class="fa fa-pen-to-square has-text-link"></i>
                                                    </a>
                                                    <button class="button is-small is-outlined"
                                                            type="submit">
                                                        <i class="fa fa-trash has-text-danger"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">No outpatient services found.
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>

    </div>
</div>

{{-- Show IPD Modal  --}}
<div id="show-ipd" class="modal">
    <div class="modal-background"></div>
    <div class="modal-card card-size">
        <header class="modal-card-head">
            <div class="container has-text-centered">
                <p class="title">Patient IPD Services</p>
                <p class="subtitle">List of the patient inpatient services.</p>
            </div>
            <button onclick="closeIPDModal();" class="delete" aria-label="close"></button>
        </header>
        <section class="modal-card-body">
            <div class="section-light has-background-link-light">
                <div class="container has-background-white-bis">
                    <div class="box content">
                        <table class="table">
                            <thead>
                            <tr class="has-text-bold">
                                <th>Blood Pressure</th>
                                <th>Weight</th>
                                <th>Height</th>
                                <th>Temperature</th>
                                <th>Diagnosis</th>
                                <th>Ward</th>
                                <th>Duration</th>
                                <th class="px-3">Options</th>
                            </tr>
                            </thead>
                            <tbody class="h-title">
                            @forelse ($inpatients as $inpatient)
                                <tr>
                                    <td>
                                        {{ $inpatient->bp_systolic }}/{{ $inpatient->bp_diastolic }}
                                    </td>
                                    <td>{{ $inpatient->weight }}</td>
                                    <td>{{ $inpatient->height }}</td>
                                    <td>{{ $inpatient->temperature }}</td>
                                    <td>{{ $inpatient->diagnosis }}</td>
                                    <td>{{ $inpatient->ward }}</td>
                                    <td>{{ $inpatient->duration }}&nbsp;days</td>
                                    <td>
                                        <form method="POST"
                                              action="{{ route('inpatient.destroy', $inpatient->id) }}"
                                        >
                                            @csrf
                                            @method('DELETE')
                                            <div class="action-buttons">
                                                <div class="control is-grouped">
                                                    <a class="button is-small is-outlined"
                                                       href="{{ route('inpatient.show', $inpatient -> id) }}">
                                                        <i class="fa fa-eye has-text-warning"></i>
                                                    </a>
                                                    <a class="button is-small is-outlined"
                                                       href="{{ route('inpatient.edit', $inpatient -> id) }}">
                                                        <i class="fa fa-pen-to-square has-text-link"></i>
                                                    </a>
                                                    <button class="button is-small is-outlined"
                                                            type="submit">
                                                        <i class="fa fa-trash has-text-danger"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">
                                        <p>No inpatient services found.</p>
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>

    </div>
</div>


{{-- Show Create Pharmacy modal  --}}
<div id="show-pharmacy" class="modal">
    <div class="modal-background"></div>
    <div class="modal-card card-size">
        <header class="modal-card-head">
            <div class="container has-text-centered">
                <p class="title">Pharmacy Services</p>
                <p class="subtitle">List of the patient drug dispensations.</p>
            </div>
            <button onclick="closePharmacyModal();" class="delete" aria-label="close"></button>
        </header>
        <section class="modal-card-body">
            <div class="section-light has-background-link-light">
                <div class="container has-background-white-bis">
                    <div class="box content">
                        <table class="table">
                            <thead>
                            <tr class="has-text-bold">
                                <th>Dispensation</th>
                                <th>Quantity</th>
                                <th>Dispensation Date</th>
                                <th>Description</th>
                                <th class="px-3">Options</th>
                            </tr>
                            </thead>
                            <tbody class="h-title">
                            @forelse ($pharmacies as $pharmacy)
                                <tr>
                                    <td>{{ $pharmacy->name }}</td>
                                    <td>{{ $pharmacy->quantity }}</td>
                                    <td>{{ $pharmacy->dispensation_date }}</td>
                                    <td>{{ $pharmacy->dispensation_description }}</td>
                                    <td>
                                        <form
                                            method="POST"
                                            action="{{ route('pharmacy.destroy', $pharmacy->id) }}"
                                        >
                                            @csrf
                                            @method('DELETE')
                                            <div class="action-buttons">
                                                <div class="control is-grouped">
                                                    <a class="button is-small is-outlined"
                                                       href="{{ route('pharmacy.show', $pharmacy -> id) }}">
                                                        <i class="fa fa-eye has-text-warning"></i>
                                                    </a>
                                                    <a class="button is-small is-outlined"
                                                       href="{{ route('pharmacy.edit', $pharmacy -> id) }}">
                                                        <i class="fa fa-pen-to-square has-text-link"></i>
                                                    </a>
                                                    <button class="button is-small is-outlined"
                                                            type="submit">
                                                        <i class="fa fa-trash has-text-danger"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">No pharmacy services
                                        found.
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>

    </div>
</div>

{{-- Start OPD modal  --}}
<div id="create-opd" class="modal">
    <div class="modal-background"></div>
    <div class="modal-card card-size">
        <header class="modal-card-head">
            <div class="container has-text-centered">
                <p class="title">Patient OPD Services</p>
                <p class="subtitle h-title">Start new outpatient service.</p>
            </div>
            <button onclick="closeCreateOPDModal();" class="delete" aria-label="close"></button>
        </header>
        <section class="modal-card-body">
            <div class="section-light has-background-link-light">
                <div class="container has-background-white-bis">
                    <div
                        class="columns is-multiline"
                        data-aos="fade-in-up"
                        data-aos-easing="linear"
                    >
                        <div class="column is-8 is-offset-2">

                            <!-- Form validation message box -->
                            @if ($errors->any())
                                <div class="box">
                                    <p class="has-text-danger">Outpatient record creation
                                        failed!</p>
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

                            <form action="{{ route('outpatient.store') }}" method="POST">
                                @csrf
                                <input
                                    type="hidden"
                                    id="patient_id"
                                    name="patient_id"
                                    value="{{ $patient->id}}"
                                >
                                <input
                                    type="hidden"
                                    id="doctor_id"
                                    name="doctor_id"
                                    value="{{ Auth::user()->id }}"
                                >
                                <div class="columns">
                                    <!-- Column 1 -->
                                    <div class="column is-4">
                                        <!-- Input:  Temperature -->
                                        <div class="field">
                                            <div class="control">
                                                <label class="label" for="temperature">
                                                    Temperature <small>(celsius)</small>
                                                </label>
                                                <input
                                                    class="input"
                                                    type="text"
                                                    name="temperature"
                                                    id="temperature"
                                                >
                                            </div>
                                        </div>
                                        <!-- Input: Systolic Blood Pressure -->
                                        <div class="field">
                                            <div class="control">
                                                <label class="label" for="bp_systolic">
                                                    Systolic BP <small>(mmHg)</small>
                                                </label>
                                                <input
                                                    class="input"
                                                    type="number"
                                                    name="bp_systolic"
                                                    id="bp_systolic"
                                                >
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Column 2 -->
                                    <div class="column is-4">
                                        <!-- Input:  Height -->
                                        <div class="field">
                                            <div class="control">
                                                <label class="label" for="height">
                                                    Height <small>(meters)</small>
                                                </label>
                                                <input
                                                    class="input"
                                                    type="text"
                                                    name="height"
                                                    id="height"
                                                >
                                            </div>
                                        </div>

                                        <!-- Input:  Diastolic Blood Pressure -->
                                        <div class="field">
                                            <div class="control">
                                                <label class="label" for="bp_diastolic">
                                                    Diastolic BP <small>(mmHg)</small>
                                                </label>
                                                <input
                                                    class="input"
                                                    type="number"
                                                    name="bp_diastolic"
                                                    id="bp_diastolic"
                                                >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="column is-4">
                                        <!-- Input:  Weight -->
                                        <div class="field">
                                            <div class="control">
                                                <label class="label" for="weight">
                                                    Weight <small>(kg)</small>
                                                </label>
                                                <input
                                                    class="input"
                                                    type="text"
                                                    name="weight"
                                                    id="weight"
                                                >
                                            </div>
                                        </div>
                                        <!-- Choice Select One:  Prescription -->
                                        <div class="field">
                                            <div class="control">
                                                <label class="label" for="prescription_id">Prescription</label>
                                                <div class="select is-fullwidth">
                                                    <select name="prescription_id"
                                                            id="prescription_id"
                                                            class="regular-text">
                                                        <option>Select Drug...</option>
                                                        @foreach($medicines as $key => $value)
                                                            <option value="{{ $value->id }}">
                                                                {{ $value->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                    </div>


                                </div>

                                <div class="columns">
                                    <!-- Column 3 -->
                                    <div class="column is-6">
                                        <!-- Text:  Diagnosis Details -->
                                        <div class="field">
                                            <div class="control mb-1">
                                                <label class="label" for="diagnosis">
                                                    Diagnosis Details
                                                </label>
                                                <textarea
                                                    name="diagnosis"
                                                    id="diagnosis"
                                                    class="textarea"
                                                >
                                                    </textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="column 6">
                                        <!-- Text:  Reason for Visit -->
                                        <div class="field">
                                            <div class="control mb-1">
                                                <label class="label" for="reason_for_visit">Notes</label>
                                                <textarea
                                                    name="reason_for_visit"
                                                    id="reason_for_visit"
                                                    class="textarea"
                                                ></textarea>
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
                                                    <button
                                                        class="button is-primary submit-button"
                                                        type="submit"
                                                    >
                                                        Save&nbsp;&nbsp
                                                        <i class="fas fa-paper-plane"></i>
                                                    </button>
                                                </p>
                                                <p class="control">
                                                    <a class="button is-warning"
                                                       href="{{ url('patients') }}"
                                                       aria-current="page">
                                                        Cancel&nbsp;&nbsp;
                                                        <i class="fas fa-circle-xmark"></i>
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
        </section>
    </div>
</div>


{{-- Start IPD modal  --}}
<div id="create-ipd" class="modal">
    <div class="modal-background"></div>
    <div class="modal-card card-size">
        <header class="modal-card-head">
            <div class="container has-text-centered">
                <p class="title">Patient IPD Services</p>
                <p class="subtitle h-title">Start new inpatient visit.</p>
            </div>
            <button onclick="closeCreateIPDModal();" class="delete"
                    aria-label="close"></button>
        </header>
        <section class="modal-card-body">
            <div class="section-light has-background-link-light">
                <div class="container has-background-white-bis">
                    <div class="columns is-multiline" data-aos="fade-in-up"
                         data-aos-easing="linear">
                        <div class="column is-8 is-offset-2">

                            <!-- Form validation message box -->
                            @if ($errors->any())
                                <div class="box">
                                    <p class="has-text-danger">
                                        Inpatient record creation failed!
                                    </p>
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

                            <form action="{{ route('inpatient.store') }}" method="POST">
                                @csrf
                                <input
                                    type="hidden"
                                    id="patient_id"
                                    name="patient_id"
                                    value="{{ $patient->id}}"
                                >
                                <input
                                    type="hidden"
                                    id="doctor_id"
                                    name="doctor_id"
                                    value="{{ Auth::user()->id }}"
                                >
                                <!-- Columns - Vitals, Physical Exam and Pharmacy -->
                                <div class="columns">
                                    <!-- Column 1 -->
                                    <div class="column is-4">
                                        <!-- Input:  Temperature -->
                                        <div class="field">
                                            <div class="control">
                                                <label class="label" for="temperature">
                                                    Temperature <small>(celsius)</small>
                                                </label>
                                                <input
                                                    class="input h-title"
                                                    type="text"
                                                    name="temperature"
                                                    id="temperature"
                                                >
                                            </div>
                                        </div>
                                        <!-- Input:  Weight -->
                                        <div class="field">
                                            <div class="control">
                                                <label class="label" for="weight">
                                                    Weight <small>(kg)</small>
                                                </label>
                                                <input
                                                    class="input h-title"
                                                    type="text"
                                                    name="weight"
                                                    id="weight"
                                                >
                                            </div>
                                        </div>
                                        <!-- Choice Select One:  Prescription -->
                                        <div class="field">
                                            <div class="control">
                                                <label class="label" for="prescription_id">
                                                    Prescription
                                                </label>
                                                <div class="select is-fullwidth">
                                                    <select name="prescription_id"
                                                            id="prescription_id"
                                                            class="regular-text h-title">
                                                        <option>Select Drug...</option>
                                                        @foreach($medicines as $key => $value)
                                                            <option
                                                                value="{{ $value->id }}">
                                                                {{ $value->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Select Option:  Discharge Status -->
                                        <div class="field">
                                            <div class="control">
                                                <label class="label" for="discharged">
                                                    Discharged Status
                                                </label>
                                                <label class="is-checkbox is-static">
                                                    <input
                                                        id="discharged"
                                                        name="discharged"
                                                        type="checkbox"
                                                    >
                                                    <span class="icon checkmark">
                                                        <i class="fa fa-check"></i>
                                                    </span>
                                                    <p class="has-text-black h-title">
                                                        Discharged?
                                                    </p>
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Column 2 -->
                                    <div class="column is-4">
                                        <!-- Input: Systolic Blood Pressure -->
                                        <div class="field">
                                            <div class="control">
                                                <label class="label" for="bp_systolic">
                                                    Systolic BP <small>(mmHg)</small>
                                                </label>
                                                <input
                                                    class="input h-title"
                                                    type="number"
                                                    name="bp_systolic"
                                                    id="bp_systolic"
                                                >
                                            </div>
                                        </div>
                                        <!-- Input:  Height -->
                                        <div class="field">
                                            <div class="control">
                                                <label class="label" for="height">
                                                    Height <small>(meters)</small>
                                                </label>
                                                <input
                                                    class="input h-title"
                                                    type="text"
                                                    name="height"
                                                    id="height"
                                                >
                                            </div>
                                        </div>
                                        <!-- Input:  Ward/Service Area -->
                                        <div class="field">
                                            <div class="control">
                                                <label class="label" for="ward">Ward</label>
                                                <input
                                                    class="input h-title"
                                                    type="text"
                                                    name="ward"
                                                    id="ward"
                                                >
                                            </div>
                                        </div>

                                        <!-- Date :  Date of Discharge -->
                                        <div class="field">
                                            <div class="control">
                                                <label class="label" for="discharged_date">
                                                    Date of Discharge
                                                </label>
                                                <input
                                                    class="input bulmaCalendar h-title"
                                                    type="date"
                                                    name="discharged_date"
                                                    id="discharged_date"
                                                    data-display-mode="dialog"
                                                >
                                            </div>
                                        </div>

                                    </div>

                                    <!-- Column 3 -->
                                    <div class="column is-4">
                                        <!-- Input:  Diastolic Blood Pressure -->
                                        <div class="field">
                                            <div class="control">
                                                <label class="label" for="bp_diastolic">
                                                    Diastolic BP <small>(mmHg)</small>
                                                </label>
                                                <input
                                                    class="input h-title"
                                                    type="number"
                                                    name="bp_diastolic"
                                                    id="bp_diastolic"
                                                >
                                            </div>
                                        </div>
                                        <!-- Input:  Duration -->
                                        <div class="field">
                                            <div class="control">
                                                <label class="label" for="duration">
                                                    Duration <small>(days)</small>
                                                </label>
                                                <input
                                                    class="input h-title"
                                                    type="number"
                                                    name="duration"
                                                    id="duration"
                                                >
                                            </div>
                                        </div>

                                        <!-- Choice Select One:  Warden/Nurse -->
                                        <div class="field">
                                            <div class="control">
                                                <label class="label" for="warden_id">
                                                    Warden
                                                </label>
                                                <div class="select is-fullwidth">
                                                    <select name="warden_id"
                                                            id="warden_id"
                                                            class="regular-text h-title">
                                                        <option>Select nurse...</option>
                                                        @foreach($wardens as $key => $value)
                                                            <option
                                                                value="{{ $value->id }}">
                                                                {{ $value->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="columns">
                                    <!-- Column 4 -->
                                    <div class="column is-6">
                                        <!-- Text:  Diagnosis Details -->
                                        <div class="field">
                                            <div class="control mb-1">
                                                <label class="label" for="diagnosis">
                                                    Diagnosis Details
                                                </label>
                                                <textarea
                                                    name="diagnosis"
                                                    id="diagnosis"
                                                    class="textarea h-title"
                                                ></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Column 5 -->
                                    <div class="column is-6">
                                        <!-- Text:  Reason for Visit -->
                                        <div class="field">
                                            <div class="control mb-1">
                                                <label class="label" for="visit_summary">
                                                    Visit Summary
                                                </label>
                                                <textarea
                                                    name="visit_summary"
                                                    id="visit_summary"
                                                    class="textarea h-title"
                                                ></textarea>
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
                                                    <button
                                                        class="button h-title is-primary submit-button"
                                                        type="submit"
                                                        aria-hidden="true"
                                                    >
                                                        Save&nbsp;&nbsp;
                                                        <i class="fas fa-paper-plane"></i>
                                                    </button>
                                                </p>
                                                <p class="control">
                                                    <a class="button h-title is-warning"
                                                       href="{{ url('patients') }}"
                                                       aria-current="page"
                                                       aria-hidden="true"
                                                    >
                                                        Cancel&nbsp;&nbsp;
                                                        <i class="fas fa-circle-xmark"></i>
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
        </section>
    </div>
</div>


{{-- Start Pharmacy Visit  --}}
<div id="create-pharmacy" class="modal">
    <div class="modal-background"></div>
    <div class="modal-card card-size">
        <header class="modal-card-head">
            <div class="container has-text-centered">
                <p class="title">Pharmacy Service</p>
                <p class="subtitle h-title">
                    Patient drug dispensations and medicine management.
                </p>
            </div>
            <button
                onclick="closeDispensationModal();"
                class="delete"
                aria-label="close"
            ></button>
        </header>
        <section class="modal-card-body">
            <div class="section-light has-background-link-light">
                <div class="container has-background-white-bis">
                    <div class="columns is-multiline" data-aos="fade-in-up"
                         data-aos-easing="linear">
                        <div class="column is-8 is-offset-2">

                            <!-- Form validation message box -->
                            @if ($errors->any())
                                <div class="box">
                                    <p class="has-text-danger">Pharmacy drug dispensation failed!</p>
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
                            <p class="subtitle">Patient NRC:
                                <text class="h-title has-text-weight-semibold">{{ $patient->nrc }}</text>
                            </p>
                            <form action="{{ route('pharmacy.store') }}" method="POST">
                                @csrf
                                <input
                                    class="h-title"
                                    type="hidden"
                                    id="patient_id"
                                    name="patient_id"
                                    value="{{ $patient->id}}"
                                >
                                <input
                                    class="h-title"
                                    type="hidden"
                                    id="doctor_id"
                                    name="doctor_id"
                                    value="{{ Auth::user()->id }}"
                                >
                                <div class="columns">
                                    <!-- Column 1 -->
                                    <div class="column is-8">
                                        <!-- Choice Select One:  Drug Name -->
                                        <div class="field">
                                            <div class="control">
                                                <label class="label" for="dispensation_id">
                                                    Prescription
                                                </label>
                                                <div class="select is-fullwidth h-title">
                                                    <select name="dispensation_id"
                                                            id="dispensation_id"
                                                            class="regular-text h-title">
                                                        <option>Select Drug...</option>
                                                        @foreach($medicines as $key => $value)
                                                            <option
                                                                value="{{ $value->id }}">
                                                                {{ $value->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Input:  Appointment Date -->
                                        <div class="field">
                                            <div class="control">
                                                <label class="label" for="dispensation_date">
                                                    Date of Dispensation
                                                </label>
                                                <input class="input bulmaCalendar h-title"
                                                       type="date"
                                                       name="dispensation_date"
                                                       id="dispensation_date"
                                                       data-display-mode="dialog">
                                            </div>
                                        </div>
                                        <!-- Input:  Drug Quantification -->
                                        <div class="field">
                                            <div class="control">
                                                <label class="label" for="quantity">Quantity</label>
                                                <input class="input h-title" type="number"
                                                       name="quantity" id="quantity">
                                            </div>
                                        </div>
                                        <!-- Input:  Appointment Details -->
                                        <div class="field">
                                            <div class="control">
                                                <label class="label" for="dispensation_description">
                                                    Dispensation Remarks
                                                </label>
                                                <textarea
                                                    name="dispensation_description"
                                                    id="dispensation_description"
                                                    class="textarea">
                                                </textarea>
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
                                                    <button
                                                        class="button is-primary submit-button"
                                                        type="submit">
                                                        Dispense&nbsp;&nbsp;
                                                        <i class="fas fa-paper-plane"></i>
                                                    </button>
                                                </p>
                                                <p class="control">
                                                    <a class="button is-warning"
                                                       href="{{ url('patients') }}"
                                                       aria-current="page">
                                                        Cancel&nbsp;&nbsp;
                                                        <i class="fas fa-circle-xmark"></i>
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
        </section>
    </div>
</div>


<script>
    // Function to open the Create-Appointment modal
    function openModal() {
        // Add is-active class on the modal
        document.getElementById("create-appointment").classList.add("is-active");
    }

    // Function to close the Create-Appointment modal
    function closeModal() {
        document.getElementById("create-appointment").classList.remove("is-active");
    }

    function openOPDModal() {
        document.getElementById("show-opd").classList.add("is-active");
    }

    function closeOPDModal() {
        document.getElementById("show-opd").classList.remove("is-active");
    }

    function openIPDModal() {
        document.getElementById("show-ipd").classList.add("is-active");
    }

    function closeIPDModal() {
        document.getElementById("show-ipd").classList.remove("is-active");
    }

    function openPharmacyModal() {
        document.getElementById("show-pharmacy").classList.add("is-active");
    }

    function closePharmacyModal() {
        document.getElementById("show-pharmacy").classList.remove("is-active");
    }

    function openCreateOPDModal() {
        document.getElementById("create-opd").classList.add("is-active");
    }

    function closeCreateOPDModal() {
        document.getElementById("create-opd").classList.remove("is-active");
    }

    function openCreateIPDModal() {
        document.getElementById("create-ipd").classList.add("is-active");
    }

    function closeCreateIPDModal() {
        document.getElementById("create-ipd").classList.remove("is-active");
    }

    function openDispensationModal() {
        document.getElementById("create-pharmacy").classList.add("is-active");
    }

    function closeDispensationModal() {
        document.getElementById("create-pharmacy").classList.remove("is-active");
    }

    // Add event listeners to close the modal
    // whenever user click outside modal
    (document.querySelectorAll(
        '.modal-background, .modal-close, .modal-card-head .delete, .modal-card-foot .button'
    ) || []).forEach(($trigger) => {
        const modal = $trigger.dataset.target;
        const $target = document.getElementById(modal);

        $trigger.addEventListener('click', () => {
            if (modal === 'create-appointment') {
                openModal($target);
            }
            if (modal === 'show-opd') {
                openOPDModal($target);
            }
            if (modal === 'show-ipd') {
                openIPDModal($target);
            }
            if (modal === 'show-pharmacy') {
                openPharmacyModal($target);
            }
            if (modal === 'create-opd') {
                openCreateOPDModal($target);
            }
            if (modal === 'create-ipd') {
                openCreateIPDModal($target);
            }
            if (modal === 'create-pharmacy') {
                openDispensationModal($target);
            }
        });
    });

    // Adding keyboard event listeners to close the modal
    document.addEventListener("keydown", (event) => {
        const e = event || window.event;
        if (e.keyCode === 27) {

            // Using escape key
            closeModal();
            closeOPDModal();
            closeIPDModal();
            closePharmacyModal();
            closeCreateOPDModal();
            closeCreateIPDModal();
            closeDispensationModal();
        }
    });

</script>

