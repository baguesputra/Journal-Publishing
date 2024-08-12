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

   <h3>Report of Author</h3>

    <table class="static" align="center" rules="all" border="5px">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Birth</th>
            <th>Nip</th>
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
       
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $data->nama}}</td>
            <td>{{ $data->tgl_lahir}}</td>
            <td>{{ $data->nip}}</td>
            <td>{{ $data->jk}}</td>
            <td>{{ $data->instansi}}</td>
            <td>{{ $data->negara}}</td>
            <td>{{ $data->kota}}</td>
            <td>{{ $data->kode_pos}}</td>
            <td>{{ $data->alamat}}</td>
            <td>{{ $data->email}}</td>
             <td>{{ $data->no_hp}}</td>
        </tr>
      
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