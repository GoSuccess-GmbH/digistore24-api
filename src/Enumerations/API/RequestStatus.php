<?php

namespace GoSuccess\Digistore24\Enumerations\API;

enum RequestStatus: string
{
    case Pending = 'pending';
    case Aborted = 'aborted';
    case Completed = 'completed';
}
