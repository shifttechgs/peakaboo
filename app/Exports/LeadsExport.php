<?php

namespace App\Exports;

use App\Models\Lead;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Shared\Date as ExcelDate;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class LeadsExport implements
    FromQuery,
    WithHeadings,
    WithMapping,
    WithStyles,
    ShouldAutoSize,
    WithTitle,
    WithColumnFormatting
{
    use Exportable;

    public function __construct(
        private ?string $status     = null,
        private ?string $source     = null,
        private ?string $child_age  = null,
        private ?int    $assigned_to = null,
        private ?string $search     = null,
    ) {}

    // ---------------------------------------------------------------------------
    // Data
    // ---------------------------------------------------------------------------

    public function query()
    {
        $query = Lead::query()->with('assignee');

        if ($this->status) {
            $query->where('status', $this->status);
        }
        if ($this->source) {
            $query->where('source', $this->source);
        }
        if ($this->child_age) {
            $query->where('child_age', $this->child_age);
        }
        if ($this->assigned_to) {
            $query->where('assigned_to', $this->assigned_to);
        }
        if ($this->search) {
            $s = $this->search;
            $query->where(function ($q) use ($s) {
                $q->where('name', 'like', "%{$s}%")
                  ->orWhere('email', 'like', "%{$s}%")
                  ->orWhere('phone', 'like', "%{$s}%")
                  ->orWhere('reference', 'like', "%{$s}%");
            });
        }

        return $query->latest();
    }

    // ---------------------------------------------------------------------------
    // Sheet title
    // ---------------------------------------------------------------------------

    public function title(): string
    {
        return 'Leads ' . now()->format('Y-m-d');
    }

    // ---------------------------------------------------------------------------
    // Headers row
    // ---------------------------------------------------------------------------

    public function headings(): array
    {
        return [
            'Reference',
            'Parent Name',
            'Email',
            'Phone',
            'Child Name',
            'Child Nickname',
            'Age Group',
            'Preferred Date',
            'Preferred Time',
            'Source',
            'Status',
            'Assigned To',
            'Internal Notes',
            'Days Since Submitted',
            'Submitted At',
        ];
    }

    // ---------------------------------------------------------------------------
    // Row mapping
    // ---------------------------------------------------------------------------

    public function map($lead): array
    {
        return [
            $lead->reference,
            $lead->name,
            $lead->email,
            $lead->phone,
            $lead->child_name,
            $lead->child_nickname ?? '',
            $lead->child_age,
            // Store as Excel serial date so the column format applies properly
            ExcelDate::dateTimeToExcel($lead->preferred_date),
            $lead->preferred_time,
            $lead->source ? ucfirst($lead->source) : '',
            $lead->statusLabel(),
            $lead->assignee?->name ?? 'Unassigned',
            $lead->notes ?? '',
            (int) $lead->created_at->diffInDays(now()),
            // Store as Excel serial datetime
            ExcelDate::dateTimeToExcel($lead->created_at),
        ];
    }

    // ---------------------------------------------------------------------------
    // Column number formats  (col index is 1-based)
    // H = Preferred Date (col 8), O = Submitted At (col 15)
    // ---------------------------------------------------------------------------

    public function columnFormats(): array
    {
        return [
            'H' => NumberFormat::FORMAT_DATE_DDMMYYYY,
            'O' => 'DD/MM/YYYY HH:MM',
        ];
    }

    // ---------------------------------------------------------------------------
    // Styles
    // ---------------------------------------------------------------------------

    public function styles(Worksheet $sheet): array
    {
        $lastRow = $sheet->getHighestRow();

        // Bold header row
        $sheet->getStyle('A1:O1')->applyFromArray([
            'font'    => ['bold' => true, 'color' => ['rgb' => 'FFFFFF']],
            'fill'    => ['fillType' => 'solid', 'startColor' => ['rgb' => '0077B6']],
            'borders' => ['bottom' => ['borderStyle' => 'medium', 'color' => ['rgb' => 'CCCCCC']]],
        ]);

        // Alternating row shading
        for ($row = 2; $row <= $lastRow; $row++) {
            if ($row % 2 === 0) {
                $sheet->getStyle("A{$row}:O{$row}")->applyFromArray([
                    'fill' => ['fillType' => 'solid', 'startColor' => ['rgb' => 'F0F7FB']],
                ]);
            }
        }

        // Freeze header row
        $sheet->freezePane('A2');

        // Auto-filter on header row
        $sheet->setAutoFilter("A1:O1");

        return [];
    }
}


