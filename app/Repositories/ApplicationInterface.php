<?php
namespace App\Repositories;

Interface ApplicationInterface
{
    public function withdraw($id);
    public function updateApplicationStatus($applictaion, $status);
}