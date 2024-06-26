<?php

namespace App\Exports;

use App\Models\Transaction;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class TransactionExport implements FromCollection, WithHeadings
{
    private $transactions;
    public function __construct($transactions)
    {
        $this->transactions = $transactions;
    }


    public function collection()
    {
        $transactions = $this->transactions;
        $formatTransactions = [];

        foreach ($transactions as $key => $item) {
            $formatTransactions[] = [
                'id'      => $item->id,
                'total'   => number_format($item->tst_total_money,0,',','.'),
                'name'    => $item->tst_name,
                'email'   => $item->tst_email,
                'phone'   => $item->tst_phone,
                'address' => $item->tst_address,
                'status'  => $item->getStatus($item->tst_status)['name'],
                'type'    => $item->tst_user_id ? "Thành viên" : "Khách",
                'create'  => $item->created_at
            ];
        }

        return collect($formatTransactions);
    }

	public function registerEvents(): array
	{
		return [
			AfterSheet::class    => function(AfterSheet $event) {
				$event->sheet->styleCells(
					'C2:C1000',
					[
						'alignment' => [
							'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT,
						],
					]
				);
			},
		];
	}

    public function headings(): array
    {
        return [
            '#',
            'Tổng',
            "Name",
            'Email',
            'Phone',
            'Address',
            'Status',
            'Type',
            'Created',
        ];
    }
}
