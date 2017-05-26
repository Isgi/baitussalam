
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <!-- Bootstrap core CSS     -->
    <link href="<?php echo base_url() ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Animation library for notifications   -->
    <link href="<?php echo base_url() ?>assets/css/back/paper-dashboard.css" rel="stylesheet"/>
    <link href="<?php echo base_url() ?>assets/css/back/style.css" rel="stylesheet" />
    <!--  Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="<?php echo base_url() ?>assets/back/css/themify-icons.css" rel="stylesheet">
  </head>
  <body>
      <div style="width:100%;text-align:center;">
        <h4 style="margin-bottom:0px !important">LAPORAN SETORAN BULAN <?php echo date("M Y", strtotime($bln)) ?></h4>
        <h3 style="margin-top:0px; margin-bottom:0px !important">" BAITUSSALAM <?php echo ($data_kelas['nama'] != "" ? 'KELAS '.$data_kelas['nama'].' ' :'') ?>"</h3>
        <strong style="font-size:12">PP Modern Baitussalam Pulerejo Bokoharjo Prambanan Yogyakarta Telp. (0274) 7482539</strong>
      </div>
      <?php $jumlah_keseluruhan = new  SplFixedArray(sizeof($data_jenis_pembayaran));?>
      <div style="width:100%;text-align:center;">
        <h6 style="text-align:left; font-weight: bold;"># SDIT</h6>
        <table border="1" autosize="-10">
          <thead>
            <tr>
              <th style="width: 5mm; text-align:center; font-size:12;padding:5px" rowspan="2">No</th>
              <th style="width: 5cm; text-align:center; font-size:12;padding:5px" rowspan="2">Nama</th>
              <th style="width: 205mm; text-align:center; font-size:12;padding:5px" colspan="<?php echo sizeof($data_jenis_pembayaran) ?>">Rincian Bulanan</th>
              <th style="width: 20mm;text-align:center; font-size:12;padding:5px" rowspan="2">Jml</th>
            </tr>
            <tr>
              {data_jenis_pembayaran}
                <th style="text-align:center; font-size:12;padding:5px">{kode}</th>
              {/data_jenis_pembayaran}
            </tr>
          </thead>
          <tbody>
            <?php
              $i = 1;
              $jumlah_col=new SplFixedArray(sizeof($data_jenis_pembayaran));
              $jumlah_col_row=0;
              foreach ($data_content_SD as $data):
            ?>
              <tr>
                <td style="font-size:12;padding:5px;text-align:center"><?php echo $i ?></td>
                <td style="font-size:12;padding:5px;text-align:left"><?php echo $data->murid ?></td>
                <?php
                  $kode = explode(',', $data->pembayaran_kode);
                  $nominal = explode(',', $data->nominal);
                  $jumlah_row = 0;
                  foreach ($data_jenis_pembayaran as $value=>$data):
                    $status = 0;
                    $nilai_nominal = 0;
                    for ($j=0; $j < sizeof($kode) ; $j++) {
                      if ($data->kode == $kode[$j]) {
                        $status = 1;
                        $nilai_nominal = $nilai_nominal+$nominal[$j];
                      }
                    }
                    if ($status == 1) :
                      $status = 0;
                      $jumlah_row = $jumlah_row + $nilai_nominal;
                    ?>
                      <td style="font-size:12;padding:5px;text-align:right"><?php echo $nilai_nominal ?></td>
                    <?php else: ?>
                      <td style="font-size:12;padding:5px;text-align:right"><?php echo $nilai_nominal ?></td>
                    <?php endif;
                      $jumlah_col[$value]=$jumlah_col[$value]+$nilai_nominal;
                    ?>

                  <?php
                    endforeach;
                    $jumlah_col_row = $jumlah_col_row + $jumlah_row;
                  ?>
                <td style="font-size:12;padding:5px;text-align:right"><?php echo $jumlah_row ?></td>
              </tr>
            <?php
              $i++;
              endforeach;
            ?>
            <tr>
              <td colspan="2" style="font-size:12;padding:5px;text-align:center"><strong>Jumlah</strong></td>
              <?php
                for ($i=0; $i < sizeof($data_jenis_pembayaran) ; $i++) {
                  $jumlah_keseluruhan[$i] = $jumlah_keseluruhan[$i] + $jumlah_col[$i];
              ?>
                <td style="font-size:12;padding:5px;text-align:right"><?php echo $jumlah_col[$i] ?></td>
              <?php
                }
              ?>
              <td style="font-size:12;padding:5px;text-align:right"><?php echo $jumlah_col_row ?></td>
            </tr>
          </tbody>
        </table>
      </div>

      <div style="width:100%;text-align:center;">
        <h6 style="text-align:left; font-weight: bold;"># TKIT</h6>
        <table border="1" autosize="-10">
          <thead>
            <tr>
              <th style="width: 5mm; text-align:center; font-size:12;padding:5px" rowspan="2">No</th>
              <th style="width: 5cm; text-align:center; font-size:12;padding:5px" rowspan="2">Nama</th>
              <th style="width: 205mm; text-align:center; font-size:12;padding:5px" colspan="<?php echo sizeof($data_jenis_pembayaran) ?>">Rincian Bulanan</th>
              <th style="width: 20mm;text-align:center; font-size:12;padding:5px" rowspan="2">Jml</th>
            </tr>
            <tr>
              {data_jenis_pembayaran}
                <th style="text-align:center; font-size:12;padding:5px">{kode}</th>
              {/data_jenis_pembayaran}
            </tr>
          </thead>
          <tbody>
            <?php
              $i = 1;
              $jumlah_col=new SplFixedArray(sizeof($data_jenis_pembayaran));
              $jumlah_col_row=0;
              foreach ($data_content_TK as $data):
            ?>
              <tr>
                <td style="font-size:12;padding:5px;text-align:center"><?php echo $i ?></td>
                <td style="font-size:12;padding:5px;text-align:left"><?php echo $data->murid ?></td>
                <?php
                  $kode = explode(',', $data->pembayaran_kode);
                  $nominal = explode(',', $data->nominal);
                  $jumlah_row = 0;
                  foreach ($data_jenis_pembayaran as $value=>$data):
                    $status = 0;
                    $nilai_nominal = 0;
                    for ($j=0; $j < sizeof($kode) ; $j++) {
                      if ($data->kode == $kode[$j]) {
                        $status = 1;
                        $nilai_nominal = $nilai_nominal+$nominal[$j];
                      }
                    }
                    if ($status == 1) :
                      $status = 0;
                      $jumlah_row = $jumlah_row + $nilai_nominal;
                    ?>
                      <td style="font-size:12;padding:5px;text-align:right"><?php echo $nilai_nominal ?></td>
                    <?php else: ?>
                      <td style="font-size:12;padding:5px;text-align:right"><?php echo $nilai_nominal ?></td>
                    <?php endif;
                      $jumlah_col[$value]=$jumlah_col[$value]+$nilai_nominal;
                    ?>

                  <?php
                    endforeach;
                    $jumlah_col_row = $jumlah_col_row + $jumlah_row;
                  ?>
                <td style="font-size:12;padding:5px;text-align:right"><?php echo $jumlah_row ?></td>
              </tr>
            <?php
              $i++;
              endforeach;
            ?>
            <tr>
              <td colspan="2" style="font-size:12;padding:5px;text-align:center"><strong>Jumlah</strong></td>
              <?php
                for ($i=0; $i < sizeof($data_jenis_pembayaran) ; $i++) {
                  $jumlah_keseluruhan[$i] = $jumlah_keseluruhan[$i] + $jumlah_col[$i];
              ?>
                <td style="font-size:12;padding:5px;text-align:right"><?php echo $jumlah_col[$i] ?></td>
              <?php
                }
              ?>
              <td style="font-size:12;padding:5px;text-align:right"><?php echo $jumlah_col_row ?></td>
            </tr>
          </tbody>
        </table>
      </div>

      <div style="width:100%;text-align:center;">
        <h6 style="text-align:left; font-weight: bold;"># KBIT</h6>
        <table border="1" autosize="-10">
          <thead>
            <tr>
              <th style="width: 5mm; text-align:center; font-size:12;padding:5px" rowspan="2">No</th>
              <th style="width: 5cm; text-align:center; font-size:12;padding:5px" rowspan="2">Nama</th>
              <th style="width: 205mm; text-align:center; font-size:12;padding:5px" colspan="<?php echo sizeof($data_jenis_pembayaran) ?>">Rincian Bulanan</th>
              <th style="width: 20mm;text-align:center; font-size:12;padding:5px" rowspan="2">Jml</th>
            </tr>
            <tr>
              {data_jenis_pembayaran}
                <th style="text-align:center; font-size:12;padding:5px">{kode}</th>
              {/data_jenis_pembayaran}
            </tr>
          </thead>
          <tbody>
            <?php
              $i = 1;
              $jumlah_col=new SplFixedArray(sizeof($data_jenis_pembayaran));
              $jumlah_col_row=0;
              foreach ($data_content_KB as $data):
            ?>
              <tr>
                <td style="font-size:12;padding:5px;text-align:center"><?php echo $i ?></td>
                <td style="font-size:12;padding:5px;text-align:left"><?php echo $data->murid ?></td>
                <?php
                  $kode = explode(',', $data->pembayaran_kode);
                  $nominal = explode(',', $data->nominal);
                  $jumlah_row = 0;
                  foreach ($data_jenis_pembayaran as $value=>$data):
                    $status = 0;
                    $nilai_nominal = 0;
                    for ($j=0; $j < sizeof($kode) ; $j++) {
                      if ($data->kode == $kode[$j]) {
                        $status = 1;
                        $nilai_nominal = $nilai_nominal+$nominal[$j];
                      }
                    }
                    if ($status == 1) :
                      $status = 0;
                      $jumlah_row = $jumlah_row + $nilai_nominal;
                    ?>
                      <td style="font-size:12;padding:5px;text-align:right"><?php echo $nilai_nominal ?></td>
                    <?php else: ?>
                      <td style="font-size:12;padding:5px;text-align:right"><?php echo $nilai_nominal ?></td>
                    <?php endif;
                      $jumlah_col[$value]=$jumlah_col[$value]+$nilai_nominal;
                    ?>

                  <?php
                    endforeach;
                    $jumlah_col_row = $jumlah_col_row + $jumlah_row;
                  ?>
                <td style="font-size:12;padding:5px;text-align:right"><?php echo $jumlah_row ?></td>
              </tr>
            <?php
              $i++;
              endforeach;
            ?>
            <tr>
              <td colspan="2" style="font-size:12;padding:5px;text-align:center"><strong>Jumlah</strong></td>
              <?php
                for ($i=0; $i < sizeof($data_jenis_pembayaran) ; $i++) {
                  $jumlah_keseluruhan[$i] = $jumlah_keseluruhan[$i] + $jumlah_col[$i];
              ?>
                <td style="font-size:12;padding:5px;text-align:right"><?php echo $jumlah_col[$i] ?></td>
              <?php
                }
              ?>
              <td style="font-size:12;padding:5px;text-align:right"><?php echo $jumlah_col_row ?></td>
            </tr>
          </tbody>
        </table>
      </div>

      <div style="width:100%;text-align:center;">
        <h6 style="text-align:left; font-weight: bold;"># TBIT</h6>
        <table border="1" autosize="-10">
          <thead>
            <tr>
              <th style="width: 5mm; text-align:center; font-size:12;padding:5px" rowspan="2">No</th>
              <th style="width: 5cm; text-align:center; font-size:12;padding:5px" rowspan="2">Nama</th>
              <th style="width: 205mm; text-align:center; font-size:12;padding:5px" colspan="<?php echo sizeof($data_jenis_pembayaran) ?>">Rincian Bulanan</th>
              <th style="width: 20mm;text-align:center; font-size:12;padding:5px" rowspan="2">Jml</th>
            </tr>
            <tr>
              {data_jenis_pembayaran}
                <th style="text-align:center; font-size:12;padding:5px">{kode}</th>
              {/data_jenis_pembayaran}
            </tr>
          </thead>
          <tbody>
            <?php
              $i = 1;
              $jumlah_col=new SplFixedArray(sizeof($data_jenis_pembayaran));
              $jumlah_col_row=0;
              foreach ($data_content_TB as $data):
            ?>
              <tr>
                <td style="font-size:12;padding:5px;text-align:center"><?php echo $i ?></td>
                <td style="font-size:12;padding:5px;text-align:left"><?php echo $data->murid ?></td>
                <?php
                  $kode = explode(',', $data->pembayaran_kode);
                  $nominal = explode(',', $data->nominal);
                  $jumlah_row = 0;
                  foreach ($data_jenis_pembayaran as $value=>$data):
                    $status = 0;
                    $nilai_nominal = 0;
                    for ($j=0; $j < sizeof($kode) ; $j++) {
                      if ($data->kode == $kode[$j]) {
                        $status = 1;
                        $nilai_nominal = $nominal[$j];
                      }
                    }
                    if ($status == 1) :
                      $status = 0;
                      $jumlah_row = $jumlah_row + $nilai_nominal;
                    ?>
                      <td style="font-size:12;padding:5px;text-align:right"><?php echo $nilai_nominal ?></td>
                    <?php else: ?>
                      <td style="font-size:12;padding:5px;text-align:right"><?php echo $nilai_nominal ?></td>
                    <?php endif;
                      $jumlah_col[$value]=$jumlah_col[$value]+$nilai_nominal;
                    ?>

                  <?php
                    endforeach;
                    $jumlah_col_row = $jumlah_col_row + $jumlah_row;
                  ?>
                <td style="font-size:12;padding:5px;text-align:right"><?php echo $jumlah_row ?></td>
              </tr>
            <?php
              $i++;
              endforeach;
            ?>
            <tr>
              <td colspan="2" style="font-size:12;padding:5px;text-align:center"><strong>Jumlah</strong></td>
              <?php
                for ($i=0; $i < sizeof($data_jenis_pembayaran) ; $i++) {
                  $jumlah_keseluruhan[$i] = $jumlah_keseluruhan[$i] + $jumlah_col[$i];
              ?>
                <td style="font-size:12;padding:5px;text-align:right"><?php echo $jumlah_col[$i] ?></td>
              <?php
                }
              ?>
              <td style="font-size:12;padding:5px;text-align:right"><?php echo $jumlah_col_row ?></td>
            </tr>
          </tbody>
        </table>
      </div>

      <br>
      <br>
      <h5>Kesimpulan</h5>
      <table border="1" autosize="-10">
          <thead>
            <tr>
              <th style="width: 5mm; text-align:center; font-size:12;padding:5px">No</th>
              <th style=" text-align:center; font-size:12;padding:5px">Kode</th>
              <th style=" text-align:center; font-size:12;padding:5px">Pembayaran</th>
              <th style=" text-align:center; font-size:12;padding:5px">Jumlah Nominal</th>
            </tr>
          </thead>
          <tbody>
          <?php
            $jumlah = 0;
            foreach ($data_jenis_pembayaran as $index => $data):
          ?>
            <tr>
              <td style=" text-align:center; font-size:12;padding:5px"><?php echo $index+1 ?></td>
              <td style="font-size:12;padding:5px;text-align:center"><?php echo $data->kode ?></td>
              <td style="font-size:12;padding:5px;text-align:center"><?php echo $data->nama ?></td>
              <td style="font-size:12;padding:5px;text-align:right"><?php echo $jumlah_keseluruhan[$index] ?></td>
            </tr>
          <?php
            $jumlah = $jumlah + $jumlah_keseluruhan[$index];
            endforeach;
          ?>
          <tr>
            <td style="font-size:12;padding:5px;text-align:center" colspan="3">Jumlah</td>
            <td style="font-size:12;padding:5px;text-align:right"><?php echo $jumlah ?></td>
          </tr>
        </tbody>
      </table>
  </body>
</html>
