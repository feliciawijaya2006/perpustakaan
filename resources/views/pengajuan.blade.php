<!-- resources/views/access_request/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Daftar Pengajuan Akses</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>User</th>
                    <th>Jenis Akses</th>
                    <th>Alasan</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($requests as $index => $request)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $request->user->name }}</td>
                        <td>{{ $request->access_type }}</td>
                        <td>{{ $request->reason }}</td>
                        <td>{{ ucfirst($request->status) }}</td>
                        <td>
                            @if ($request->status == 'pending')
                                <form action="{{ route('access.request.update.status', ['id' => $request->id, 'status' => 'approved']) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-success">Setujui</button>
                                </form>
                                <form action="{{ route('access.request.update.status', ['id' => $request->id, 'status' => 'denied']) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Tolak</button>
                                </form>
                            @else
                                <span class="badge badge-{{ $request->status == 'approved' ? 'success' : 'danger' }}">
                                    {{ ucfirst($request->status) }}
                                </span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
