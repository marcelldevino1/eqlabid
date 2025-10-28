@extends('publik.layout.app')

@section('content')
    {{-- Bera Section --}}
    @include('publik.hero.index')

    {{-- Tentang Section --}}
    @include('publik.about.index')

    {{-- Fitur Section --}}
    @include('publik.fitur.index')

    {{-- Prestasi Section --}}
    @include('publik.prestasi.index')

    {{-- Berita Section --}}
    @include('publik.berita.index')

    {{-- Pendaftaran Section --}}
    @include('publik.daftar.index')

    {{-- Footer Section --}}
    @include('publik.footer.index')

    @include("publik.daftar.pendaftaran_modal")

@endsection