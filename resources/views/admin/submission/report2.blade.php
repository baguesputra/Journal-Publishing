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

   <h3>Report of Review</h3>

   <table>
    
    <tr>
        <td width="280px" height="25px">Name</td>
        <td>: {{ $data->pengaju }}</td>
    </tr>
     <tr>
        <td width="280px" height="25px">Title</td>
        <td>: {{ $data->judul }}</td>
    </tr>
    <tr>
        <td width="280px" height="25px">Date Submission</td>
        <td>: {{$data->tgl_pengajuan}}, {{ \Carbon\Carbon::parse($data->tgl_lahir)->isoFormat('DD-MM-YYYY')}}</td>
    </tr>
</table>
<br>

    <table class="static" align="center" rules="all" border="5px">
    <thead>
        <tr>
            <th>Element</th>
            <th>Scope</th>
            <th>Adequacy</th>
            <th>Completness</th>
            <th>Total</th>
            <th>Grade</th>
        </tr>
    </thead>
        <?php $no = 1; ?>
      
        <tr>
            <td>{{ $data->unsur }}</td>
            <td>{{ $data->ruang_lingkup}}</td>
            <td>{{ $data->kecukupan}}</td>
            <td>{{ $data->kelengkapan}}</td>
            <td>{{ $data->total}}</td>
            <td>{{ $data->nilai}}</td>
           
        </tr>
   
    </table><br>

    <table>
        <tr>
            <td width="280px" height="25px">Commentar</td>
            <td >:{{ $data->komentar}}</td>
        </tr>
    </table>
    <br>

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