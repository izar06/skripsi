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

<h2>Data Ibu Hamil</h2>

<table id="customers">
  <tr>
    <th>No</th>
    <th>Nama Ibu</th>
    <th>NIK</th>
    <th>Umur</th>
    <th>Alamat</th>
    <th>Masa Kehamilan</th>
  </tr>
  @php
      $no = 1;
  @endphp
  @foreach ($data as $item)
  <tr>
    <td>{{ $no++ }}</td>
    <td>{{ $item->nama_ibu}}</td>
    <td>{{ $item->NIK }}</td>
    <td>{{ $item->umur }}</td>
    <td>{{ $item->alamat }}</td>
    <td>{{ $item->masa_kehamilan }}</td>
  </tr>
      
  @endforeach
</table>

</body>
</html>
