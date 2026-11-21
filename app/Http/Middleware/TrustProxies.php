<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Fideloper\Proxy\TrustProxies as Middleware;

class TrustProxies extends Middleware
{
    /**
     * The trusted proxies for this application.
     *
     * @var array|string|null
     */
    protected $proxies = '*';

    /**
     * The headers that should be used to detect proxies.
     *
     * @var int
     */
    protected $headers = Request::HEADER_X_FORWARDED_FOR |
                         Request::HEADER_X_FORWARDED_HOST |
                         Request::HEADER_X_FORWARDED_PORT |
                         Request::HEADER_X_FORWARDED_PROTO |
                         Request::HEADER_X_FORWARDED_AWS_ELB;

    /**
     * Set the trusted proxies on the request, ensuring REMOTE_ADDR is non-null for serverless environments.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    protected function setTrustedProxyIpAddresses(Request $request)
    {
        if (!$request->server->has('REMOTE_ADDR') || empty($request->server->get('REMOTE_ADDR'))) {
            $forwarded = $request->header('x-forwarded-for');
            $ip = $forwarded ? explode(',', $forwarded)[0] : '127.0.0.1';
            $request->server->set('REMOTE_ADDR', trim($ip));
        }

        parent::setTrustedProxyIpAddresses($request);
    }
}
