<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Organization;
use Illuminate\Pagination\AbstractPaginator;

class OrganizationController extends Controller
{
    public function index(int $page = 1): array
    {
        $perPage = 25;
        $organizations = Organization::paginate($perPage);

        return [
            'data' => $organizations->items(),
            'meta' => [
                'current_page' => $organizations->currentPage(),
                'total_pages' => $organizations->lastPage(),
                'per_page' => $perPage,
            ],
        ];
    }

    public function show(Organization $organization): array
    {
        return [
            'id' => $organization->id,
            'name' => $organization->name,
            'operations' => $organization->getOperations()->toArray(),
        ];
    }
}
