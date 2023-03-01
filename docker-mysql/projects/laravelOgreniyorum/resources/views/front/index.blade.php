@extends("layouts.front")

@section("css")

@endsection

@section("icerik")

    <hr>
    <hr>
    <hr>

    <form action="" method="POST">
        @csrf
        @auresMethod("put")

        <input type="text" name="fullname">
        <button type="submit">Gönder</button>
    </form>

    <hr>
    <hr>
    <hr>
    <hr>
    İçerik Alanı
    <hr>
    Gelen Yaş Değeri: {{ $age ?? @$person->age }}
    <hr>
    Gelen 2.Değer: {{ $sercan ?? @$person->aa }}
    <hr>
    @if(isset($person) && isset($person->age))
        @switch($person->age)
            @case(10)
                Çocuk
            @break
            @case(20)
                Genç
            @break
            @default
            Yaşlandın
        @endswitch
    @else
        gelmedi
    @endif
    <hr>
    <hr>
    <hr>
@endsection

@section("js")

@endsection
