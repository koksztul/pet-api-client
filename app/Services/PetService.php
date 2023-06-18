<?php

namespace App\Services;

class PetService
{
    public function prepareData(array $data, int $id = null)
    {
        $tags = $this->prepareTags(empty($data['tags']) ? "" : $data['tags']);

        $formatedData = [
            'id' => $id,
            'category' => [
                'name' => empty($data['category']) ? "" : $data['category'],
            ],
            'name' => $data['name'],
            'photoUrls' => [empty($data['photoUrls']) ? "" : $data['photoUrls']],
            'tags' => $tags,
            'status' => empty($data['status']) ? "" : $data['status'],
        ];
        return $formatedData;
    }

    private function prepareTags(string $tags): array
    {
        $tagsArray = explode(",", $tags);
        $tags = [];

        foreach ($tagsArray as $tagValue) {
            $tag = [
                "name" => $tagValue,
            ];
            $tags[] = $tag;
        }

        return $tags;
    }
}