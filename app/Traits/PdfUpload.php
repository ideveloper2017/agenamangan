<?php

namespace App\Traits;

trait PdfUpload
{
    public function pdfUpload($data)
    {
        $file = $data['file'];
        $name = uniqid('hospitalpdf', true) . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('pdf'), $name);
        $data['file'] = $name;
        return $data;

    }
}
