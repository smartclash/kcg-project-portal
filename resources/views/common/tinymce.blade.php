@section('header')
    <link rel="stylesheet" href="{{ mix('css/tinymce.css') }}">
@endsection

@section('footer')
    <script src="{{ mix('js/tinymce.js') }}"></script>
    <script>
        tinymce.init({
            selector: '#content',
        });
    </script>
@endsection
