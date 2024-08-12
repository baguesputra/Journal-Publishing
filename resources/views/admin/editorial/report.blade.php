<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=Data, initial-scale=1.0">
    <style>
        table.static{
            position: relative;
            border: 1px solid;
        }


    
    </style>
    <title>Report of Author</title>
</head>
<body>
    <table>
        <tr>
            <td><img src="{{ asset('img/logo2.png') }}" width="95" height="95"></td>
            <td width="780px"><center>
                <font size="4"><b>Asia Pasific Journal Of Multidisciplinary Research</b></font><br>
                <font>Research and Statistic Center</font><br>
                <font>Lyceum of the Philippines University</font><br>
                <font>Capital Site, Batangas City, Philippine</font><br>
                <font>Telephone: +63 43 723 0706 | Location: 165/116 | www.apjmr.com</font>
            </center></td>    
        </tr>
   </table>
   <hr>

   <h3>Report of Editorial Board</h3>

    <table class="static" align="center" rules="all" border="5px">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Birth</th>
            <th>Position</th>
            <th>Gender</th>
            <th>Agency</th>
            <th>State</th>
            <th>City</th>
            <th>Zip</th>
            <th>Address</th>
            <th>Email</th>
            <th>Phone</th>
        </tr>
    </thead>
        <?php $no = 1; ?>
         @foreach($data as $author)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $author->nama}}</td>
            <td>{{ $author->tgl_lahir}}</td>
            <td>{{ $author->jabatan}}</td>
            <td>{{ $author->jk}}</td>
            <td>{{ $author->instansi}}</td>
            <td>{{ $author->negara}}</td>
            <td>{{ $author->kota}}</td>
            <td>{{ $author->kode_pos}}</td>
            <td>{{ $author->alamat}}</td>
            <td>{{ $author->email}}</td>
             <td>{{ $author->no_hp}}</td>
        </tr>
        @endforeach
    </table><br>

    <table align="right" style=" padding-top:50px;">
        <tr>
        
            <td align="center">
            <font>Batangas, {{ $tgl }}</font><br>
            <font>Editor in Chief</font><br><br><br>
            <font>Dr. Norma L.Menez</font>
            </td>
    
        </tr>
    
    </table>
    
</body>
<script>
    window.print();
</script>
</html>