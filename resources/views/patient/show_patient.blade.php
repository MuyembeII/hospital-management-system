{{-- patient details view: the component to visualize all client details  --}}

@extends('template')

@section('content_title',__("Patient Details"))
@section('content')
<section class="hero is-info is-small">
    <div class="hero-body">
        <div class="container has-text-centered">
            <p class="title">Patient Details - {{ $patient->first_name }}&nbsp;{{ $patient->last_name }}</p>
            <p class="subtitle">Patient management services for appointments, OPD, IPD and pharmacy.</p>
        </div>
    </div>
</section>

@section('content')
<section class="container">
    <div>
        <div class="columns features">
            <!-- Patient Details Menu -->
            <div class="column is-3">
                <a class="button is-primary is-block is-alt is-large" href="{{ route('patients.edit', $patient->id) }}">Edit Patient</a>
                <br />
                <a onclick="openModal();" class="button is-primary is-block is-alt is-large" data-target="create-appointment"> Create Appointment</a>
                <br />
                <a class="button is-primary is-block is-alt is-large" href="{{ url('patients') }}">Back To Patients List</a>
                <aside class="menu">
                    <p class="menu-label">
                        Services
                    </p>
                    <ul class="menu-list has-text-centered">
                        <li class="is-right is-link">
                            <a class="patient-service" href="{{ route('outpatient.create') }}">Out patient/OPD</a>
                        </li>
                        <li class="is-right is-link">
                            <a class="patient-service" href="{{ route('inpatient.create') }}">In patient/IPD</a>
                        </li>
                        <li class="is-right">
                            <a class="patient-service" href="{{ route('pharmacy.create') }}">Pharmacy</a>
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
                        <!-- Patient Appointments -->
                        <h3 class="title is-4">Patient Appointments</h1>
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
                                                            <a class="button is-small has-text-warning has-text-link" href="{{ route('patients.show', $patient -> id) }}">
                                                                <i class="fa fa-eye"></i>
                                                            </a>
                                                            <a href="{{ route('appointment.edit', $appointment -> id) }}" class="button is-small is-info has-text-link">
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
                            <hr class="content-divider">
                            <!-- Outpatient Services -->
                            <h3 class="title is-4">Outpatient Services</h1>
                                <div class="box content">
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
                                        <tbody>
                                            @forelse ($outpatients as $outpatient)
                                            <tr>
                                                <td>{{ $outpatient->blood_pressure }}</td>
                                                <td>{{ $outpatient->weight }}</td>
                                                <td>{{ $outpatient->height }}</td>
                                                <td>{{ $outpatient->temperature }}</td>
                                                <td>{{ $outpatient->diagnosis }}</td>
                                                <td>
                                                    <form method="POST">
                                                        <div class="action-buttons">
                                                            <div class="control is-grouped">
                                                                <a class="button is-small has-text-warning has-text-link" href="{{ route('patients.show', $patient -> id) }}">
                                                                    <i class="fa fa-eye"></i>
                                                                </a>
                                                                <a href="{{ route('appointment.edit', $appointment -> id) }}" class="button is-small is-info has-text-link">
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
                                                <td colspan="4" class="text-center">No outpatient services found.</td>
                                            </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                    </div>
                </div>
                <div>
                </div>
            </div>
</section>

@section('content')
{{-- create appointment modal  --}}
<div id="create-appointment" class="modal">
    <div class="modal-background"></div>
    <div class="modal-card">
        <header class="modal-card-head">
            <div class="container has-text-centered">
                <p class="title">Patient Appointment</p>
                <p class="subtitle">Create a new appointment for clinical services</p>
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

                            <form action="{{ route('appointment.store') }}" method="POST">
                                @csrf
                                <input type="hidden" id="patient_id" name="patient_id" value="{{ $patient->id}}">
                                <input type="hidden" id="user_id" name="user_id" value="{{ Auth::user()->id }}">
                                <div class="columns">
                                    <!-- Column 1 -->
                                    <div class="column is-6">
                                        <!-- Choice Select One:  Appointment Status -->
                                        <div class="field">
                                            <div class="control">
                                                <label class="label" for="appointment_status">Appointment Status</label>
                                                <div class="select is-fullwidth">
                                                    <select name="appointment_status" id="appointment_status" class="regular-text">
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
                                                <input class="input bulmaCalendar" type="date" name="appointment_date" id="appointment_date" data-display-mode="dialog">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="column is-6">
                                        <!-- Choice Select One:  Service Type -->
                                        <div class="field">
                                            <div class="control">
                                                <label class="label" for="sex">Service Type</label>
                                                <div class="select is-fullwidth">
                                                    <select name="service_type" id="service_type" class="regular-text">
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
                                                <textarea name="appointment_details" id="appointment_details" class="textarea"></textarea>
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
                                                    <button class="button is-primary submit-button" type="submit">
                                                        Update Appointment&nbsp;&nbsp; <i class="fas fa-paper-plane"></i>
                                                    </button>
                                                </p>
                                                <p class="control">
                                                    <a class="button is-warning" onclick="closeModal();" aria-current="page">
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

    function openEditAppointmentModal() {
        document.getElementById("edit-appointment").classList.add("is-active");
    }

    function closeEditAppointmentModal() {
        document.getElementById("edit-appointment").classList.remove("is-active");
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
            if (modal === 'edit-appointment') {
                openEditAppointmentModal($target);
            }

        });
    });

    // Adding keyboard event listeners to close the modal
    document.addEventListener("keydown", (event) => {
        const e = event || window.event;
        if (e.keyCode === 27) {

            // Using escape key
            closeModal();
            closeEditAppointmentModal();
        }
    });
    /*--------------------------------------------------------------------------------------------------------------*/
    //Appointment controls
    var appointmentStatusSelect = document.getElementById('appointment_status');
    var serviceTypeSelect = document.getElementById('service_type');
    var appointmentDateCalendar = document.getElementById('appointment_date');
    var appointmentDetailsTextArea = document.getElementById('appointment_details');
</script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script>
    $(document).ready(function() {
        $(document).on('click', '#appointment-update', function(event) {
            event.preventDefault();

            var appointmentId = $(this).data('id');
            console.log("Appointment ID", appointmentId)
            var route = "{{ route('appointment.show', " + appointmentId + ") }}"
            const uri = `http://127.0.0.1:8000/appointment/${appointmentId}/edit`;
            const getAppointmentUri = `/appointment/${appointmentId}/edit`;
            $.ajax({
                type: 'GET',
                url: route,
                dataType: 'json',
                success: function(data) {
                    console.log(`Appointment details -> ${data}`)
                },
                error: function(data) {
                    console.log(`Error fetching appointment: ${data}`)
                }
            })

            openEditAppointmentModal();
        })
    })
</script>
