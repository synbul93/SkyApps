<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

if (!function_exists('export_to_excel')) {
    function export_to_excel($data, $filename = 'data_export.xlsx')
    {
        // Load the required classes using Composer autoload
        require_once FCPATH . 'vendor/autoload.php';

        // Create new Spreadsheet object
        $spreadsheet = new Spreadsheet();

        // Set active sheet
        $sheet = $spreadsheet->getActiveSheet();

        // Set title
        $title = 'Report Data Repository';
        $sheet->setCellValue('A1', $title);
        $sheet->mergeCells('A1:F1');
        $sheet->getStyle('A1')->getFont()->setBold(true)->setSize(16);
        $sheet->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

        // Set headers style
        $sheet->getStyle('A2:F2')->getFont()->setBold(true);

        // Set headers
        $sheet->setCellValue('A2', 'No');
        $sheet->setCellValue('B2', 'Nama');
        $sheet->setCellValue('C2', 'Nomor Induk');
        $sheet->setCellValue('D2', 'Fakultas');
        $sheet->setCellValue('E2', 'Judul');
        $sheet->setCellValue('F2', 'Dosen');

        // Set data rows
        $row = 3;
        $i = 1;
        foreach ($data as $rps) {
            $sheet->setCellValue('A' . $row, $i++);
            $sheet->setCellValue('B' . $row, $rps['nama']);
            $sheet->setCellValue('C' . $row, $rps['nrp']);
            $sheet->setCellValue('D' . $row, $rps['fakultas']);
            $sheet->setCellValue('E' . $row, $rps['judul']);
            $sheet->setCellValue('F' . $row, $rps['dosen']);
            $row++;
        }

        // Auto size columns
        foreach (range('A', 'F') as $column) {
            $sheet->getColumnDimension($column)->setAutoSize(true);
        }

        // Create Excel writer object
        $writer = new Xlsx($spreadsheet);

        // Save Excel file
        $writer->save($filename);
    }
}
