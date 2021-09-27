@extends('layouts.app')

@section('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.11.2/r-2.2.9/datatables.min.css" />
@endsection
@section('breadcrumbs')
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">
        <ol>
            <li><a href="/">Home</a></li>
            <li>Map</li>
        </ol>
        <h2>Map</h2>
    </div>
</section>

@endsection
@section('content')
    @foreach ($libraries as $library)
    @endforeach

    <section id="main-map" data-aos="zoom-out">

        <div id="map" style="height:50em; width:100%;">
            <noscript>
                <div class="alert alert-info">
                    <h4>Your JavaScript is disabled</h4>
                    <p>Please enable JavaScript to view the map.</p>
                </div>
            </noscript>
        </div>

        <div id="map-table" class="mt-3">
            <noscript>
                <div class="alert alert-info">
                    <h4>Your JavaScript is disabled</h4>
                    <p>Please enable JavaScript to see the table.</p>
                </div>
            </noscript>
            <table id="dmmtable" class="table table-striped table-bordered" style="width:100%; padding-bottom:1em;">
                <thead>
                    <tr>
                        <th data-priority="1">Nation</th>
                        <th>City</th>
                        <th data-priority="2">Library</th>
                        <th>lat</th>
                        <th>lng</th>
                        <th>Quantity</th>
                        <th>Website</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
        <div class="accordion" id="accordion">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
                        aria-expanded="true" aria-controls="collapseOne">
                        <strong>How does the DMMapp map work?</strong>
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse collapsed" aria-labelledby="headingOne"
                    data-bs-parent="#accordion">
                    <div class="accordion-body">
                        The DMMapp (Digitized Medieval Manuscripts App) links to more than 500 libraries in the world. Each
                        one
                        of these contains digitized medieval manuscripts that can be browsed for free.
                        <h3>How does it work?</h3>
                        <ol>
                            <li>Search for a library / city / country</li>
                            <li>Click on the library you want to visit</li>
                            <li>Click on "Browse the manuscripts" and off you go!</li>
                        </ol>
                        <p>The DMMapp is developed and maintained with a ton of love by the Sexy Codicology Team.</p>
                        <h3>Love what we do?</h3>
                        <p><a href="https://www.patreon.com/bePatron?u=3645539"
                                data-patreon-widget-type="become-patron-button">Become a Patron!</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <x-patreon />

@endsection
{{-- Optional JavaScript --}}
@section('javascript')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.11.2/r-2.2.9/datatables.min.js"></script>
    {{-- NOTE this transforms our libraries to json, which can then be read by Google maps - in dmmapp.js --}}
    <script type="text/javascript">
        var libraries = {!! json_encode($libraries) !!}
    </script>
    <script async type="text/javascript"
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBXbFwvj_8iz-56H2YYRdOPqxphj01fWdw&callback=initMap"></script>
    <script defer type="text/javascript" src="{{ asset('/js/dmmapp.js') }}"></script>
@endsection
