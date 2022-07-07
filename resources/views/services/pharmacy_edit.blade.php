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

                <p class="subtitle">Patient NRC:
                    <text class="h-title has-text-weight-semibold">{{ $patient->nrc }}</text>
                </p>
                <form action="{{ route('pharmacy.update', $pharmacy->id) }}" method="POST">
                    @method('PATCH')
                    @csrf
                    <input class="h-title" type="hidden" id="patient_id" name="patient_id" value="{{ $patient->id}}">
                    <input class="h-title" type="hidden" id="doctor_id" name="doctor_id" value="{{ Auth::user()->id }}">

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
                                                    value="{{ $value->id }}"
                                                    {{ ( $value->id == $pharmacy->dispensation_id) ? 'selected' : '' }}
                                                >
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
                                           data-display-mode="dialog"
                                           value="{{ $pharmacy->dispensation_date }}"
                                    >
                                </div>
                            </div>
                            <!-- Input:  Drug Quantification -->
                            <div class="field">
                                <div class="control">
                                    <label class="label" for="quantity">Quantity</label>
                                    <input
                                        class="input h-title"
                                        type="number"
                                           name="quantity"
                                        id="quantity"
                                        value="{{ $pharmacy->quantity }}"
                                    >
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
                                        {{ $pharmacy->dispensation_description }}
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
                                            Update Dispensation&nbsp;&nbsp;
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
