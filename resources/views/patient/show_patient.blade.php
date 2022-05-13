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
        <div class="column">
            <!-- Profile -->
            <div class="card">
              <div class="card-content">
                <h3 class="title is-4">Profile</h3>

                <div class="content">
                  <table class="table-profile">
                    <tr>
                      <th colspan="1"></th>
                      <th colspan="2"></th>
                    </tr>
                    <tr>
                      <td>Name:</td>
                      <td>{{ $patient->first_name }}&nbsp;{{ $patient->last_name }}</td>
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
                  </table>
                </div>
                <br>
                <hr/>
                <h3 class="title is-6">Patient Appointments</h1>
              </div>
            </div>
        <div>
    </div>
</section>
