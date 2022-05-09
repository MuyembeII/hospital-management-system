{{-- patient registration view: the component to capture patient details  --}}

@extends('template')

@section('content')
<div class="section-light contact" id="contact">
    <div class="container">
        <div class="columns is-multiline" data-aos="fade-in-up" data-aos-easing="linear">
            <div class="column is-12 about-me">
                <h1 class="title has-text-centered section-title">
                    Get in touch
                </h1>
            </div>
            <div class="column is-8 is-offset-2">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong class="text-danger">Error!</strong>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li></li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="" method="POST">
                    @csrf

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
                        <div class="column is-12">
                            <div class="field">
                              <div class="control ">
                                <button class="button is-primary submit-button">
                                  Save&nbsp;&nbsp;
                                  <i class="fas fa-paper-plane"></i>
                                </button>
                              </div>
                            </div>
                            <div class="field">
                              <div class="control ">
                                <button class="button is-warning">
                                  Cancel&nbsp;&nbsp;
                                  <i class="fas fa-paper-plane"></i>
                                </button>
                              </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
