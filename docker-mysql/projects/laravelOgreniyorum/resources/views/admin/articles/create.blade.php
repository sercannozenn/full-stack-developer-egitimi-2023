@extends("layouts.admin")

@section("css")

@endsection

@section("icerik")
    <x-admin.layouts.card class="w-50 mx-auto">
        <x-slot name="title">
            Yeni Makale Ekle
        </x-slot>

        <x-slot name="content">
            <form action="" class="w-100 text-start">
                <x-admin.elements.input
                    :labelClasses="'text-danger'"
                    :id="'name'"
                    :name="'name'"
                    :inputClasses="''"
                    :placeholder="'Makale Adı'"
                    :isDisabled="false"
                    :type="'text'"
                    :parentClasses="''"
                >
                    <x-slot:label>
                        Makale Adı
                    </x-slot:label>
                </x-admin.elements.input>

                @php
                    $options = [
                                 '-1' => 'Kategori Seçin',
                                 '1'  => 'PHP',
                                 '2'  => 'C#'
                               ];
                @endphp
                <x-admin.elements.select
                    :labelClasses="'mb-2'"
                    :id="'category'"
                    :name="'category'"
                    :isDisabled="false"
                    :parentClasses="'mt-3'"
                    :options="$options"
{{--                    :defaultValue="'2'"--}}
                >
                    <x-slot:label>
                        Makale Kategori
                    </x-slot:label>

                </x-admin.elements.select>

                <x-admin.elements.textarea
                    :labelClasses="''"
                    :id="'articleContent'"
                    :name="'articleContent'"
                    :inputClasses="''"
                    :placeholder="'Makale İçerik'"
                    :isDisabled="false"
                    :parentClasses="'mt-3'"
                    :rows="'5'"
                    style="resize:none"
                >
                    <x-slot:label>
                        Makale İçerik
                    </x-slot:label>
                </x-admin.elements.textarea>

                <x-admin.elements.input
                    :type="'checkbox'"
                    :name="'status'"
                    :id="'status'"
                    :input-classes="'me-3'"
                    :default-value="'1'"
                    :label-classes="'mb-2'"
                    :parent-classes="'mt-3'"
                    :isLabelAfter="true"
                >
                    <x-slot name="label">
                        Makale Yayınlansın mı?
                    </x-slot>

                </x-admin.elements.input>
                <hr>
                <x-admin.elements.input
                    :id="'btnSave'"
                    :inputClasses="'btn btn-success w-100'"
                    :defaultValue="'Kaydet'"
                    :type="'button'"
                    :parentClasses="'mt-3'"
                />
            </form>
        </x-slot>

        <x-slot name="footer">
            Lorem ipsum dolor.
        </x-slot>

    </x-admin.layouts.card>

@endsection

@section("js")

@endsection
