<?php

namespace App\Http\Middleware;

use Closure;
use GeoIp2\Database\Reader;
use GeoIp2\Exception\AddressNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class GeoBlock
{
    private const ALLOWED_COUNTRY = 'ZA';
    private const DB_PATH         = 'geoip/GeoLite2-Country.mmdb';

    public function handle(Request $request, Closure $next): Response
    {
        if (!config('services.geoblock.enabled', true)) {
            return $next($request);
        }

        $dbPath = storage_path('app/' . self::DB_PATH);

        if (!file_exists($dbPath)) {
            Log::warning('GeoBlock: database file not found — skipping check', ['path' => $dbPath]);
            return $next($request);
        }

        $ip = $request->ip();

        // Always allow private/loopback ranges (local dev, internal proxies)
        if ($this->isPrivateIp($ip)) {
            return $next($request);
        }

        try {
            $reader  = new Reader($dbPath);
            $record  = $reader->country($ip);
            $country = $record->country->isoCode;

            if ($country !== self::ALLOWED_COUNTRY) {
                Log::info('GeoBlock: blocked non-ZA submission', [
                    'ip'      => $ip,
                    'country' => $country,
                    'url'     => $request->fullUrl(),
                ]);

                // Generic message — do not reveal the real reason
                return redirect()->back()
                    ->with('error', 'Sorry, we are unable to process your request at this time.')
                    ->withInput();
            }
        } catch (AddressNotFoundException) {
            // IP not in the database — fail open, do not block
            Log::warning('GeoBlock: IP not in database — allowing', ['ip' => $ip]);
        } catch (\Exception $e) {
            // Any other error — fail open
            Log::error('GeoBlock: unexpected error — allowing', ['error' => $e->getMessage()]);
        }

        return $next($request);
    }

    private function isPrivateIp(string $ip): bool
    {
        return filter_var(
            $ip,
            FILTER_VALIDATE_IP,
            FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE
        ) === false;
    }
}
