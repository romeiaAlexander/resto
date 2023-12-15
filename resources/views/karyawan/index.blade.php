@extends('layouts.main')

@section('content')
<main>
<h1>Karyawan</h1>

    <a href="{{ route('karyawan.create') }}" class="btn btn-primary mb-2">Create Karyawan</a>

    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nama</th>
            <th scope="col">NIK</th>
            <th scope="col">Jabatan</th>
            <th scope="col">Alamat</th>
            <th scope="col">No. HP</th>
            <th scope="col">Email</th>
            <th scope="col">Status</th>
            <th scope="col">Foto</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($karyawans as $row)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $row->nama }}</td>
                    <td>{{ $row->nik }}</td>
                    <td>{{ $row->jabatan }}</td>
                    <td>{{ $row->alamat }}</td>
                    <td>{{ $row->no_hp }}</td>
                    <td>{{ $row->email }}</td>
                    <td>{{ $row->status }}</td>
                    <td>{{ $row->foto }}</td>
                    <td>
                        <form action="{{ route('karyawan.destroy', $row->id) }}" method="post">
                            <a href="#" class="btn btn-sm btn-warning">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
      </table>

</main>
@endsection
