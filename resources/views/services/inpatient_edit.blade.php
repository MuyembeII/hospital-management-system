{{-- outpatient patient view: the component to capture outpatient details  --}}

@extends('template')

@section('content')
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

                        <div class="columns">
                            <!-- Column 1 -->
                            <div class="column is-4">
                                <!-- Input:  Temperature -->
                                <div class="field">
                                    <div class="control">
                                        <label class="label" for="temperature">Temperature
                                            <small>(celsius)</small></label>
                                        <input
                                            class="input"
                                            type="text"
                                            name="temperature"
                                            id="temperature"
                                            value="{{ $inpatient->temperature }}"
                                        >
                                    </div>
                                </div>
                                <!-- Input:  Weight -->
                                <div class="field">
                                    <div class="control">
                                        <label class="label" for="weight">Weight <small>(kg)</small></label>
                                        <input
                                            class="input"
                                            type="text"
                                            name="weight"
                                            id="weight"
                                            value="{{ $inpatient->weight }}"
                                        >
                                    </div>
                                </div>
                                <!-- Input:  Systolic Blood Pressure -->
                                <div class="field">
                                    <div class="control">
                                        <label class="label" for="bp_systolic">Systolic BP <small>(mmHg)</small></label>
                                        <input
                                            class="input"
                                            type="number"
                                            name="bp_systolic"
                                            id="bp_systolic"
                                            value="{{ $inpatient->bp_systolic }}"
                                        >
                                    </div>
                                </div>
                            </div>

                            <!-- Column 2 -->
                            <div class="column is-4">
                                <!-- Input:  Height -->
                                <div class="field">
                                    <div class="control">
                                        <label class="label" for="height">Height <small>(meters)</small></label>
                                        <input
                                            class="input"
                                            type="input"
                                            name="height"
                                            id="height"
                                            value="{{ $inpatient->height }}"
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

                                <!-- Input:  Diastolic Blood Pressure -->
                                <div class="field">
                                    <div class="control">
                                        <label class="label" for="bp_diastolic">Diastolic BP
                                            <small>(mmHg)</small></label>
                                        <input
                                            class="input"
                                            type="number"
                                            name="bp_diastolic"
                                            id="bp_diastolic"
                                            value="{{ $inpatient->bp_diastolic }}"
                                        >
                                    </div>
                                </div>

                            </div>

                            <!-- Column 3 -->
                            <div class="column is-4">
                                <!-- Text:  Diagnosis Details -->
                                <div class="field">
                                    <div class="control mb-1">
                                        <label class="label" for="diagnosis">Diagnosis Details</label>
                                        <textarea
                                            class="textarea"
                                            name="diagnosis"
                                            id="diagnosis"
                                        >
                                            {{ $inpatient->diagnosis }}
                                        </textarea>
                                    </div>
                                </div>
                                <!-- Text:  Reason for Visit -->
                                <div class="field">
                                    <div class="control mb-1">
                                        <label class="label" for="diagnosis">Visit Summary</label>
                                        <textarea
                                            class="textarea"
                                            name="reason_for_visit"
                                            id="reason_for_visit"
                                        >
                                            {{ $inpatient->visit_summary }}
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
