@extends('layouts.master')

@section('judul')
Daftar game
@endsection

@section('content')

<a href="/game/create" class="btn btn-primary btn-sm mb-3">Tambah</a>

<table class="table">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Game Name</th>
        <th scope="col">Developer</th>
        <th scope="col">Year</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @forelse ($game as $key => $value)
            <tr>
                <td>{{$key + 1}}</td>
                <td>{{$value->name}}</td>
                <td>{{$value->developer}}</td>
                <td>{{$value->year}}</td>
                <td>
                    <form action="/game/{{$value->id}}" method="POST" id="gameDelete{{$value->id}}">
                        @csrf
                        @method('DELETE')
                        <a href="/game/{{$value->id}}" class="btn btn-info btn-sm">Detail</a>
                        <a href="/game/{{$value->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
                        <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                    </form>
                    <script>
                        document.getElementById('gameDelete{{$value->id}}').addEventListener('submit', function(event) {
                            event.preventDefault();

                            Swal.fire({
                                title: "Apakah yakin ingin menghapus data",
                                text: "Aksi tidak dapat dikembalikan",
                                icon: "warning",
                                showCancelButton: true,
                                confirmButtonText: "Yes, Hapus ",
                                cancelButtonText: "No, cancel!",
                                reverseButtons: true
                            }).then((result) => {
                            if (result.isConfirmed) {
                                // If the user confirms, submit the form
                                this.submit();
                            } else {
                                // If the user cancels, do nothing
                            }
        });
    });
</script>
                </td>
            </tr>
        @empty
            <tr>
                <td>Tidak Ada Data</td>
            </tr>
        @endforelse
    </tbody>
</table>

@endsection
