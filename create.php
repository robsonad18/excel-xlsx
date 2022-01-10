<?php 

require __DIR__."/vendor/autoload.php";

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

new class 
{
    /**
     * Construtor da classe
     */
    function __construct()
    {
        $cells = [
            ["id", "nomae", "valor"],
            [1, "Robson",200],
            [2, "Lucas", 300],
            [3, "Farias", 400],
            [null, "total", "=SUM(C3:C5)"]
        ];

        $spreadsheet = new Spreadsheet();

        // Define as colunas de forma manual
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'Excel php');
        // Le os dados do vetor e transforma eles em colunas
        $sheet->fromArray($cells, null, "A2");

        // Estilos da celular A!
        $styles = [
            "font" => [
                "bold" => true,
                "color" => [
                    "rgb" => "F00F00"
                ],
                "size" => 23,
                "name" => "Arial"
            ]
        ];

        // Define estilo
        $sheet->getStyle("A1")->applyFromArray($styles);

        $writer = new Xlsx($spreadsheet);
        $writer->save('files/' . time() . '.xlsx');
        print "Arquivo criado com sucesso!";
    }
};

