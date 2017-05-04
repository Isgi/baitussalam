
<link href="<?php echo base_url() ?>assets/css/back/dataTables.bootstrap.css" rel="stylesheet" />
<link href="<?php echo base_url() ?>assets/css/back/style.css" rel="stylesheet">
  <div class="row">
    <!--Default Pannel, Primary Panel And Success Panel   -->
    <form class="form-inline" action="<?php echo site_url('pembayaran/'.$this->uri->segment(2)) ?>" method="get">
        <div class="col-xs-4">
          <div class="input-group">
            <select class="form-control border-input" name="kategori">
              <option <?php ($this->input->get('kategori')=='') ? print_r('selected') : ''; ?> value="">Semua Kategori ...</option>
              <option <?php ($this->input->get('kategori')=='lunas') ? print_r('selected') : ''; ?> value="lunas">Lunas</option>
              <option <?php ($this->input->get('kategori')=='belum_lunas') ? print_r('selected') : ''; ?> value="belum_lunas">Belum Lunas</option>
            </select>
            <span class="input-group-btn">
                <button class="btn btn-primary" type="submit" type="button">Ok</button>
            </span>
          </div>
        </div>
        <div class="col-xs-4">
          <div class="input-group">
            <input type="text" placeholder="NIS" class="form-control border-input" name="nis" value="<?php echo ($this->input->get('nis') != "" ? $this->input->get('nis') : "")?>">
            <span class="input-group-btn">
                <button class="btn btn-primary" type="submit" type="button">Cari</button>
            </span>
          </div>
        </div>
    </form>
  </div>
    <div class="">
      <table class="table table-striped">
        <thead>
          <tr>
            <th style="text-align:center"><small>No. Induk</small></th>
            <th style="text-align:center"><small>Nama</small></th>
            <th style="text-align:center"><small>Derajat</small></th>
            <th style="text-align:center"><small>Kelas</small></th>
            <th style="text-align:center"><small>Pembayaran</small></th>
            <th style="text-align:center"><small>Nominal <b>(Rp)</b></small></th>
            <th style="text-align:center"><small>Setoran</small></th>
            <th style="text-align:center">Status</th>
            <th class="no-sort">#</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($data_content as $data): ?>
          <tr class="odd gradeX">
            <td><?php echo "<small>$data->no_induk</small>"?></td>
            <td><?php echo "<small>$data->nama_murid</small>" ?></td>
            <td style="text-align:center"><?php echo $data->derajat?></td>
            <td style="text-align:center"><?php echo "<small>$data->nama_kelas</small>"?></td>
            <td><?php echo "<small>$data->nama_pembayaran</small>"?></td>
            <td style="text-align:right"><?php echo $data->jumlah_nominal?></td>
            <td><?php echo '<small>'.date('d M Y', strtotime($data->tgl_setoran)).'</small>' ?></td>
            <td><?php
              $hasil = $data->jumlah_nominal - $data->harga;
              if( $hasil >= 0){echo "Lunas <b> > $hasil</b>";} else{echo "<small style='color:red'>Belum Lunas</small> <b>  $hasil</b>";} ?></td>
            <td>
              <a title="Lihat Rincian" href="<?php
              $dt = new DateTime($data->tgl_setoran);
              $date = $dt->format('Y-m-d');
              echo site_url('pembayaran/angsuran'.$this->uri->segment(2).'?tanggal='.$date.'&nis='.$data->no_induk.'&pembayaran='.$data->item_pembayaran) ?>">Angsuran</a>
              <!-- &nbsp  &nbsp
              <a href="javascript:void(0);" title="Hapus data" onclick="<?php echo "actdelete($data->id)" ?>"><i style="color:red" class="ti-close"></i></a> -->
            </td>
          </tr>
          <?php endforeach; ?>
        <tbody>
      </table>
    </div>
    <?php echo $link?>
    <!--End Default Pannel, Primary Panel And Success Panel   -->
  </div>
</div>



<!--   Core JS Files   -->
<script src="<?php echo base_url() ?>assets/vendor/jquery/jquery-1.10.2.js" type="text/javascript"></script>

<script src="<?php echo base_url() ?>assets/js/back/bootstrap-checkbox-radio.js"></script>

<script>
var url="<?php echo site_url();?>";
function actdelete(id){
   var r=confirm("Anda yakin akan menghapus data ini ?")
    if (r==true)
      window.location = url+"/pembayaran/actdelete/"+id;
    else
      return false;
}
</script>
