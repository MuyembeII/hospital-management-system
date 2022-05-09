{{--  patient registration view: the component to capture patient details  --}}

@extends('template')

@section('content')
<section class="hero is-info">
    <div class="hero-body">
        <div class="container">
            <div class="columns is-multiline">
                <h1 class="title is-size-4">Patient Management</h1>
                <p class="is-size-5 subtitle">
                    Register a new patient for clinical care.
                </p>
                <!-- Patient Registration Form -->
                <form method="post" action="#">
                    <div class="column is-8 is-offset-2 register">
                        <div class="columns">
                            <div class="column is-half">
                                <!-- Input:  First Name -->
                                <div class="field">
                                    <div class="control">
                                        <label class="label" for="first_name">First Name</label>
                                        <input class="input" type="text" name="first_name" id="first_name">
                                    </div>
                                </div>
                                <!-- Input:  Last Name -->
                                <div class="field">
                                    <div class="control">
                                        <label class="label" for="last_name">Last Name</label>
                                        <input class="input" type="text" name="last_name" id="last_name">
                                    </div>
                                </div>
                                <!-- Choice Select One:  Gender?.Sex -->
                                <div class="field">
                                    <div class="control">
                                        <label class="label" for="sex">Gender</label>
                                        <div class="select">
                                            <select name="sex" id="sex" class="regular-text">
                                                <option value="U">Other</option>
                                                <option value="F">Female</option>
                                                <option value="M">Male</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!-- Input:  Date of Birth -->
                                <div class="field">
                                    <div class="control">
                                        <label class="label" for="dob">Date of Birth</label>
                                        <input class="input bulmaCalendar" type="date" name="dob" id="dob" data-display-mode="dialog">
                                    </div>
                                </div>
                            </div>
                            <div class="column">
                                <!-- Email Input:  Email Address -->
                                <div class="field">
                                    <div class="control">
                                        <label class="label" for="email">Email Address</label>
                                        <input class="input" type="email" name="email" id="email" placeholder="patient@info.com">
                                    </div>
                                </div>
                                <!-- Input:  Contact Details -->
                                <div class="field">
                                    <div class="control">
                                        <label class="label" for="last_name">Contact Number</label>
                                        <input class="input" type="text" name="last_name" id="last_name">
                                    </div>
                                </div>
                                <!-- Input:  Contact Details -->
                                <div class="field">
                                    <div class="control">
                                        <label class="label" for="address">Address Details</label>
                                        <textarea name="address" id="address" class="textarea"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Additional Patient Details -->
                    <div class="column is-8 is-offset-2 register">
                        <h2 class="subtitle is-4">Additional Details</h2>
                        <div class="columns">
                            <div class="column is-half">

                            </div>
                            <div class="column">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
