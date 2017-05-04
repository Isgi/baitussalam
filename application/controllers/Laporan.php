<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller{

  public function __construct(){
    parent::__construct();
    $this->load->model('mpembayaran');
    if(!$this->session->userdata('username'))
        redirect('auth');
  }

  function index(){
    redirect('laporan/harian');
  }

  function harian(){
    $this->load->library('mypagination');
    $tgl = $this->input->get('tgl');
    if (empty($tgl))
      $tgl = gmdate("Y-m-d", time()+60*60*7);

    $total_laporan = $this->mpembayaran->getpembayaranharian($tgl)->num_rows();
    $pagination = $this->mypagination->pagination('laporan/harian',$total_laporan,3);

    $data_content = $this->mpembayaran->getpembayaranharian($tgl,$pagination['per_page'],$pagination['page'])->result();
    $data_page    = array(
      'title'     => 'Laporan '. date("d M y", strtotime($tgl)),
      'button'    => '<a href="{site_url(laporan/harian)}"><button disabled class="btn btn-success">Harian</button></a>
                      <a href="{site_url(laporan/bulanan)}"><button class="btn btn-warning">Bulanan</button></a>
                      <a href="{site_url(laporan/tahunan)}"><button class="btn btn-primary">Tahunan</button></a>',
      'side_bar'  => $this->mmenu->getmenu()->result(),
      'content'   => $this->parser->parse('laporan_harian', array('data_content' => $data_content, 'form_cari' => $tgl, 'link' => $pagination['link']),true)
    );
    $this->parser->parse('main', $data_page);
  }

  function bulanan(){
    $this->load->library('mypagination');
    $this->load->model('mkelas');
    $bln = $this->input->get('tgl');
    $kelas = $this->input->get('kelas');
    if (empty($bln))
      $bln = gmdate("Y-m", time()+60*60*7);

    $total_laporan = $this->mpembayaran->getpembayaranbulanan($bln, $kelas)->num_rows();
    $pagination = $this->mypagination->pagination('laporan/bulanan',$total_laporan,3);
    $data_kelas = $this->mkelas->getKelas()->result();

    $data_content = $this->mpembayaran->getpembayaranbulanan($bln, $kelas,$pagination['per_page'],$pagination['page'])->result();
    $data_page    = array(
    'title'     => 'Laporan '. date("M Y", strtotime($bln)),
    'button'    => '<a href="{site_url(laporan/harian)}"><button class="btn btn-success">Harian</button></a>
                    <a href="{site_url(laporan/bulanan)}"><button disabled class="btn btn-warning">Bulanan</button></a>
                    <a href="{site_url(laporan/tahunan)}"><button class="btn btn-primary">Tahunan</button></a>',
    'side_bar'  => $this->mmenu->getmenu()->result(),
    'content'   => $this->parser->parse('laporan_bulanan', array(
      'data_content' => $data_content,
      'form_cari' => $bln,
      'link' => $pagination['link'],
      'data_kelas' => $data_kelas),true)
    );
    $this->parser->parse('main', $data_page);
  }

  function tahunan(){
    $this->load->library('mypagination');
    $thn = $this->input->get('tgl');
    if (empty($thn))
      $thn = gmdate("Y", time()+60*60*7);

    $total_laporan = $this->mpembayaran->getpembayarantahunan($thn)->num_rows();
    $pagination = $this->mypagination->pagination('laporan/tahunan',$total_laporan,3);

    $data_content = $this->mpembayaran->getpembayarantahunan($thn,$pagination['per_page'],$pagination['page'])->result();
    $data_page    = array(
    'title'     => 'Laporan '. date("Y", strtotime($thn)),
    'button'    => '<a href="{site_url(laporan/harian)}"><button class="btn btn-success">Harian</button></a>
                    <a href="{site_url(laporan/bulanan)}"><button class="btn btn-warning">Bulanan</button></a>
                    <a href="{site_url(laporan/tahunan)}"><button disabled class="btn btn-primary">Tahunan</button></a>',
    'side_bar'  => $this->mmenu->getmenu()->result(),
    'content'   => $this->parser->parse('laporan_tahunan', array('data_content' => $data_content, 'form_cari' => $thn, 'link' => $pagination['link']),true)
    );
    $this->parser->parse('main', $data_page);
  }

  function cetak($periode){
    $tgl = $this->input->get('tgl');

    switch ($periode) {
      case 'harian':
        if (empty($tgl)){
          $tgl = gmdate("Y-m-d", time()+60*60*7);
        }
        $data_content = $this->mpembayaran->getpembayaranharian($tgl)->result();
        $data_page = array(
          'data_title' => 'Harian '.date("d M Y", strtotime($tgl)),
          'data_content' => $data_content
        );

        $this->load->view('laporan_cetak',$data_page);

        break;
      case 'bulanan':
        $kelas = $this->input->get('kelas');
        if (empty($tgl)){
          $tgl = gmdate("Y-m", time()+60*60*7);
        }

        $data_content = $this->mpembayaran->getpembayaranbulanan($tgl, $kelas)->result();

        $data_page = array(
          'data_title' => 'Bulanan '.date("M Y", strtotime($tgl)),
          'data_content' => $data_content
        );

        $this->load->view('laporan_cetak',$data_page);

        break;
      default:
        if (empty($tgl)){
          $tgl = gmdate("Y", time()+60*60*7);
        }
        $data_content = $this->mpembayaran->getpembayarantahunan($tgl)->result();

        $data_page = array(
          'data_title' => 'Tahunan '.date("Y", strtotime($tgl)),
          'data_content' => $data_content
        );

        $this->load->view('laporan_cetak',$data_page);

        break;
    }
  }

  public function setoran() {
    $this->load->model('mjenispembayaran');
    $this->load->model('mkelas');
    $this->load->library('m_pdf');
    $bln = $this->input->get('tgl');
    $kelas = $this->input->get('kelas');
    if (empty($bln))
      $bln = gmdate("Y-m", time()+60*60*7);

    $data_content_SD = $this->mpembayaran->getSetoran($bln, $kelas, 'SD')->result();
    $data_content_TK = $this->mpembayaran->getSetoran($bln, $kelas, 'TK')->result();
    $data_content_KB = $this->mpembayaran->getSetoran($bln, $kelas, 'KB')->result();
    $data_content_TB = $this->mpembayaran->getSetoran($bln, $kelas, 'TB')->result();
    $data_jenis_pembayaran = $this->mjenispembayaran->getJenisPembayaran()->result();
    $data_kelas = $this->mkelas->getKelasBy(array('id'=>$kelas))->row_array();

    $html = $this->parser->parse('laporan_setoran', array(
      'data_content_SD' => $data_content_SD,
      'data_content_TK' => $data_content_TK,
      'data_content_KB' => $data_content_KB,
      'data_content_TB' => $data_content_TB,
      'data_jenis_pembayaran' => $data_jenis_pembayaran,
      'bln' => $bln,
      'data_kelas' => $data_kelas
    ), true);

    $pdf = $this->m_pdf->load(["en-GB","A4-L","","",10,10,10,10,6,3,"L"]);
    $pdf->SetDisplayMode('fullpage');
    $pdf->WriteHTML($html);
    $pdf->Output("jajal.pdf","I");

  }
}
