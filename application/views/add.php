<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <form action="<?= site_url('stanting/proses'); ?>" method="post">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Anak</label>
                <input type="text" class="form-control" id="nama" name="Nama_anak">
            </div>
            <div class="mb-3">
                <label for="tanggal_pengukuran" class="form-label">Tanggal Pengukuran</label>
                <input type="date" class="form-control" id="tanggal_pengukuran" name="Tanggal_pengukuran">
            </div>
            <div class="mb-3">
                <label for="bulan" class="form-label">Umur Bulan</label>
                <input type="text" class="form-control" name="Bulan" id="bulan">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Pilih Jenis Kelamin</label>
                <select id="" class="form-select" name="Jenis_kelamin">
                    <option value="Laki-laki">Laki - laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="berat_badan" class="form-label">berat badan (kg)</label>
                <input type="text" class="form-control" name="Berat_badan" id="berat_badan">
            </div>
            <div class="mb-3">
                <label for="tinggi_badan" class="form-label">tinggi badan (cm)</label>
                <input type="text" class="form-control" name="Tinggi_badan" id="tinggi_badan">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</html>