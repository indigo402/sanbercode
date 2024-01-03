@extends('layouts.master')

@section('judul')
Halaman Edit game
@endsection

@section('content')

<form action="/game/{{$game->id}}" method="POST" id="game-edit-form">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label>Game Name</label>
        <input type="text" name="name" value="{{$game->name}}" class="form-control">
    </div>
    @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="form-group">
        <label>Developer</label>
        <input type="text" name="developer" value="{{$game->developer}}" class="form-control">
        @error('developer')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label>Year</label>
        <input type="text" name="year" value="{{$game->year}}" class="form-control">
        @error('year')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="exampleFormControlSelect1">Platform</label>
        <select name="platform" class="form-control">
            @foreach($platforms as $platform)
                <option value="{{ $platform->id }}" @if($platform->id == $selectedPlatformId) selected @endif>{{ $platform->name }}</option>
            @endforeach
        </select>
        @error('platform')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label>Gameplay</label>
        <textarea name="gameplay" class="form-control" cols="30" rows="10">{{$game->gameplay}}</textarea>
        @error('gameplay')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.getElementById('game-edit-form').addEventListener('submit', function(event) {
        event.preventDefault();

        Swal.fire({
            title: "Berhasil!",
            text: "Berhasil Merubah Data",
            icon: "success",
            confirmButtonText: "Cool",
        });

        this.submit();
    });
</script>

@endsection
