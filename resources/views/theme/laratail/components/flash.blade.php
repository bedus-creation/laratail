@if(Session::has('success'))
<script>
    window.flash().success('{{session('success')}}');
</script>
@endif

@if(Session::has('error'))
<script>
    window.flash().error("{{session('error')}}");
</script>
@endif
@foreach($errors->all() as $error)
<script>
    window.flash().error("{{$error}}");
</script>
@endforeach
