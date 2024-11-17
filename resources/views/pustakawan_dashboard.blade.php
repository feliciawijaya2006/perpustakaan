<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pustakawan Dashboard</title>
    <style>
    /* Styling umum untuk halaman */
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f7fc;
        color: #333;
        margin: 0;
        padding: 0;
    }

    h1, h2 {
        color: #4a4a4a;
    }

    /* Styling untuk container */
    .container {
        width: 90%; /* Lebar 90% dari layar */
        max-width: 1200px; /* Maksimum lebar 1200px */
        margin: 0 auto; /* Pusatkan konten */
        padding: 20px;
    }

    .btn-container {
        margin-bottom: 20px;
    }

    .btn-container button {
        background-color: #007bff;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        margin: 5px;
        transition: background-color 0.3s;
    }

    .btn-container button:hover {
        background-color: #0056b3;
    }

    /* Styling untuk tabel */
    table {
        width: 100%;
        margin-top: 20px;
        border-collapse: collapse;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    th, td {
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #007bff;
        color: white;
    }

    td {
        background-color: #fff;
    }

    tr:hover td {
        background-color: #f1f1f1;
    }

    /* Styling untuk alert */
    .alert {
        padding: 15px;
        margin-bottom: 20px;
        background-color: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
        border-radius: 5px;
    }

    /* Responsive Design */
    @media screen and (max-width: 768px) {
        table {
            font-size: 14px;
        }

        th, td {
            padding: 8px;
        }

        .btn-container button {
            font-size: 14px;
            padding: 8px 15px;
        }
    }
</style>
</head>
<body>
    <div class="container"> <!-- Tambahkan kontainer untuk pembatas lebar -->
        <h1>Selamat datang, Pustakawan!</h1>
        <h2>Menu Pengajuan Peminjaman</h2>
        <div class="btn-container">
        <form action="{{ route('pengajuan') }}" method="GET">
            <button type="submit">Pengajuan Peminjaman</button>
        </form>
</div>
        <h2>Menu Add Items</h2>
        <!-- Tombol Menambah Data -->
        <div class="btn-container">
            <!-- Buku -->
            <form action="{{ route('pustakawan.addBook') }}" method="POST">
                @csrf
                <div>
                    <label for="judulbuku">Judul Buku</label>
                    <input type="text" name="judulbuku" required>
                </div>
                <div>
                    <label for="namapenerbit">Nama Penerbit</label>
                    <input type="text" name="namapenerbit" required>
                </div>
                <div>
                    <label for="jenisbuku">Jenis Buku</label>
                    <input type="text" name="jenisbuku" required>
                </div>
                <div>
                    <label for="tahunterbit">Tahun Terbit</label>
                    <input type="number" name="tahunterbit" required>
                </div>
                <div>
                    <label for="harga">Harga</label>
                    <input type="number" name="harga" required>
                </div>
                <div>
                    <label for="stok">Stok</label>
                    <input type="number" name="stok" required>
                </div>
                <!-- <div>
                    <label for="last_updated">Last Updated</label>
                    <input type="number" name="last_updated" required>
                </div> -->
                <button type="submit">Tambah Buku</button>
            </form>
        <!-- Jurnal -->
        <form action="{{ route('pustakawan.addJournal') }}" method="POST">
            @csrf
            <div>
                <label for="juduljurnal">Judul Jurnal</label>
                <input type="text" name="juduljurnal" required>
            </div>
            <div>
                <label for="namapembuat">Nama Penulis</label>
                <input type="text" name="namapembuat" required>
            </div>
            <div>
                <label for="tahunterbit">Tahun terbit</label>
                <input type="number" name="tahunterbit" required>
            </div>
            <div>
                <label for="jumlahhalaman">Jumlah Halaman</label>
                <input type="number" name="jumlahhalaman" required>
            </div>
            <!-- <div>
                <label for="last_updated">Last Updated</label>
                <input type="number" name="last_updated" required>
            </div> -->
            <button type="submit">Tambah Jurnal</button>
        </form>
        <!-- CD -->
        <form action="{{ route('pustakawan.addCD') }}" method="POST">
            @csrf
            <div>
                <label for="judulcd">Judul CD</label>
                <input type="text" name="judulcd" required>
            </div>
            <div>
                <label for="namapenerbit">Nama Label</label>
                <input type="text" name="namapenerbit" required>
            </div>
            <div>
                <label for="penciptacd">Nama Pencipta</label>
                <input type="text" name="penciptacd" required>
            </div>
            <div>
                <label for="tahunterbit">Tahun Terbit</label>
                <input type="number" name="tahunterbit" required>
            </div>
            <div>
                <label for="harga">Harga</label>
                <input type="number" name="harga" required>
            </div>
            <div>
                <label for="stok">Stok</label>
                <input type="number" name="stok" required>
            </div>
            <button type="submit">Tambah CD</button>
        </form>
        
        <!-- FYP -->
        <form action="{{ route('pustakawan.addFYP') }}" method="POST">
            @csrf
            <div>
                <label for="judulfyp">Judul FYP</label>
                <input type="text" name="judulfyp" required>
            </div>
            <div>
                <label for="namapembuat">Nama Penulis</label>
                <input type="text" name="namapembuat" required>
            </div>
            <div>
                <label for="tahunterbit">Tahun Terbit</label>
                <input type="date" name="tahunterbit" required>
            </div>
            <div>
                <label for="jumlahhalaman">Jumlah Halaman</label>
                <input type="number" name="jumlahhalaman" required>
            </div>
            <button type="submit">Tambah FYP</button>
        </form>

        <!-- Newspapers -->
        <form action="{{ route('pustakawan.addNewspaper') }}" method="POST">
            @csrf
            <div>
                <label for="tanggalterbit">Tanggal Terbit</label>
                <input type="date" name="tanggalterbit" required>
            </div>
            <div>
                <label for="namapenerbit">Nama Penerbit</label>
                <input type="text" name="namapenerbit" required>
            </div>
            <div>
                <label for="harga">Harga</label>
                <input type="number" name="harga" required>
            </div>
            <div>
                <label for="stok">Stok</label>
                <input type="number" name="stok" required>
            </div>
            <button type="submit">Tambah Newspapers</button>
        </form>

        <!-- Peringatan Pembaruan jika 3 Bulan Tidak Ada Penambahan -->
        @if($recentBooks == 0 || $recentJournals == 0 || $recentCds == 0 || $recentFyps == 0 || $recentNewspapers == 0)
        <div class="alert">
            <strong>Perhatian!</strong> Tidak ada pembaruan untuk materi dalam 3 bulan terakhir. Harap periksa publikasi atau pembaruan baru!
        </div>
        @endif

        <!-- Daftar Buku yang Ada di Database -->
        <h2>Daftar Buku</h2>
        <table>
            <thead>
                <tr>
                    <th>Judul Buku</th>
                    <th>Nama Penerbit</th>
                    <th>Jenis Buku</th>
                    <th>Tahun Terbit</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <!-- <th>Last Updated</th> -->
                </tr>
            </thead>
            <tbody>
            @foreach ($books as $book)
                <tr>
                    <td>{{ $book->judulbuku }}</td>
                    <td>{{ $book->namapenerbit }}</td>
                    <td>{{ $book->jenisbuku }}</td>
                    <td>{{ $book->tahunterbit }}</td>
                    <td>{{ $book->harga }}</td>
                    <td>{{ $book->stok }}</td>
                    <!-- <td>{{ $book->last_updated }}</td> -->
                </tr>
            @endforeach
            </tbody>
        </table>

        <!-- Daftar Jurnal yang Ada di Database -->
        <h2>Daftar Jurnal</h2>
        <table>
            <thead>
                <tr>
                    <th>Judul Jurnal</th>
                    <th>Nama Penulis</th>
                    <th>Tahun Terbit</th>
                    <th>Jumlah Halaman</th>
                    <!-- <th>Last Updated</th> -->
                </tr>
            </thead>
            <tbody>
            @foreach ($journals as $journal)
                <tr>
                    <td>{{ $journal->juduljurnal }}</td>
                    <td>{{ $journal->namapembuat }}</td>
                    <td>{{ $journal->tahunterbit }}</td>
                    <td>{{ $journal->jumlahhalaman }}</td>
                    <!-- <td>{{ $book->last_updated }}</td> -->
                </tr>
            @endforeach
            </tbody>
        </table>

        <!-- Daftar CD yang Ada di Database -->
        <h2>Daftar CD</h2>
        <table>
            <thead>
                <tr>
                    <th>Judul CD</th>
                    <th>Nama Label</th>
                    <th>Nama Pencipta</th>
                    <th>Tahun Terbit</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <!-- <th>Last Updated</th> -->
                </tr>
            </thead>
            <tbody>
            @foreach ($cds as $cd)
                <tr>
                    <td>{{ $cd->judulcd }}</td>
                    <td>{{ $cd->namapenerbit }}</td>
                    <td>{{ $cd->penciptacd }}</td>
                    <td>{{ $cd->tahunterbit }}</td>
                    <td>{{ $cd->harga }}</td>
                    <td>{{ $cd->stok }}</td>
                    <!-- <td>{{ $book->last_updated }}</td> -->
                </tr>
            @endforeach
            </tbody>
        </table>

        <!-- Daftar FYP yang Ada di Database -->
        <h2>Daftar FYP</h2>
        <table>
            <thead>
                <tr>
                    <th>Judul FYP</th>
                    <th>Nama Penulis</th>
                    <th>Tahun Terbit</th>
                    <th>Jumlah Halaman</th>
                    <!-- <th>Last Updated</th> -->
                </tr>
            </thead>
            <tbody>
            @foreach ($fyps as $fyp)
                <tr>
                    <td>{{ $fyp->judulfyp }}</td>
                    <td>{{ $fyp->namapembuat }}</td>
                    <td>{{ $fyp->tahunterbit }}</td>
                    <td>{{ $fyp->jumlahhalaman }}</td>
                    <!-- <td>{{ $book->last_updated }}</td> -->
                </tr>
            @endforeach
            </tbody>
        </table>

        <!-- Daftar Newspapers yang Ada di Database -->
        <h2>Daftar Newspapers</h2>
        <table>
            <thead>
                <tr>
                    <th>Tanggal Terbit</th>
                    <th>Nama Penerbit</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <!-- <th>Last Updated</th> -->
                </tr>
            </thead>
            <tbody>
            @foreach ($newspapers as $newspaper)
                <tr>
                    <td>{{ $newspaper->tanggalterbit }}</td>
                    <td>{{ $newspaper->namapenerbit }}</td>
                    <td>{{ $newspaper->harga }}</td>
                    <td>{{ $newspaper->stok }}</td>
                    <!-- <td>{{ $book->last_updated }}</td> -->
                </tr>
            @endforeach
            </tbody>
        </table>

        <!-- Daftar Siswa yang Meminta Akses
        <h2>Daftar Siswa yang Meminta Akses</h2>
        <table>
            <thead>
                <tr>
                    <th>Nama Siswa</th>
                    <th>Materi yang Diminta</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($requests as $request)
                <tr>
                    <td>{{ $request->student_name }}</td>
                    <td>{{ $request->material_type }}</td>
                    <td>
                        <form action="{{ route('accept.request', $request->id) }}" method="POST">
                            @csrf
                            <button type="submit" name="action" value="accept">Terima</button>
                        </form>
                        <form action="{{ route('reject.request', $request->id) }}" method="POST">
                            @csrf
                            <button type="submit" name="action" value="reject">Tolak</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table> -->

        <!-- Menampilkan pesan sukses atau error -->
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @elseif(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif
    </div> <!-- Tutup kontainer -->
</body>
</html>
