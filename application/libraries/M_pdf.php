<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class m_pdf {
    function __construct()
    {
        $CI = & get_instance();
    }

    function load()
    {
      include_once APPPATH.'/third_party/mpdf/mpdf.php';
      //return new mPDF($param);
      return new mPDF("en-GB","A4-L","","",10,10,10,10,6,3,"L");
    }
}
