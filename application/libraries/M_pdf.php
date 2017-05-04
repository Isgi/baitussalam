<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class m_pdf {
    function __construct()
    {
        $CI = & get_instance();
    }

    // function load()
    // {
    //   include_once APPPATH.'/third_party/mpdf/mpdf.php';
    //   //return new mPDF($param);
    //   return new mPDF("en-GB","A4-L","","",10,10,10,10,6,3,"L");
    // }

    function load($param)
    {
      include_once APPPATH.'/third_party/mpdf/mpdf.php';

      return new mPDF($param[0], $param[1], $param[2], $param[3], $param[4], $param[5], $param[6], $param[7], $param[8], $param[9], $param[10]);
    }
}
