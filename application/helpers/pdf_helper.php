<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

use Mpdf\Mpdf;

require FCPATH . 'vendor/autoload.php';

function exportDataToPDF($data, $filename)
{

    $mpdf = new Mpdf();
    $html = '
    <html>
        <head>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    font-size: 12px;
                    margin: 0;
                    padding: 0;
                }

                h1 {
                    font-size: 20px;
                }

          
                .header td{
                    border: 0;
                }

                table {
                    width: 100%;
                    border-collapse: collapse;
                }

                th,
                td {
                    padding: 8px;
                    border: 1px solid #000;
                }

                th {
                    background-color: #f2f2f2;
                    
                }

                img {
                    display: block;
                    margin: 0 auto;
                }

            
                .text-judul {
                    text-align: center;
                    margin-bottom: 20px;
                    font-size: 16px;
                }
                .table-container {
                    page-break-inside: avoid;
                }
            </style>
        </head>
        <body>
            <table class="header">
                <tr>
                    <td>
                    <img src="assets/img/bsky.png" alt="" style="width: 70px;margin-left: 60px;
                    margin-top: 1px;">
                    </td>
                    <td width="100%" align="center" border="0">
                    <h1>KEMENTERIAN PENDIDIKAN DAN KEBUDAYAAN <br>UNIVERSITAS BSKY <br>DIGITAL LIBRARY UNIVERSITAS BSKY</h1>
                    <p>Jl. Raya Cimindi No 212 A <br> Kelurahan Sukaraja, Kecamatan Cicendo, Jawa Barat, Indonesia, 40175 <br>Website: bsky.co.id | Telp. (022) 12345678</p>
                </td>
                </tr>
               
            </table>
            <hr>
            <div class="text-judul">
                <h1>Report Data Repository</h1>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Nomor Induk</th>
                        <th>Fakultas</th>
                        <th>Judul</th>
                        <th>Dosen</th>
                    </tr>
                </thead>
    ';

    $i = 1;
    foreach ($data as $rps) {
        $html .= '
        <tbody>
            <tr>
                <td>' . $i++ . '</td>
                <td>' . $rps['nama'] . '</td>
                <td>' . $rps['nrp'] . '</td>
                <td>' . $rps['fakultas'] . '</td>
                <td>' . $rps['judul'] . '</td>
                <td>' . $rps['dosen'] . '</td>
            </tr>';
    }

    $html .= '
                </tbody>
            </table>
        </body>
    </html>';

    $mpdf->WriteHTML($html);
    $mpdf->Output($filename, 'D');
}
