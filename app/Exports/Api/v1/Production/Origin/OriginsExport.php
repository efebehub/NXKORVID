<?php

namespace App\Exports\Api\Production\Origin;

use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use App\Models\Api\Production\Category\Category;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithEvents;

class OriginExport implements FromCollection, WithColumnWidths, WithHeadings, WithColumnFormatting, WithStyles, WithEvents
{
    private $totalRows = 10;

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $origins = Category::all();
        $this->totalRows = count($origins) + 2;
        return $origins;
    }

    public function columnFormats(): array
    {
        return [
            'D' => NumberFormat::FORMAT_DATE_DDMMYYYY,
            'E' => NumberFormat::FORMAT_DATE_DDMMYYYY,
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            1    => ['font' => ['bold' => true]],

            // Styling a specific cell by coordinate.
            //'B2' => ['font' => ['italic' => true]],

            // Styling an entire column.
            //'C'  => ['font' => ['size' => 16]],
        ];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 5,
            'B' => 30,
            'C' => 30,
            'D' => 30,
            'E' => 30,
        ];
    }

    public function headings(): array
    {
        return [
            '#',
            'Descripcion',
            'Codigo NX',
            'Creada',
            'Actualizada',
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {

                $event->sheet->insertNewRowBefore(1, 1);

                $event->sheet->mergeCells(sprintf('A1:E1'));
                $event->sheet->setCellValue('A1','Orígenes (Producción)');
                $event->sheet->getDelegate()->getStyle('A1')
                    ->getAlignment()
                    ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $event->sheet->getDelegate()->getStyle('A1')
                    ->getFont()
                    ->setBold(true)
                    ->setSize(20);

                $select = 'A2:E' . strval($this->totalRows);
                $event->sheet->getDelegate()->getStyle($select)
                    ->getAlignment()
                    ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);

                $styleArray = [
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => '00000000'],
                        ],
                    ],
                ];

                $event->sheet->getDelegate()->getStyle($select)->applyFromArray($styleArray);

            },
        ];
    }
}
