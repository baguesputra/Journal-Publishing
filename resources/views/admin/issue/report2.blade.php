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
    <title>Report of Current Issue</title>
</head>
<body>
    <table>
        <tr>
            <td><img src="{{ asset('img/logo2.png') }}" width="95" height="95"></td>
            <td width="525px"><center>
                <font size="4"><b>Asia Pasific Journal Of Multidisciplinary Research</b></font><br>
                <font>Research and Statistic Center</font><br>
                <font>Lyceum of the Philippines University</font><br>
                <font>Capital Site, Batangas City, Philippine</font><br>
                <font>Telephone: +63 43 723 0706 | Location: 165/116 | www.apjmr.com</font>
            </center></td>    
        </tr>
   </table>
   <hr>

   <h3>Report of Current Issue</h3>

    <table class="static" align="center" rules="all" border="5px">
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Author</th>
            <th>Date</th>
            <th>Page</th>
            <th>Year</th>
            <th>Volume</th>
            <th>File</th>
        </tr>
    </thead>
        <?php $no = 1; ?>
       
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $data->judul}}</td>
            <td>{{ $data->penulis}}</td>
            <td>{{ $data->tgl_masuk}}</td>
            <td>{{ $data->hal}}</td>
            <td>{{ $data->tahun}}</td>
            <td>{{ $data->vol}}</td>
             <td>{{ $data->document}}</td>
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