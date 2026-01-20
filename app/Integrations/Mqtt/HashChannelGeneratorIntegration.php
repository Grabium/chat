<?php
namespace App\Integrations\Mqtt;

use Illuminate\Support\Str;

final class HashChannelGeneratorIntegration 
{
    public static function generateChannel(): string
    {
        $hash = md5(Str::uuid()->toString());
        if(strlen($hash) > 32) {
            $hash = substr($hash, 0, 32);
        }
        return "channel_{$hash}";
    }
}