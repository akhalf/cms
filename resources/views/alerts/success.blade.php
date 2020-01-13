@if(session('success'))
    <div id="success-alert" class="alert alert-success">
        <button type="button" class="close float-left" data-dismiss="alert">x</button>
        {{ session('success') }}
    </div>
@endif

{{--@section('script')--}}
{{--    <script>--}}
{{--        $("#success-alert").fadeTo(2000, 500).slideUp(500, function(){--}}
{{--            $("#success-alert").slideUp(500);--}}
{{--        });--}}
{{--    </script>--}}
{{--@endsection--}}
