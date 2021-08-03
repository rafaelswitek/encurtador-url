<?php

namespace App\Services;

use App\Models\Url;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\RequiredIf;

class UrlService extends BaseService
{
    protected function getModel(): Url
    {
        return new Url;
    }

    protected function getRules(bool $saving): array
    {
        return [
            "url_original" => [
                new RequiredIf($saving),
                'url',
            ],
            "url_encurtada" => "unique:urls|min:5",
            "data_expiracao" => "date_format:Y-m-d"
        ];
    }

    public function save(array $data): array
    {
        $url_encurtada = $data["url_encurtada"] ?? null;
        $data["url_encurtada"] = $this->encurtaUrl($url_encurtada);
        $data["data_expiracao"] = $data["data_expiracao"] ?? date('Y-m-d', strtotime("+7 days"));

        return parent::save($data);
    }

    private function encurtaUrl(string $url = null): string
    {
        if ($url == null) {
            $hash = $this->randomString();
            return url("/{$hash}");
        }

        return url("/{$url}");
    }

    private function randomString()
    {
        $basic = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $return = '';

        for ($count = 0; 5 > $count; $count++) {
            $return .= $basic[rand(0, strlen($basic) - 1)];
        }

        return $return;
    }
}
