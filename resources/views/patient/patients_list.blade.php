@extends('template')
@section('content')
<section class="container" id="p-list-container">
    <div class="columns">
        <div class="column is-3">
            <a class="button is-primary is-block is-alt is-large" href="{{ route('patients.create') }}">Create New Patient</a>
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
                            <th>Name</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th>Gender</th>
                            <th>D.O.B</th>
                            <th>options</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($patients as $patient)
                        <tr>
                            <td>
                                <p>{{ $patient->first_name }}&nbsp;{{ $patient->last_name }}</p>
                            </td>
                            <td>{{ $patient->address }}</td>
                            <td>{{ $patient->contactnumber }}</td>
                            <td>{{ $patient->sex}}</td>
                            <td>{{ $patient->dob }}</td>
                            <td>
                                <form action="{{ url($patient -> id) }}" method="POST">
                                    <div class="action-buttons">
                                        <div class="control is-grouped">
                                            <a class="button is-small is-outlined" href="{{ route('patients.show', $patient -> id) }}">
                                                <i class="fa fa-eye has-text-warning"></i>
                                            </a>
                                            <a class="button is-small has-text-link">
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
                            <td colspan="4" class="text-center">
                                <div>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
