@extends('layouts.app')

@section('css')
    <link rel="stylesheet" type="text/css"
          href="https://cdn.datatables.net/v/bs5/dt-1.13.2/b-2.3.4/b-html5-2.3.4/r-2.4.0/sp-2.1.1/sl-1.6.0/datatables.min.css"/>
@endsection
@section('breadcrumbs')
    <ol>
        <li><a href="/">Home</a></li>
        <li>Data</li>
    </ol>
    <div class="row">
        <div class="col">

            <h5>Digitized Medieval Manuscripts database</h5>
            <h6>Explore all the institutions added to the DMMapp database</h6>

        </div>
    </div>
@endsection
@section('content')
    <div class="text-center" data-aos="fade-in">
        <h1 class="display-3">Digitized Medieval Manuscripts database</h1>
    </div>
    <div class="text-center">
        <div class="btn-group my-4" role="group" aria-label="additional options" data-aos="fade-in">
            <button class="btn btn-primary border-light" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapsible"
                    aria-expanded="false" aria-controls="collapsible">
                <i class="bi bi-info-circle-fill"></i> About
            </button>
            <a class="btn btn-primary border-light" href="#dmmapp-datatable" type="button">
                <i class="bi bi-arrow-down-square"></i> Go to list</a>
            <a class="btn btn-primary border-light" href="{{route('random_library')}}" type="button">
                <i class="bi bi-shuffle"></i> Explore a random library!</a>
            <a class="btn btn-primary border-light" href="#cta" type="button">
                <i class="bi bi-chat-left-heart-fill"></i> Support us!</a>
        </div>

        <div class="collapse" id="collapsible">
            <div class="card card-body text-start">
                <h3>The "DMMapp data" page</h3>
                <strong>The full DMMapp data!</strong> Here you can browse, search, and filter all the data we
                have
                inserted into the DMMapp.
                <hr>
                <dt>Institution name</dt>
                <dd>The name of the institution housing digitized items. Also, the link to the said repository.
                </dd>
                <dt>Link to digitized items</dt>
                <dd>A link to the digitized medieval manuscripts belonging to this institution.</dd>
                <dt>IIIF Repository</dt>
                <dd>Indicates wether a repository uses the International Image Interoperability Framework.</dd>
                <dt>Quantity</dt>
                <dd>An indication of how many digitized items are (estimated) in a repository.</dd>
                <dt>Digitized Items' Copyright</dt>
                <dd>The copyright applied to the digitized items in a repository.</dd>
                <dt>Free Cultural Works License</dt>
                <dd>Indicates if the copyright used in a repository is a Creative Commons' Free Cultural Works
                    License.
                </dd>
                <dt>Country</dt>
                <dd>The country where an institution is located.</dd>
                <dt>City</dt>
                <dd>The city where an institution is located.</dd>
                <dt>Blog Post</dt>
                <dd>Indicates weather the Sexy Codicology team has written a blog post reviewing the repository.
                </dd>
                <dt>Full data</dt>
                <dd>Link to the full metadata available on the DMMapp.</dd>
                <hr>
                <p>The data collected by the DMMapp is crowdsourced and updated constantly. If you notice
                    any
                    errors, please help us correct them by using the <b>Report data issue</b> button at the
                    bottom of this page.</p>
            </div>
        </div>
    </div>
    <div id="main-data">
        <div class="container">
            <div class="card shadow-sm" data-aos="fade-up">
                <div class="card-header">List and filters</div>
                <div class="card-body">
                    <table class="table table-bordered dmmapp-datatable my-3" id="dmmapp-datatable"
                           style="width: 100%">
                        <noscript>
                            <div class="alert alert-info">
                                <h4>Your JavaScript is disabled</h4>
                                <p>Please enable JavaScript to see the table.</p>
                            </div>
                        </noscript>
                        <thead>
                        <tr>
                            <th>Institutions</th>
                            <th>Links</th>
                            <th>Quantity of digitized items</th>
                            <th>IIIF</th>
                            <th>Copyright</th>
                            <th>Free Cultural Works license</th>
                            <th>Country</th>
                            <th>City</th>
                            <th>lat</th>
                            <th>lng</th>
                            <th>Additional data</th>
                            <th>Post</th>

                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <x-disclaimer/>
    <x-patreon/>
    <x-feedback/>

@endsection
{{-- Optional JavaScript --}}
@section('javascript')
@endsection


@push('scripts')

    <script type="text/javascript"
            src="https://cdn.datatables.net/v/bs5/dt-1.13.2/b-2.3.4/b-html5-2.3.4/r-2.4.0/sp-2.1.1/sl-1.6.0/datatables.min.js"></script>
    {{-- NOTE this transforms our libraries to json, which can then be read by datatables - in data.min.js --}}
    <script type="text/javascript">
        let libraries = {!! json_encode($libraries->toArray()) !!}
    </script>
    <script type="text/javascript" src="{{ asset('/js/data.min.js') }}"></script>
@endpush
