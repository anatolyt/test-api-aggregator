<?php

namespace App\Http\Controllers;


use App\Service\Management\ManagementInterface;

class ManagementController extends Controller
{
    public function index(ManagementInterface $managementService)
    {
        $result = $managementService->aggregateRequest();

        return response(json_encode($result), 200)
            ->header('Content-Type', 'application/json');
    }

}
