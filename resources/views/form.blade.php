<!-- resources/views/access_request/form.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Pengajuan Akses</h2>
        <form action="{{ route('access.request.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="access_type">Jenis Akses</label>
                <input type="text" class="form-control" id="access_type" name="access_type" required>
            </div>
            <div class="form-group">
                <label for="reason">Alasan Pengajuan</label>
                <textarea class="form-control" id="reason" name="reason" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Ajukan Akses</button>
        </form>
    </div>
@endsection
