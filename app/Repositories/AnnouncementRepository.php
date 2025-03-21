<?php
namespace App\Repositories;

use App\Models\Announcement;
use App\Models\Application;
use App\Repositories\BaseRepository;

class AnnouncementRepository extends BaseRepository
{

public function __construct(Announcement $announcement)
{
    parent::__construct($announcement);
    
}
}