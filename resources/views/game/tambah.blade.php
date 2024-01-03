@extends('layouts.master')

@section('judul')
Halaman Tambah game
@endsection

@section('content')

<form action="/game" method="POST" id="gameForm">
    @csrf
    <div class="form-group">
        <label>Game Name</label>
        <input type="text" name="name" class="form-control">
    </div>
    @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="form-group">
        <label>Developer</label>
        <input type="text" name="developer" class="form-control">
    </div>
    @error('developer')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="form-group">
        <label>Year</label>
        <input type="text" name="year" class="form-control">
    </div>
    @error('year')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="form-group">
        <label>Gameplay</label>
        <textarea name="gameplay" class="form-control" cols="30" rows="10"></textarea>
    </div>
    @error('gameplay')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="form-group">
        <label for="exampleFormControlSelect1">Platform</label>
        <select class="form-control" id="exampleFormControlSelect1" name="platform">
            @foreach($platforms as $platform)
                <option value="{{ $platform->id }}">{{ $platform->name }}</option>
            @endforeach
        </select>
    </div>

    @error('platform')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <button type="submit" class="btn btn-primary">Submit</button>
</form>

<!-- Include SweetAlert2 script -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.getElementById('gameForm').addEventListener('submit', function(event) {
        event.preventDefault();

        Swal.fire({
            title: "Berhasil!",
            text: "Berhasil Menambahkan Data",
            icon: "success",
            confirmButtonText: "Cool",
        });

        this.submit();
    });
</script>

@endsection
