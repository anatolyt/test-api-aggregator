<?php

namespace App\Service\Management;

interface ServiceInterface
{
    public function create($data);
    public function update($data);
    public function delete($data);
}