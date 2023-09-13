@extends('layouts.index')

@section('content')

<h1>User Accounts</h1>

<table border="1">
    <thead>
        <tr>
            <th>NIK</th>
            <th>Nama</th>
            <th>Jabatan</th>
            <th>Username</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($userAccounts as $userAccount)
        <tr>
            <td>{{ $userAccount->nik }}</td>
            <td>{{ $userAccount->nama }}</td>
            <td>{{ $userAccount->jabatan }}</td>
            <td>{{ $userAccount->username }}</td>
            <td>
                <a href="#" class="btn btn-primary">Edit</a>
                <form action="{{ route('deleted', $userAccount->nik) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection