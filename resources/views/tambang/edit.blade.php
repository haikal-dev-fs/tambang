<!DOCTYPE html>
<html>
<head>
    <title>Edit Tambang</title>
</head>
<body>
    <h2>Edit Data Tambang</h2>

    <form action="{{ route('tambang.update', $tambang->id) }}" method="POST">
        @csrf
        <label>Kode Tambang:</label><br>
        <input type="text" name="kode_tambang" value="{{ $tambang->kode_tambang }}"><br>

        <label>Nama Tambang:</label><br>
        <input type="text" name="nama_tambang" value="{{ $tambang->nama_tambang }}"><br>

        <label>Alamat:</label><br>
        <input type="text" name="alamat" value="{{ $tambang->alamat }}"><br>

        <label>Latitude:</label><br>
        <input type="text" name="lat" value="{{ $tambang->lat }}"><br>

        <label>Longitude:</label><br>
        <input type="text" name="long" value="{{ $tambang->long }}"><br>

        <label>Gambar (opsional):</label><br>
        <input type="text" name="images" value="{{ $tambang->images }}"><br><br>

        <button type="submit">Update</button>
    </form>

    <a href="{{ route('tambang.index') }}">Kembali</a>
</body>
</html>
