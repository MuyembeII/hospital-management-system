{{-- OPD list view: the component to list outpatient department services  --}}

@extends('template')

@section('content')
    <section class="hero is-info is-small">
        <div class="hero-body">
            <div class="container has-text-centered">
                <p class="title">OPD Services</p>
                <p class="subtitle">List of all outpatient department services</p>
            </div>
        </div>
    </section>
    <div class="section-light has-background-link-light">
        <div class="container has-background-white-bis">
            <div class="columns is-multiline" data-aos="fade-in-up" data-aos-easing="linear">
                <div class="column is-full">
                    <div class="field has-addons ml-4 my-2">
                        <p class="control">
                            <a class="button is-success submit-button" href="{{ route('main') }}">
                                Back To Main&nbsp;&nbsp; <i class="fas fa-rotate-left"></i>
                            </a>
                        </p>
                    </div>
                </div>
                <div class="column is-10 is-offset-1">
                    <div class="box content">
                        <!-- Form success message box -->
                        @if(session()->get('success'))
                            <div class="box">
                                <p class="has-text-success">Task completed!</p>
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
                                <th>Patient</th>
                                <th>Sex</th>
                                <th><abbr title="Blood Pressure">BP</abbr></th>
                                <th>Weight</th>
                                <th>Height</th>
                                <th>Temperature</th>
                                <th>Diagnosis</th>
                                <th class="px-3"><i class="fa fa-ellipsis ml-6 has-text-primary"></i></th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($outpatients as $outpatient)
                                <tr>
                                    <td>{{ $outpatient->first_name }}&nbsp;{{ $outpatient->last_name }}</td>
                                    <td>{{ $outpatient->sex }}</td>
                                    <td>{{ $outpatient->bp_systolic }}/{{ $outpatient->bp_diastolic }}</td>
                                    <td>{{ $outpatient->weight }}</td>
                                    <td>{{ $outpatient->height }}</td>
                                    <td>{{ $outpatient->temperature }}</td>
                                    <td>{{ $outpatient->diagnosis }}</td>
                                    <td>
                                        <form method="POST">
                                            <div class="action-buttons">
                                                <div class="control is-grouped">
                                                    <a class="button is-small is-outlined"
                                                       href="{{ route('outpatient.show', $outpatient -> id) }}">
                                                        <i class="fa fa-eye has-text-warning"></i>
                                                    </a>
                                                    <a class="button is-small is-outlined">
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
                                    <td colspan="4" class="text-center">No outpatient services found.</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
