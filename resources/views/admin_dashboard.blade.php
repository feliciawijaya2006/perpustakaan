<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
</head>
<body>
    <h1>Selamat datang, Admin!</h1>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif
    @if(session('error'))
        <p style="color: red;">{{ session('error') }}</p>
    @endif

    <!-- Form untuk menambah pustakawan baru -->
    <h2>Tambah Pustakawan Baru</h2>
    <form action="{{ route('admin.addPustakawan') }}" method="POST">
        @csrf
        <label for="name">Nama:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>

        <button type="submit">Tambah Pustakawan</button>
    </form>

    <!-- Daftar pustakawan -->
    <h2>Daftar Pustakawan</h2>
    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pustakawans as $pustakawan)
                <tr>
                    <td>{{ $pustakawan->name }}</td>
                    <td>{{ $pustakawan->email }}</td>
                    <td>
                        <!-- Form untuk menghapus pustakawan -->
                        <form action="{{ route('admin.removePustakawan', $pustakawan->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <form action="{{ route('logout') }}" method="POST" style="display: inline;"><br>
        @csrf
        <button type="submit">Logout</button>
    </form>
</body>
</html>
