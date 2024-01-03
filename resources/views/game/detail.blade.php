@extends('layouts.master')

@section('judul')
    <h1 class="text-blue">{{$game->name}} {{$game->year}}</h1>
@endsection

@section('content')

    <h3>Developer: {{$game->developer}}</h3>
    <h2>Gameplay</h2>
    <p>{{$game->gameplay}}</p>
    <h2>Platform</h2>

    {{-- Memeriksa apakah $platform tidak null sebelum mengakses properti --}}
    @if ($platform)
        <a class="btn btn-primary btn-sm mb-20 text-white">{{$platform->name}}</a>
    @else
        <p>Data platform tidak tersedia</p>
    @endif

    <br><br><a href="/game" class="btn btn-secondary btn-sm" >Kembali</a>

@endsection
