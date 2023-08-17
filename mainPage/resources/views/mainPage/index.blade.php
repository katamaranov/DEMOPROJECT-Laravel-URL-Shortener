@extends('layouts.app')
@section('title', 'Laravel URL Shortener — главная страница')

@push('style')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<link href="{{ asset('css/master.css') }}" rel="stylesheet" />
@endpush

@section('content')
<div class="container" style="text-align: center">
    @auth
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <input type="submit" value="Выйти">
        </form>
    @endauth
    <h2 class="logo my-5">LUS</h2>
    <div class="toggleWrp d-flex justify-content-center">
        <span class="sideToggle" style="background-color:#e3c23c;">Стандартное сокращение ссылок</span>
        <input id="checkbox" name="chk" type="checkbox" autocomplete="off">
        <label class="cc" for="checkbox">
            <div class="s">
                <div class="d"></div>
                <div class="d"></div>
                <div class="d"></div>
                <div class="d"></div>
                <div class="d"></div>
                <div class="d"></div>
                <div class="d"></div>
                <div class="d"></div>
                <div class="d"></div>
            </div>
        </label>
        <span class="sideToggle" style="background-color:#47e157;">Указать кастомное имя ссылки</span>
    </div>
    <form action="{{route('slugCreate')}}" method="POST">
        @csrf
        <div class="input-group py-5">
            <input type="text" class="form-control lnkField" name="lnk" value="{{ old('lnk') }}"
                placeholder="Введите ссылку" aria-label="Example text with button addon"
                aria-describedby="button-addon1" pattern="\S(.*\S)?" required>
            <input type="submit" class="btn btn-outline-secondary" style="background-color: #2193b0; color:white;"
                id="button-addon1" value="Сгенерировать">
            <div class="invalid-feedback @error('lnk') errdisp @enderror">
                @if($errors->has('lnk'))
                {{ $errors->first('lnk') }}
                @endif
            </div>
        </div>
        <div class="hiddenName">
            <div class="input-group">
                <input type="text" name="dop" class="form-control dopField" placeholder="Введите имя новой ссылки"
                    pattern="\S(.*\S)?">
                <div class="invalid-feedback @error('dop') errdisp @enderror">
                    @if($errors->has('dop'))
                    {{ $errors->first('dop')}}
                    <script>
                        $(document).ready(function () {
                            $('#checkbox').prop('checked', true);
                            $('.hiddenName').toggle();
                            $('.dopField').attr('required', true);
                        });
                    </script>
                    @endif
                </div>
            </div>
        </div>
        <h3 class="ajaxFillable">
            @php($slug = session('slug'))
            @isset($slug)
            <a href="http://lnk.shrt/{{$slug}}">http://lnk.shrt/{{$slug}}</a>
            @endisset
        </h3>
        <input type="hidden" name="ipaddr" id="ipp">
    </form>
</div>
@endsection

@push('script')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<script src="{{ asset('js/preloadIP.js') }}"></script>
<script src="{{ asset('js/switchToggle.js') }}"></script>
@endpush
