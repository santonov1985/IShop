@if (session('message'))
    <div class="alert alert-success alert-error text-center shadow-lg">
        {{ session('message') }}
    </div>
    <script>setTimeout(function() { $('.alert-success').fadeOut(); }, 2500);</script>
@endif

{{--@if (session('download'))--}}
{{--    <div class="alert alert-danger alert-error text-center shadow-lg">--}}
{{--        <a href="{{ session('download') }}" class="text-white">Скачать</a>--}}
{{--        <button type="button" class="alert-error-close" data-dismiss="alert" aria-label="Close">--}}
{{--            <i class="fa fa-close"></i>--}}
{{--        </button>--}}
{{--    </div>--}}
{{--@endif--}}
