<?php


namespace App\Http\Responses\Api\v1;

class FileResponse
{
    public static function getFileResponse($status, $name, $link)
    {
        return response()->json([
            'file' => [
                'status' => $status,
                'name' => $name,
                'link' => $link
            ]
        ], intval($status));
    }
}
