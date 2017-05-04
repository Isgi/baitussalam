<?php
  $terbilang = terbilang($pembayaran['nominal']);

  function terbilang($x) {
    $abil = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
    if ($x < 12)
      return " " . $abil[$x];
    elseif ($x < 20)
      return Terbilang($x - 10) . "belas";
    elseif ($x < 100)
      return Terbilang($x / 10) . " puluh" . Terbilang($x % 10);
    elseif ($x < 200)
      return " seratus" . Terbilang($x - 100);
    elseif ($x < 1000)
      return Terbilang($x / 100) . " ratus" . Terbilang($x % 100);
    elseif ($x < 2000)
      return " seribu" . Terbilang($x - 1000);
    elseif ($x < 1000000)
      return Terbilang($x / 1000) . " ribu" . Terbilang($x % 1000);
    elseif ($x < 1000000000)
      return Terbilang($x / 1000000) . " juta" . Terbilang($x % 1000000);
  }
?>
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
      <div style="position: absolute; left: 5mm; top:0.5mm; width: 130mm;text-align:center;">
        <h4 style="margin-bottom:0px !important"><?php echo ($data_murid['derajat'] == 'SD' ? 'SEKOLAH DASAR ISLAM TERPADU (SDIT)' : ($data_murid['derajat'] == 'TK' ? 'TAMAN KANAK-KANAK ISLAM TERPADU (TKIT)' : ($data_murid['derajat'] == 'KB' ? 'KELOMPOK BERMAIN ISLAM TERPADU (KBIT)' : 'TAMAN BERMAIN ISLAM TERPADU (TBIT)')))?></h4>
        <h3 style="margin-top:0px; margin-bottom:0px !important">"BAITUSSALAM"</h3>
        <strong style="font-size:12">PP Modern Baitussalam Pulerejo Bokoharjo Prambanan Yogyakarta Telp. (0274) 7482539</strong>
      </div>
      <div style="position: absolute; top: 3cm; left: 5mm; width: 13cm; font-size:9">
        <table border="1">
          <thead>
            <tr>
              <th colspan="4" style="padding:5px; text-align:center"><h5>BUKTI PENERIMAAN PEMBAYARAN</h5></th>
            </tr>
            <tr>
              <th style="width: 2cm; font-size:12;padding:5px; text-align:center">K.Pemb.</td>
              <th style="width: 6cm; font-size:12;padding:5px; text-align:center">Pembayaran</td>
              <th style="width: 3cm; font-size:12;padding:5px; text-align:center">Nominal (Rp)</td>
              <th style="width: 2cm; font-size:12;padding:5px; text-align:center">Setoran</td>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td style="padding: 16px 10px 16px 10px;"><?php echo $item_pembayaran['kode'] ?></td>
              <td style="padding: 16px 10px 16px 10px;"><?php echo $item_pembayaran['nama'] ?></td>
              <td style="padding: 16px 10px 16px 10px; text-align:right"><?php echo $pembayaran['nominal'] ?></td>
              <td style="padding: 16px 2px 16px 2px; text-align:center"><?php echo date("M Y", strtotime($pembayaran['tgl_setoran'])) ?></td>
            </tr>
          </tbody>
        </table>
      </div>
      <div style="position:absolute; left: 6mm; top:5.9cm; width:13cm">
        <p style="font-size:13;"><strong>Jumlah yang disetor</strong> Rp. <?php echo $pembayaran['nominal'] ?></p>
        <p style="font-size:13;"><strong>Dengan huruf :</strong> <?php echo '<i><u>'.ucwords($terbilang).' Rupiah </i></u>' ?></p>
        <hr style="margin:4px; margin-top:23px">
        <p style="font-size:10;"><strong>Catatan :</strong></p>
        <ul>
          <li style="font-size:10;">Lingkari nomor jenis pembayaran saudara</li>
          <li style="font-size:10;">Pembayaran sah jika ada stempel dari BMT Bening Suci</li>
        </ul>
        <p style="padding-top:-7px;font-size:8;"><strong>Putih : Wali Siswa, Kuning : SDIT, Biru : BMT</strong></p>
      </div>

      <div style="position: absolute; left: 140mm; top:0.5mm; width: 68mm;">
        <h4 style="text-align:center">IDENTITAS SISWA</h4>
        <table border="0" style="margin-top:10cm">
          <tr>
            <td style="font-size:13;padding:3px">Nama </td>
            <td> :</td>
            <td style="font-size:10;padding:3px"><?php echo $data_murid['nama']?></td>
          </tr>
          <tr>
            <td style="font-size:13;padding:3px">No. Induk </td>
            <td> :</td>
            <td style="font-size:10;padding:3px"> <?php echo $data_murid['no_induk']?></td>
          </tr>
          <tr>
            <td style="font-size:13;padding:3px">Kelas </td>
            <td> :</td>
            <td style="font-size:10;padding:3px"><?php echo $data_murid['nama_kelas']?></td>
          </tr>
          <tr>
            <td style="font-size:13;padding:3px">Disetor oleh </td>
            <td> :</td>
            <td style="font-size:10;padding:3px"><?php echo $pembayaran['penyetor']?></td>
          </tr>
          <tr>
            <td style="font-size:13;padding:3px">Tanggal </td>
            <td> :</td>
            <td style="font-size:10;padding:3px"><?php echo date("d M Y", strtotime($pembayaran['dibuat'])) ?></td>
          </tr>
        </table>
      </div>
      <div style="position:absolute; left: 570px; top:4.8cm; font-size:13; text-align:center">
        <strong>Tanda tangan penyetor :</strong>
      </div>
      <p style="position: absolute; top:6.2cm; left: 595px; font-size:13">(Nama Terang)</p>
      <div style="position:absolute; left: 142mm; top:7.1cm;  text-align:center">
        <strong style="font-size:13;">...........................</strong>
        <p style="font-size:13; margin-top:40px">(Teller)</p>
      </div>
      <div style="position:absolute; left: 190mm; top:7.1cm; font-size:13; text-align:center">
        <strong>BMT</strong>
        <p style="font-size:13; margin-top:40px">(Kasir)</p>
      </div>
      <!-- <div style="position:absolute; left: 570px; top:200px; height:110px; text-align:center;  font-size:13">
          <div style=" margin-top:10px; height:100px;">
            <strong style="font-size:13;">................</strong>
            <p style="position: absolute; bottom: 0;">(Teller)</p>
          </div>
          <div style="margin-top:10px; height:100px;">
            <strong>BMT</strong>
            <p style="position: absolute; bottom: 0;">(Kasir)</p>
          </div>
      </div> -->
  </body>
</html>
