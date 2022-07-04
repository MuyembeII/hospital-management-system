{{-- outpatient patient view: the component to capture outpatient details  --}}

@extends('template')


<section class="hero is-info is-small">
    <div class="hero-body">
        <div class="container has-text-centered">
            <p class="title">Edit IPD Visit - {{ $patient->first_name }}&nbsp;{{ $patient->last_name }} </p>
            <p class="subtitle h-title">Update Inpatient department details</p>
        </div>
    </div>
</section>
<div class="section-light has-background-link-light">
    <div class="container has-background-white-bis">
        <div class="columns is-multiline" data-aos="fade-in-up" data-aos-easing="linear">
            <div class="column is-8 is-offset-2">

                <!-- Form validation message box -->
                @if ($errors->any())
                    <div class="box">
                        <p class="has-text-danger">Inpatient record update failed!</p>
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

                @if ($message = Session::get('success'))
                    <article class="message is-success">
                            <span class="icon has-text-warning">
                                <i class="fas fa-triangle-exclamation"></i>
                            </span>
                        <div class="message-body">
                            <p>{{ $message }}</p>
                        </div>
                    </article>
                @endif

                <form action="{{ route('inpatient.update', $inpatient->id) }}" method="POST">
                    @method('PATCH')
                    @csrf
                    <input type="hidden" id="patient_id" name="patient_id" value="{{ $inpatient->patient_id}}">
                    <input type="hidden" id="doctor_id" name="doctor_id" value="{{ Auth::user()->id }}">

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
                                        value="{{ $inpatient->temperature}}"
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
                                        value="{{ $inpatient->weight}}"
                                    >
                                </div>
                            </div>

                            <!-- Choice Select One:  Prescription -->
                            <div class="field">
                                <div class="control">
                                    <label class="label" for="prescription_id">Prescription</label>
                                    <div class="select is-fullwidth">
                                        <select name="prescription_id" id="prescription_id" class="regular-text">
                                            @foreach($medicines as $key => $value)
                                                <option
                                                    value="{{ $value->id }}"
                                                    {{ ( $value->id == $inpatient->prescription_id) ? 'selected' : '' }}
                                                >
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
                                            value="{{ $inpatient->discharged}}"
                                            {{ ( $inpatient->discharged == 1) ? 'checked' : '' }}
                                        >
                                            <span class="icon checkmark">
                                                <i class="fa fa-check"></i>
                                            </span>
                                            <p class="has-text-black h-title">Discharged?</p>
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
                                        value="{{ $inpatient->bp_systolic}}"
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
                                        value="{{ $inpatient->height}}"
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
                                        value="{{ $inpatient->ward}}"
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
                                        value="{{ $inpatient->discharged_date}}"
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
                                        value="{{ $inpatient->bp_diastolic}}"
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
                                        value="{{ $inpatient->duration}}"
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
                                                    value="{{ $value->id }}"
                                                    {{ ( $value->id == $inpatient->warden_id) ? 'selected' : '' }}
                                                >
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
                                    >
                                        {{ $inpatient->diagnosis}}
                                    </textarea>
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
                                    >
                                        {{ $inpatient->visit_summary}}
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
                                            type="submit"
                                            aria-hidden="true"
                                        >
                                            Update&nbsp;&nbsp; <i class="fas fa-paper-plane"></i>
                                        </button>
                                    </p>
                                    <p class="control">
                                        <a
                                            class="button is-warning"
                                            href="{{ url('patients') }}"
                                            aria-current="page"
                                            aria-hidden="true"
                                        >
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
