@extends('layouts.app')

@section('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.13.2/r-2.4.0/sb-1.4.0/sp-2.1.1/sl-1.6.0/datatables.min.css"/>
@endsection
@section('breadcrumbs')
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">
            <ol>
                <li><a href="/">Home</a></li>
                <li>Map</li>
            </ol>
            <div class="row">
                <div class="col">
                    <h5>Digitized Medieval Manuscripts map</h5>
                    <h6>Browse the man and discover thousands of digitized medieval manuscripts</h6>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('content')
    <div class="text-center">
        <h1 class="display-3">Digitized Medieval Manuscripts map</h1>
        <p id="lead" class="text-muted lead">by Sexy Codicology</p>
    </div>
    <div class="text-center">
        <div class="btn-group my-3" role="group" aria-label="additional options">
            <button class="btn btn-primary border-light" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapsible"
                    aria-expanded="false" aria-controls="collapsible">
                <i class="bi bi-info-circle-fill"></i> About
            </button>
            <a class="btn btn-primary border-light" href="#dmmtable_wrapper" type="button">
                <i class="bi bi-filter"></i> Go to filters</a>
            <a class="btn btn-primary border-light" href="#cta" type="button">
                <i class="bi bi-chat-left-heart-fill"></i> Support us!</a>
        </div>

        <div class="collapse" id="collapsible">
            <div class="card card-body">
                <h3>The DMMapp Map</h3>
                <strong>The classic DMMapp experience!</strong> Browse a map containing all the institutions that are
                some
                to digitized medieval manuscripts.
                <hr>
                <p>The data collected by the DMMapp is crowdsourced and updated constantly. If you notice
                    any
                    errors, please help us correct them by using the <b>Report data issue</b> button at the
                    bottom of this page.</p>
            </div>
        </div>
    </div>
    <div id="main-map" data-aos="fade-up">
        <div id="map" style="height:50em; width:100%;">
            <noscript>
                <div class="alert alert-info">
                    <h4>Your JavaScript is disabled</h4>
                    <p>Please enable JavaScript to view the map.</p>
                </div>
            </noscript>
        </div>

        <div id="main-data">
            <div class="container">
                <div class="card">
                    <div class="card-header">Available institutions</div>
                    <div class="card-body">
                        <table class="table table-bordered yajra-datatable table-responsive table-hover"
                               style="width:100%">
                            <thead>
                            <tr>
                                <th>Institution</th>
                                <th>IIIF Repository</th>
                                <th>Quantity of digitized items</th>
                                <th>Link to digitized manuscripts</th>
                                <th>Free Cultural Works License</th>
                                <th>Digitized items' copyright</th>
                                <th>Nations</th>
                                <th>City</th>
                                <th>lat</th>
                                <th>lng</th>
                                <th>Notes</th>
                                <th>Links</th>
                                <th>Sexy Codicology blog post</th>
                                <th>Blog post</th>
                                <th>asd</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-patreon/>

    <div class="position-fixed bottom-0 start-50 translate-middle-x" style="z-index: 11">
        <div id="liveToast" class="toast show" role="alert" aria-live="assertive" aria-atomic="true"
             data-bs-autohide="false">
            <div class="toast-header">
                <i class="bi bi-check-double"></i>
                <strong class="me-auto ms-2">Improve the DMMapp!</strong>
                <strong class="me-auto"></strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body text-center">
                <a href="https://docs.google.com/forms/d/e/1FAIpQLSfP_TNstBIoCI9mBhA81cN7XxASGx4cLknBOuyp44Tm7Qh9_g/viewform"
                   rel="noopener" class="btn btn-warning" target="_blank" role="button" aria-pressed="true">
                    <i class="bi bi-exclamation-circle-fill"></i> Report data issue <sup><i
                            class="bi bi-box-arrow-up-right fa-xs"></i></sup>
                </a>
                <a href="https://docs.google.com/forms/d/1EvEN3Ctzt1rQgGPPcyyAZ4UcSN3p-aqVqfOIUTE75Xk"
                   rel="noopener"
                   class="btn btn-danger mt-2" target="_blank" role="button" aria-pressed="true">
                    <i class="bi bi-exclamation-circle-fill"></i> Report missing institution <sup><i
                            class="bi bi-box-arrow-up-right fa-xs"></i></sup>
                </a>
            </div>
        </div>
    </div>

@endsection
{{-- Optional JavaScript --}}
@section('javascript')
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.13.2/r-2.4.0/sb-1.4.0/sp-2.1.1/sl-1.6.0/datatables.min.js"></script>    {{--<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBXbFwvj_8iz-56H2YYRdOPqxphj01fWdw&callback=initMap"></script>--}}
@endsection

@push('scripts')
    @env('production')
        <script type="text/javascript" src="{{ asset('/js/map-data.min.js') }}"></script>
        {{--<script defer type="text/javascript" src="{{ asset('/js/dmmapp.min.js') }}"></script>--}}
    @endenv
    @env(['local', 'staging'])
        <script type="text/javascript" src="{{ asset('/js/map-data.js') }}"></script>
        {{--<script defer type="text/javascript" src="{{ asset('/js/dmmapp.js') }}"></script>--}}
    @endenv
@endpush

