<?php

namespace App\Filament\Clerk\Resources\Announcements\Pages;

use App\Filament\Clerk\Resources\Announcements\AnnouncementResource;
use Filament\Resources\Pages\CreateRecord;

class CreateAnnouncement extends CreateRecord
{
    protected static string $resource = AnnouncementResource::class;
}
