<?php

namespace App\Traits;

trait FileUpload
{
    public function fileUpload($data)
    {
        $file = $data['image'];
        $name = uniqid('hospitalimage', true) . '.' . $file->getClientOriginalExtension();
//        $file->move(storage_path('/app/public/images'), $name);
        $file->move(public_path('uploads'), $name);
        $data['image'] = $name;
        return $data;

    }
}
