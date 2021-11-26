<!DOCTYPE html>
<html>

<head>
  <title>Data Mahasiswa</title>
</head>

<body>
  <style type="text/css">
    table tr td,
    table tr th {
      font-size: 9pt;
    }
  </style>
  <center>
    <h5>Data Mahasiswa</h4>
    </h5>
  </center>

  <table class='table table-bordered'>
    <thead>
      <tr>
        <th>No</th>
        <th>NPM</th>
        <th>Nama</th>
        <th>Jurusan</th>
        <th>Alamat</th>
      </tr>
    </thead>
    <tbody>
      @php $i=1 @endphp
      @foreach($mahasiswas as $mahasiswa)
      <tr>
        <td>{{ $i++ }}</td>
        <td>{{$mahasiswa->npm}}</td>
        <td>{{$mahasiswa->nama}}</td>
        <td>{{$mahasiswa->jurusan->title}}</td>
        <td>{{$mahasiswa->alamat}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>

</body>

</html>