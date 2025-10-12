<?php

declare(strict_types=1);

namespace GoSuccess\Digistore24\Controllers;

use GoSuccess\Digistore24\Abstracts\Controller;
use GoSuccess\Digistore24\Models\User\Info;

class UserController extends Controller
{
    /**
     * Get user info
     * @link https://dev.digistore24.com/en/articles/57-getuserinfo
     * @return Info|null
     */
    public function getInfo(): ?Info
    {
        $data = $this->api->call('getUserInfo');
        
        if (!$data) {
            return null;
        }

        return new Info($data);
    }
}
