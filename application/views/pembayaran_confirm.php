
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
    <style media="screen">
      td {
        padding-left: 2px;
        padding-right: 20px;
      }
      .content-confirm {
        position: absolute;
        top: 10%;
        left: 20%;
      }
      .total {
        padding-top: 10px;
        border-top: 1px solid #66615b;
      }
      .rincian-bayar {
        height: 110px;
        width: 320px;
        overflow-y: scroll;
      }
    </style>
  </head>
  <body style="background-color: #eee">
    <?php print_r($data);  ?>
    <div class="container">
      <div class="jumbotron" style="background:#fff; position:absolute; width: 620px; height: 400px; top: 20%; left: 25%">
        <div class="content-confirm">
          <h2>Apakan akan melakukan pembayaran lagi ?</h2>
          <h5>Pembayaran</h5>
          <div class="rincian-bayar">
            <table border=0 cellpadding=1>
              <?php $i = 1; $total = 0; foreach ($data as $data): ?>
                <tr>
                  <td><?php echo $i ?></td>
                  <td>Rp. <?php echo $data['nominal'] ?></td>
                </tr>
              <?php $i++; $total = $total + $data['nominal']; endforeach; ?>
              <tr>
                <td class="total"><strong>Total</strong></td>
                <td class="total"><strong>Rp. <?php echo $total ?></strong></td>
              </tr>
            </table>
          </div>
          <div>
            <button class="btn btn-danger" name="button">Tidak</button>
            <button class="btn btn-success" name="button">Iya, lakukan pembayaran lagi </button>
          </div>
        </div>
      </div>
    </div>
  </body>
  <script src="<?php echo base_url() ?>assets/js/back/jquery-1.10.2.js" type="text/javascript"></script>
  <script src="<?php echo base_url() ?>assets/vendor/js/bootstrap.min.js" type="text/javascript"></script>
</html>
