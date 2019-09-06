<?php

namespace App\Http\Controllers;


use App\Service\Management\ManagementInterface;

class ManagementController extends Controller
{
    public function index(ManagementInterface $managementService)
    {
        $result = $managementService->aggregateRequest();

        var_dump($result); exit;
    }

}
