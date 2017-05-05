<link href="<?php echo base_url() ?>assets/css/back/dataTables.bootstrap.css" rel="stylesheet" />
<link href="{base_url(assets/css/back/style.css)}" rel="stylesheet">
<link href="{base_url(assets/css/back/bootstrap-datetimepicker.css)}" rel="stylesheet">

<div class="">
  <div class="row">
    <div class="col-sm-3">
      <form class="form-inline" action="<?php echo site_url('laporan/harian') ?>" method="get">
        <div class="form-group">
            <div class="input-group date form_date" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
              <input class="form-control border-input" placeholder="Pilih tanggal" size="16" type="text" value="" readonly>
              <input type="hidden" name="tgl" id="dtp_input2" /><br/>
              <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
              <span class="input-group-btn">
                  <button class="btn btn-primary" type="submit" type="button"><i class="ti-filter"></i></button>
              </span>
            </div>
        </div>
      </form>
    </div>
    <div class="col-sm-5">
      <a href="<?php echo site_url('laporan/cetak/'.$this->uri->segment(2).'?'.$_SERVER['QUERY_STRING']) ?>"><button type="button" class="btn btn-default" name="button">Cetak <i class="ti-printer"></i></button></a>
    </div>

  </div>
</div>

<div class="row">
        <!--Default Pannel, Primary Panel And Success Panel   -->
    <div class="">
      <table class="table table-striped">
          <thead>
              <tr>
                  <th style="text-align:center">No. Induk</th>
                  <th style="text-align:center">Nama</th>
                  <th style="text-align:center">Program</th>
                  <th style="text-align:center">Pembayaran</th>
                  <th style="text-align:center">Nominal</th>
                  <th style="text-align:center">Tgl Setoran</th>
              </tr>
          </thead>
          <tbody>
            <?php foreach ($data_content as $data): ?>
              <tr class="odd gradeX">
                  <td style="text-align:center"><?php echo $data->no_induk?></td>
                  <td><?php echo $data->murid ?></td>
                  <td style="text-align:center"><?php echo $data->program?></td>
                  <td><?php echo $data->pembayaran?></td>
                  <td style="text-align:right"><?php echo $data->nominal?></td>
                  <td style="text-align:center"><?php echo date('d M Y', strtotime($data->tgl_setoran))?></td>
              </tr>
            <?php endforeach ?>
          </tbody>
      </table>
    </div>
    <?php echo $link?>
        <!--End Default Pannel, Primary Panel And Success Panel   -->
</div>
<!--   Core JS Files   -->
<script src="{base_url(assets/vendor/jquery/jquery-1.10.2.js)}" type="text/javascript"></script>
<script src="{base_url(assets/vendor/bootstrap/js/bootstrap.min.js)}" type="text/javascript"></script>
<script src="{base_url(assets/js/back/bootstrap-datetimepicker.js)}" type="text/javascript"></script>
<script src="{base_url(assets/js/back/bootstrap-datetimepicker.id.js)}" type="text/javascript"></script>

<script type="text/javascript">
$('.form_date').datetimepicker({
      language:  'id',
      weekStart: 1,
      todayBtn:  1,
  autoclose: 1,
  todayHighlight: 1,
  startView: 2,
  minView: 2,
  forceParse: 0
  });
</script>
