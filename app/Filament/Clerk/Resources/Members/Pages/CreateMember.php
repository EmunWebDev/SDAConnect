<?php

namespace App\Filament\Clerk\Resources\Members\Pages;

use App\Filament\Clerk\Resources\Members\MemberResource;
use Filament\Resources\Pages\CreateRecord;

class CreateMember extends CreateRecord
{
    protected static string $resource = MemberResource::class;
}
