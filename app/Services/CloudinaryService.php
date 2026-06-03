<?php

namespace App\Services;

use GuzzleHttp\Client;
use Illuminate\Http\UploadedFile;
use RuntimeException;

class CloudinaryService
{
    public function __construct(private ?Client $client = null)
    {
        $this->client ??= new Client(['timeout' => 30]);
    }

    public function isConfigured(): bool
    {
        return filled(config('services.cloudinary.cloud_name'))
            && filled(config('services.cloudinary.api_key'))
            && filled(config('services.cloudinary.api_secret'));
    }

    public function uploadBeneficiaryImage(UploadedFile $file): string
    {
        if (! $this->isConfigured()) {
            throw new RuntimeException('Cloudinary is not configured.');
        }

        $cloudName = config('services.cloudinary.cloud_name');
        $timestamp = time();
        $folder = trim((string) config('services.cloudinary.beneficiary_folder', 'beneficiaries'), '/');
        $params = [
            'timestamp' => $timestamp,
        ];

        if ($folder !== '') {
            $params['folder'] = $folder;
        }

        $multipart = [
            [
                'name' => 'file',
                'contents' => fopen($file->getRealPath(), 'r'),
                'filename' => $file->getClientOriginalName(),
            ],
            [
                'name' => 'api_key',
                'contents' => config('services.cloudinary.api_key'),
            ],
            [
                'name' => 'timestamp',
                'contents' => (string) $timestamp,
            ],
            [
                'name' => 'signature',
                'contents' => $this->signature($params),
            ],
        ];

        if ($folder !== '') {
            $multipart[] = [
                'name' => 'folder',
                'contents' => $folder,
            ];
        }

        $response = $this->client->post("https://api.cloudinary.com/v1_1/{$cloudName}/image/upload", [
            'multipart' => $multipart,
        ]);

        $payload = json_decode((string) $response->getBody(), true);

        if (empty($payload['secure_url'])) {
            throw new RuntimeException('Cloudinary did not return an image URL.');
        }

        return $payload['secure_url'];
    }

    private function signature(array $params): string
    {
        ksort($params);

        $signatureBase = collect($params)
            ->map(fn ($value, $key) => "{$key}={$value}")
            ->implode('&');

        return sha1($signatureBase . config('services.cloudinary.api_secret'));
    }
}
