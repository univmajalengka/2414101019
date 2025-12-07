<!DOCTYPE html>
<html>
<head>
    <title>Formulir Pendaftaran Siswa Baru</title>
</head>
<body>

<h3>Formulir Pendaftaran Siswa Baru</h3>

<form action="proses-pendaftaran-2.php" method="POST">
    <p>
        <label>Nama</label><br>
        <input type="text" name="nama" required>
    </p>

    <p>
        <label>Alamat</label><br>
        <textarea name="alamat" required></textarea>
    </p>

    <p>
        <label>Jenis Kelamin</label><br>
        <input type="radio" name="jenis_kelamin" value="laki-laki" required> Laki-laki
        <input type="radio" name="jenis_kelamin" value="perempuan"> Perempuan
    </p>

    <p>
        <label>Agama</label><br>
        <select name="agama" required>
            <option value="">Pilih</option>
            <option>Islam</option>
            <option>Kristen</option>
            <option>Hindu</option>
            <option>Budha</option>
            <option>Atheis</option>
        </select>
    </p>

    <p>
        <label>Sekolah Asal</label><br>
        <input type="text" name="sekolah_asal" required>
    </p>

    <input type="submit" name="daftar" value="Daftar">
</form>

</body>
</html>
