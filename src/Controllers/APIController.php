<?php

namespace GoSuccess\Digistore24\Controllers;

use GoSuccess\Digistore24\Abstracts\Controller;
use GoSuccess\Digistore24\Models\API\RequestApiKeyRequest;
use GoSuccess\Digistore24\Models\API\RequestApiKeyResponse;
use GoSuccess\Digistore24\Models\API\RetrieveApiKeyRequest;
use GoSuccess\Digistore24\Models\API\RetrieveApiKeyResponse;

class APIController extends Controller
{
    /**
     * Request API Key.
     * @link https://dev.digistore24.com/en/articles/94-requestapikey
     * @param \GoSuccess\Digistore24\Models\API\RequestApiKeyRequest $request
     * @return RequestApiKeyResponse|null
     */
    public function request( RequestApiKeyRequest $request ): ?RequestApiKeyResponse
    {
        $data = $this->api->call(
            'requestApiKey',
            $request->permissions->value,
            $request->return_url,
            $request->cancel_url,
            $request->site_url,
            $request->comment,
        );
        
        if( ! $data )
        {
            return null;
        }

        return new RequestApiKeyResponse( $data );
    }
    /**
     * Retrieve API Key.
     * @link https://dev.digistore24.com/en/articles/97
     * @param \GoSuccess\Digistore24\Models\API\RetrieveApiKeyRequest $request
     * @return RetrieveApiKeyResponse|null
     */
    public function retrieve( RetrieveApiKeyRequest $request ): ?RetrieveApiKeyResponse
    {
        $data = $this->api->call(
            'retrieveApiKey',
            $request->token,
        );
        
        if( ! $data )
        {
            return null;
        }

        return new RetrieveApiKeyResponse( $data );
    }
}
