@extends("layouts.front")
@section("css")
@endsection

@section("icerik")
    İletişim Sayfası
    <hr>
    <div class="col-8 mx-auto">
        <form action="{{ route("contact") }}" method="POST">
            @csrf
            {{--        <input type="hidden" name="_token" value="{{ csrf_token() }}">--}}

            <input type="text" class="form-control" name="fullname">
            <br>
            <input type="email" class="form-control" name="email">
            <br>
            <button class="btn btn-success" type="submit">Gönder</button>

        </form>
    </div>

    <hr>


    <div class="col-8 mx-auto">
        İletişim Sayfası 2
        <hr>
        <form action="{{ route("user", [
    'id' => 5
    ,
    "name" => "aygun"
    ]) }}" method="POST">
            @csrf
            {{--        <input type="hidden" name="_token" value="{{ csrf_token() }}">--}}

            <input type="text" class="form-control" name="fullname">
            <br>
            <input type="email" class="form-control" name="email">
            <br>
            <button class="btn btn-success" type="submit">Gönder</button>

        </form>
    </div>
    <hr>
    <div class="col-8 mx-auto">
        Support Form
        <hr>
        <form action="{{ route('support-form.support') }}">
            @csrf
            {{--        <input type="hidden" name="_token" value="{{ csrf_token() }}">--}}

            <input type="text" class="form-control" name="fullname">
            <br>
            <input type="email" class="form-control" name="email">
            <br>
            <button class="btn btn-success" type="submit">Gönder</button>

        </form>
    </div>

    <hr>
    <div class="col-8 mx-auto">
        Support Form
        <hr>
        <form action="{{ route('user.update', ['id' => 9]) }}" method="POST">
            @csrf
            @method('PATCH')
{{--            {{ method_field("PATCH") }}--}}
            {{--        <input type="hidden" name="_token" value="{{ csrf_token() }}">--}}

            <input type="email" class="form-control" name="email">
            <br>
            <button class="btn btn-success" type="submit">Gönder</button>

        </form>
    </div>


    <hr>
    <hr>
    <hr>
    <hr>
    <div class="col-8 mx-auto">
        Put Kullanımı
        <hr>
        <form action="{{ route('user.updateAll', ['id' => 9]) }}" method="POST">
            @csrf
            @method('PUT')
            {{--            {{ method_field("PATCH") }}--}}
            {{--        <input type="hidden" name="_token" value="{{ csrf_token() }}">--}}

            <input type="email" class="form-control" name="email">
            <br>

            <input type="type" class="form-control" name="fullname">
            <br>
            <button class="btn btn-success" type="submit">Gönder</button>

        </form>
    </div>

    <hr>
    <hr>
    <div class="col-8 mx-auto">
        Delete Kullanımı
        <hr>
        <form action="{{ route('user.delete', ['id' => 9]) }}" method="POST">
            @csrf
            @method('DELETE')
            {{--            {{ method_field("PATCH") }}--}}
            {{--        <input type="hidden" name="_token" value="{{ csrf_token() }}">--}}

            <button class="btn btn-success" type="submit">Gönder</button>

        </form>
    </div>
@endsection

@section("js")
@endsection
