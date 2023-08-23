<?php

namespace App\Services;

use Illuminate\Support\Facades\Process;
use Illuminate\Support\Facades\Storage;

class TemplateCreateService
{
    private const STORAGE = '/var/www/html/storage/app/documents/';
    private const NO_HEADER = '-no-header';

    private const DOCX_FIL = 'doc';
    private const HTML_FIL = 'html';
    private const PDF_FIL = 'pdf';

    public static function get_html_without_headers(string $document): string
    {
        $nameOnly =  pathinfo($document, PATHINFO_FILENAME);

        $process = Process::path(self::STORAGE)->run('python3 script.py remove-header-symbol '  . $document);

        $process2 = Process::path(self::STORAGE)->run('python3 script.py convert-to ' . $nameOnly
            . self::NO_HEADER . '.docx' . ' ' . self::HTML_FIL);
        unlink(self::STORAGE . $nameOnly . self::NO_HEADER . '.docx');
        return file_get_contents(self::STORAGE . $nameOnly . self::NO_HEADER . '.html');
    }

    public static function moveUploadFromTempFolder(string $documentTempPath): void
    {
        Storage::copy($documentTempPath, '/documents/' . pathinfo($documentTempPath, PATHINFO_BASENAME));
    }

    public static function getHtmlWithoutHeaders(string $docName): string
    {
        $process = Process::path(self::STORAGE)->run('python3 script.py remove-header-symbol '  . $docName);

        // dd();
        $nameOnly =  pathinfo($docName, PATHINFO_FILENAME);

        $process2 = Process::path(self::STORAGE)->run('python3 script.py convert-to ' . $nameOnly
            . self::NO_HEADER . '.docx' . ' ' . self::HTML_FIL);
        unlink(self::STORAGE . $nameOnly . self::NO_HEADER . '.docx');

        return file_get_contents(self::STORAGE . $nameOnly . self::NO_HEADER . '.HTML');
    }

    public static function saveNewHtml(string $documentPath, string $htmlData): array
    {
        $nameOnly = pathinfo($documentPath, PATHINFO_FILENAME);
        $htmlPath = self::STORAGE . $nameOnly . '.html';
        $file = fopen($htmlPath, 'w') or exit("Couldn't open!");
        fwrite($file, $htmlData);
        fclose($file);
        unlink(self::STORAGE . $nameOnly . self::NO_HEADER . '.HTML');
        return [self::STORAGE . $nameOnly . '.docx', $htmlPath];
    }


    public static function setFinalPlaceholders($paths): void
    {

        $docName = pathinfo($paths[0], PATHINFO_FILENAME);
        $htmlName = pathinfo($paths[1], PATHINFO_FILENAME);

        copy(self::STORAGE . $htmlName . '.html', self::STORAGE . 'temp.html');
        $process = Process::path(self::STORAGE)->run('python3 script.py convert-to ' . 'temp.html'
            . ' ' . self::DOCX_FIL);
        $process2 = Process::path(self::STORAGE)->run('python3 script.py set-fields ' . $docName . '.docx' . ' ' . 'temp.docx');


        unlink(self::STORAGE . 'temp.html');
        unlink(self::STORAGE . 'temp.docx');
    }

    public static function fillInAndGetPdf($filePath, $data): string
    {
        $fileName = pathinfo($filePath, PATHINFO_BASENAME);
        $fileNameOnly = pathinfo($filePath, PATHINFO_FILENAME);
        file_put_contents(self::STORAGE . $fileNameOnly . '.json', $data);
        // dd(json_encode($data));
        $process = Process::path(self::STORAGE)->run('python3 script.py fill-in ' . $fileName . ' ' . self::STORAGE . $fileNameOnly . '.json');
        // dd($process->errorOutput());

        $process2 = Process::path(self::STORAGE)->run('python3 script.py convert-to ' . 'FILLED_IN-' . $fileNameOnly . '.docx' . ' ' . self::PDF_FIL);

        unlink(self::STORAGE . $fileNameOnly . '.json');
        unlink(self::STORAGE . 'FILLED_IN-' . $fileNameOnly . '.docx');

        return self::STORAGE . 'FILLED_IN-' . $fileNameOnly . '.pdf';
    }
}
