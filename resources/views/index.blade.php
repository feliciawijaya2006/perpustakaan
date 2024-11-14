<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Perpustakaan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f9f9f9;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .table-container {
            margin-top: 20px;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .btn-container {
            text-align: center;
            margin-bottom: 20px;
        }
        .btn {
            padding: 10px 20px;
            margin: 5px;
            cursor: pointer;
            border: none;
            background-color: #4CAF50;
            color: white;
            font-size: 16px;
            border-radius: 5px;
        }
        .btn:hover {
            background-color: #45a049;
        }
        .pagination {
            text-align: center;
        }
        .pagination a {
            padding: 8px 16px;
            margin: 0 4px;
            text-decoration: none;
            color: #4CAF50;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .pagination a:hover {
            background-color: #ddd;
        }
    </style>
</head>
<body>
    <h1>Data Tabel</h1>

    <!-- Buttons to switch between tables -->
    <div class="btn-container">
        <button class="btn" onclick="showTable('books')">Buku</button>
        <button class="btn" onclick="showTable('journals')">Jurnal</button>
        <button class="btn" onclick="showTable('cds')">CD</button>
        <button class="btn" onclick="showTable('fyps')">FYP</button>
        <button class="btn" onclick="showTable('newspapers')">Newspapers</button>
    </div>

    <!-- Table for Books -->
    <div id="books" class="table-container" style="display: none;">
        <h2>Daftar Buku</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Judul Buku</th>
                    <th>Nama Penerbit</th>
                    <th>Tahun Terbit</th>
                    <th>Harga</th>
                    <th>Stok</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)
                    <tr>
                        <td>{{ $book->id }}</td>
                        <td>{{ $book->judulbuku }}</td>
                        <td>{{ $book->namapenerbit }}</td>
                        <td>{{ $book->tahunterbit }}</td>
                        <td>{{ $book->harga }}</td>
                        <td>{{ $book->stok }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $books->links() }}
    </div>

    <!-- Table for Journals -->
    <div id="journals" class="table-container" style="display: none;">
        <h2>Daftar Jurnal</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Judul Jurnal</th>
                    <th>Nama Pembuat</th>
                    <th>Tahun Terbit</th>
                    <th>Jumlah Halaman</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($journals as $journal)
                    <tr>
                        <td>{{ $journal->id }}</td>
                        <td>{{ $journal->juduljurnal }}</td>
                        <td>{{ $journal->namapembuat }}</td>
                        <td>{{ $journal->tahunterbit }}</td>
                        <td>{{ $journal->jumlahhalaman }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $journals->links() }}
    </div>

    <!-- Table for CD -->
    <div id="cds" class="table-container" style="display: none;">
        <h2>Daftar CD</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Judul CD</th>
                    <th>Nama Penerbit</th>
                    <th>Nama Artis</th>
                    <th>Tahun rilis</th>
                    <th>Harga</th>
                    <th>Stok</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cds as $cd)
                    <tr>
                        <td>{{ $cd->id }}</td>
                        <td>{{ $cd->judulcd }}</td>
                        <td>{{ $cd->namapenerbit }}</td>
                        <td>{{ $cd->penciptacd }}</td>
                        <td>{{ $cd->tahunterbit }}</td>
                        <td>{{ $cd->harga }}</td>
                        <td>{{ $cd->stok }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $cds->links() }}
    </div>

    <!-- Table for FYP -->
    <div id="fyps" class="table-container" style="display: none;">
        <h2>Daftar FYP</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Judul FYP</th>
                    <th>Nama Mahasiswa</th>
                    <th>Tahun Terbit</th>
                    <th>Jumlah Halaman</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($fyps as $fyp)
                    <tr>
                        <td>{{ $fyp->id }}</td>
                        <td>{{ $fyp->judulfyp }}</td>
                        <td>{{ $fyp->namapenulis }}</td>
                        <td>{{ $fyp->tahunterbit }}</td>
                        <td>{{ $fyp->jumlahhalaman }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $fyps->links() }}
    </div>

    <!-- Table for Newspapers -->
    <div id="newspapers" class="table-container" style="display: none;">
        <h2>Daftar Newspapers</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tanggal terbit</th>
                    <th>Nama Penerbit</th>
                    <th>Harga</th>
                    <th>Stok</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($newspapers as $newspaper)
                    <tr>
                        <td>{{ $newspaper->id }}</td>
                        <td>{{ $newspaper->tanggalterbit }}</td>
                        <td>{{ $newspaper->namapenerbit }}</td>
                        <td>{{ $newspaper->harga }}</td>
                        <td>{{ $newspaper->stok }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $newspapers->links() }}
    </div>

    <script>
        function showTable(tableName) {
            const tables = ['books', 'journals', 'cds', 'fyps', 'newspapers'];
            tables.forEach(function(table) {
                document.getElementById(table).style.display = table === tableName ? 'block' : 'none';
            });
        }

        // Set default table to be shown
        showTable('books');
    </script>
</body>
</html>
