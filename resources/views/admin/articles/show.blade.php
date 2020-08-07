@extends('theme.laratail.app')

@section('css')
<link rel="stylesheet" href="/assets/lib/select2/select2.css">
@endsection

@section('content')
<div class="container mx-auto my-10 px-6 md:px-12">
    <p>
        {!!$article->description!!}
    </p>
</div>
@endsection


@section('scripts')
<script src="https://code.jquery.com/jquery-3.5.1.min.js"
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

<script src="/assets/lib/select2/select2.js"></script>
<script>
    $('#categories').select2({
        minimumResultsForSearch: Infinity
    });
    $('#tags').select2({
        minimumResultsForSearch: Infinity
    });

</script>
@stack('scripts')
@endsection
