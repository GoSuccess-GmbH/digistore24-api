<?php

namespace GoSuccess\Digistore24\Controllers;
use GoSuccess\Digistore24\Abstracts\Controller;
use GoSuccess\Digistore24\Models\Monitoring\Ping;

class MonitoringController extends Controller
{
    /**
     * Ping Digistore24 server.
     * @link https://dev.digistore24.com/en/articles/88-ping
     * @return Ping|null
     */
    public function ping(): ?Ping
    {
        $data = $this->api->call( 'ping' );

        if ( ! $data )
        {
            return null;
        }

        return new Ping( $data );
    }
}
