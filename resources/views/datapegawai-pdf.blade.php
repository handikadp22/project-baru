<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
</head>
<body>

<h1>Data Pegawai</h1>

<table id="customers">
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Jenis Kelamin</th>
        <th>No hp</th>
        <th>Foto</th>
        <th>Tanggal Dibuat</th>
    </tr>
 @foreach ($data as $dt)
  <tr>
    <td>{{ $loop->iteration}}</td>
    <td>{{ $dt->nama }}</td>
    <td>{{ $dt->jenis_kelamin }}</td>
    <td>{{ $dt->no_hp }}</td>
    <td>
        <img src="{{ asset('fotopegawai/'.$dt->image) }}" alt="" style="width: 50px;">
    </td>
    <td>{{ $dt->created_at->format('D N Y') }}</td>
  </tr>
@endforeach
</table>

</body>
</html>