@extends('layouts.app')
@section('css')
@endsection
@section('breadcrumbs')
    <ol>
        <li><a href="/">Home</a></li>
        <li>Admin</li>
        <li>Broken links</li>
    </ol>
    <h2>Broken links</h2>
@endsection
@section('content')
    {{-- Content here --}}
    <div id="main-data">
        <div class="container">
            <a class="btn btn-primary my-3" href="{{route('check_broken_links')}}" role="button" id="JobButton"><i class="bi bi-check2-circle"></i> Start
                Broken Links
                checker</a>

            <div class="card">
                <div class="card-header">Broken links</div>
                <div class="card-body">
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <noscript>
                        <div class="alert alert-info">
                            <h4>Your JavaScript is disabled</h4>
                            <p>Please enable JavaScript to see the table.</p>
                        </div>
                    </noscript>
                    <table id="dashboard" class="table table-bordered my-3" style="width: 100%">
                        <thead>
                        <tr>
                            <th>Institution</th>
                            <th>Status Code</th>
                            <th>Edit</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
{{-- Optional JavaScript --}}
@section('javascript')
@endsection

@push('scripts')
    {{-- NOTE this transforms our libraries to json, which can then be read by Google maps - in dmmapp.js --}}
    <script type="text/javascript">
        let brokenLinks = {!! json_encode($brokenLinks->toArray()) !!}
    </script>
    <script type="text/javascript" src="{{ mix('js/broken-links.min.js') }}"></script>
    <script type="text/javascript">
        $("#JobButton").on("click", function () {
            $(this).prop("disabled", true);
        });
    </script>
@endpush
