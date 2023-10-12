<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Mpdf\Mpdf;

require_once FCPATH . 'vendor/autoload.php';

if (!function_exists('cetak_kartu_pdf')) {
    function cetak_kartu_pdf($mahasiswa)
    {
        $CI = &get_instance();

        $qrCodeFile = FCPATH . 'assets/qrcodes/' . $mahasiswa['nama'] . '.png';
        if (!file_exists($qrCodeFile)) {
            $url = site_url('view/mahasiswa/kartu_qr/' . $mahasiswa['nama']);
            QRcode::png($url, $qrCodeFile, QR_ECLEVEL_H, 5);
        }

        // Membuat objek mPDF
        $mpdf = new \Mpdf\Mpdf();

        // Memuat tampilan kartu dalam variabel $html
        $html = $CI->load->view('mahasiswa/kartu_pdf', array('mahasiswa' => $mahasiswa, 'qrCode' => $qrCodeFile), TRUE);



        // Mengubah HTML menjadi PDF
        $mpdf->WriteHTML($html);


        // Menghasilkan nama file untuk diunduh
        $filename = $mahasiswa['nama'] . '_kartu.pdf';

        // Mengirimkan file PDF sebagai download ke pengguna
        $mpdf->Output($filename, 'D');
    }
}

if (!function_exists('generate_qr_code')) {
    function generate_qr_code($data, $size = 200)
    {
        $CI = &get_instance();
        $CI->load->helper('url');
        $url = site_url('home/scan_kartu/' . $data);
        $qrCodeFile = 'assets/qrcodes/' . $data . '.png';
        if (!file_exists($qrCodeFile)) {
            include_once(APPPATH . 'third_party/phpqrcode/qrlib.php');
            QRcode::png($url, $qrCodeFile, QR_ECLEVEL_H, $size, 5);
        }
        return base_url($qrCodeFile);
    }
}

if (!function_exists('download_kartu_pdf')) {
    function download_kartu_pdf($mahasiswa)
    {
        $CI = &get_instance();

        $qrCodeFile = 'assets/qrcodes/' . $mahasiswa['nama'] . '.png';
        if (!file_exists($qrCodeFile)) {
            $url = site_url('home/scan_kartu/' . $mahasiswa['nrp']);
            include_once(APPPATH . 'third_party/phpqrcode/qrlib.php');
            QRcode::png($url, $qrCodeFile, QR_ECLEVEL_H, 5);
        }

        $mpdf = new \Mpdf\Mpdf();

        $html = $CI->load->view('mahasiswa/download_kartu', array('mahasiswa' => $mahasiswa, 'qrCode' => $qrCodeFile), TRUE);

        $mpdf->WriteHTML($html);

        $filename = $mahasiswa['nrp'] . '_kartu.pdf';

        $mpdf->Output($filename, 'D');
    }
}
