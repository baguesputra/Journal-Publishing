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
    <title>LOA - Author</title>
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
   <br>
  

   <h2 align="center">LETTER OF ACCEPTANCE</h2>
   <hr>

   <div>
   <p><b>Dear Author'(s)</b></p>
   <p>Thanks For the submission off your article's to ouur journal APJMR. It is great pleasure to inform you that,</p>
   <p>after peer-review process, your article has been accepted and considered for publication in ASIA PASIFIC </p>
   <p>JOURNAL OF MULTIDISCIPPLINARY RESEARCH (APJMR) E-ISSN 2350-8842 P-ISSN 2350-7756</p>
   </div>
   <br>

   <table class="static" align="center" rules="all" border="5px" style="width:95%;">
       <tr>
           <td style="padding: 15px;">Title</td>
           <td >&#8287;{{ $data->judul}}</td>
       </tr>
       <tr>
           <td style="padding: 15px;">Abstrak</td>
           <td >&#8287;{{ $data->abstrak}}</td>
       </tr>
       <tr>
           <td style="padding: 15px;">Author(s) Name</td>
           <td >&#8287;{{ $data->pengaju}}</td>
       </tr>
       <tr>
           <td style="padding: 15px;">Status</td>
           <td>&#8287;{{ $data->status}}</td>
       </tr>
   </table>

    <table align="right" style=" padding-top:150px; padding-right:20px;">
        <tr>
        
            <td align="center">
            <font>Batangas, {{ $tgl }}</font><br>
            <font>Editor in Chief</font><br><br><br><br><br><br>
            <font>Dr. Norma L.Menez</font>
            </td>
    
        </tr>
    
    </table>
    
</body>
</html>
<script>
    window.print();
</script>