<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Operation;

class StatisticsController extends Controller
{
    public function index(array $filters = []): array
    {
        $salesSum = Operation::whereNull('buyer_id')
            ->sum('sum');

        $purchasesSum = Operation::whereNotNull('buyer_id')
            ->sum('sum');

        $statistics = Organization::with(['operations'])->get()->map(function ($org) use ($salesSum, $purchasesSum) {
            $sales = Operation::where('seller_id', $org->id)->sum('sum') ?? 0;
            $purchases = Operation::where('buyer_id', $org->id)->sum('sum') ?? 0;

            return [
                'id' => $org->id,
                'name' => $org->name,
                'sales_sum' => $sales,
                'purchases_sum' => $purchases,
            ];
        });

        if (!empty($filters['organization_id'])) {
            $statistics = $statistics->filter(function ($item) use ($filters) {
                return $item['id'] == $filters['organization_id'];
            })->first();
        }

        return [
            'sales_sum' => $salesSum,
            'purchases_sum' => $purchasesSum,
            'statistics' => $statistics->values()->all(),
        ];
    }
}
