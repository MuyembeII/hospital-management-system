@extends('template')
@section('content')
<section class="hero is-info">
    <div class="hero-body">
        <div class="container">
            <div class="card">
                <div class="card-content">
                    <div class="content">
                        <div class="control has-icons-left has-icons-right">
                            <input class="input is-large" type="search" />
                            <span class="icon is-medium is-left">
                                <i class="fa fa-search"></i>
                            </span>
                            <span class="icon is-medium is-right">
                                <i class="fa fa-empire"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="container" id="p-list-container">
    <div class="columns">
        <div class="column is-3">
            <a class="button is-primary is-block is-alt is-large" href="{{ route('create_patient_view') }}">Create New Patient</a>
            <br />
            <a class="button is-primary is-block is-alt is-large" href="{{ route('main') }}">Back To Main</a>
            <aside class="menu">
                <p class="menu-label">
                    Tags
                </p>
                <ul class="menu-list">
                    <li><span class="tag is-primary is-medium ">Adults</span></li>
                    <li><span class="tag is-link is-medium ">Paeds</span></li>
                    <li><span class="tag is-light is-danger is-medium ">Males</span></li>
                    <li><span class="tag is-dark is-medium ">Females</span></li>
                </ul>
            </aside>
        </div>
        <div class="column is-9">
            <div class="box content">
                <table class="table">
                    <thead>
                        <tr class="has-text-centered">
                            <th><abbr title="Client Number">Client No</abbr></th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th>Gender</th>
                            <th>D.O.B</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($patients as $patient)
                        <tr>
                            <th>{{ $loop->index + 1 }}</th>
                            <td>
                                <p>{{ $patient->first_name }}</p>
                                <p>{{ $patient->last_name }}</p>
                            </td>
                            <td>{{ $patient->address }}</td>
                            <td>{{ $patient->contactnumber }}</td>
                            <td>{{ $patient->sex}}</td>
                            <td>{{ $patient->dob }}</td>
                            <td>
                                <div class="action-buttons">
                                    <div class="control is-grouped">
                                        <a class="button is-small"><i class="fa fa-eye"></i></a>
                                        <a class="button is-small"><i class="fa fa-pen-to-square"></i></a>
                                        <a class="button is-small"><i class="fa fa-trash"></i></a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center">No patients found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
