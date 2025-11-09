<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Pasien</th>
                <th>Nama Pasien</th>
                <th>tgl lahir</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($list_pasien as $pasien)
            <tr>
                <td>{{ $loop->iteration}}</td>
                <td>{{ $pasien->kode}}</td>
                <td>{{ $pasien->nama}}</td>
                <td>{{ $pasien->tgl_lahir}}</td>
                <td>
                    <a href="">View</a>
                    <a href="">Edit</a>
                    <a href="">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>