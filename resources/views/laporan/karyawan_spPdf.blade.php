<?php
    use App\Models\karyawan_sp;
?>


@section('content')
    
    <title>Laporan Daftar Karyawan</title>
    <style>
        row {
            margin: 100px;
            padding-left: 50px;
        }
    </style>

    <head>
        <h1 style="text-align: center;">UAS Business Application Programming</h1><br>
        
    </head>
    <body>
      <?php
          echo '<img src="data:image/png;base64,' . $logo_image . '" width="200px;"/>';
        ?>
        {{-- <img src="{{ asset("template/dist/img/Logo_UPH.gif") }}" alt="" style="margin: 0 0 0 40%; width:20%"> --}}
        <br>
        <br>
        <div style="text-align: center">
            <b style="font-size: 150%;">NIM: 03081200054<br>
            <b>Nama: Eric<br>
            <b>Kelas: 20SI2<br>
        </div>
        <br>
        <hr>

        <table class="table-dark">
            <thead class="table-dark">
              <tr>
                <th scope="col">Nama</th>
                <th scope="col">identification_no</th>
                <th scope="col">address</th>
                <th scope="col">Gender</th>
                <th scope="col">Payslip_amount</th>
                <th scope="col">Alasan_SP</th>
              </tr>
            </thead>
            <tbody>
                <?php
          $rows = DB::select('select name, identification_no, address, gender, payslip_amount, alasan_sp from karyawan_sp');
          foreach($rows as $row) {
            echo "<tr>";
            // echo "<td>".$no."</td>";
            echo "<td>".$row->name."</td>";
            echo "<td>".$row->identification_no."</td>";
            echo "<td>".$row->address."</td>";
            echo "<td>".$row->gender."</td>";
            echo "<td>".$row->payslip_amount."</td>";
            echo "<td>".$row->alasan_sp."</td>";
            echo "<tr>";
            // $no+=1;
            }
                
              ?>
            </tbody>
          </table>
    </body>
</html>