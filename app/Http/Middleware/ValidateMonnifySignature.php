<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class ValidateMonnifySignature
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (! $this->isValidSignature($request)) {
            throw new BadRequestHttpException('invalid monnify signature');
        }

        return $next($request);
    }

    protected function isValidSignature(Request $request): bool
    {
        $monnifyHash = $request->header->get('monnify-signature');

        $computedHash = hash_hmac('sha512', $request->getContent(), config('services.monnify.secret'));

        return hash_equals($monnifyHash, $computedHash);
    }
}
