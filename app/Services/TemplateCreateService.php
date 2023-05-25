<?php

namespace App\Services;

use Illuminate\Support\Facades\Process;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpWord\IOFactory;

class TemplateCreateService
{
    private const STORAGE = '/var/www/html/storage/app/documents/';
    private const NO_HEADER = '-no-header';
    private const HTML_FIL = 'HTML_FILTER';
    private const DOCX_FIL = 'DOCX_FILTER';
    private const PDF_FIL = 'PDF_FILTER';

    public static function get_html_without_headers(string $document): string
        {
            $nameOnly =  pathinfo($document, PATHINFO_FILENAME);

            $process = Process::path(self::STORAGE)->run('p4s remove_headers_and_placeholder_symbols' .' ' .$document);
            dd($process->exitCode());
            $process2 = Process::path(self::STORAGE)->run('p4s convert_to '.$nameOnly
                                                                          . self::NO_HEADER . '.docx' .' ' .self::HTML_FIL);
            unlink(self::STORAGE . $nameOnly . self::NO_HEADER . '.docx');

            return file_get_contents(self::STORAGE . $nameOnly . self::NO_HEADER . '.html');
        }

    // private const DOCX_EXT = '.docx';

    // private const HTML_EXT = '.html';

    // private const NO_HEADERS = '_no_headers';

    // private $uploadedPath;

    // private $workingDi

    // private $fileWithoutExt;

    // public function __construct($docxName)
    // {
    //     $this->uploadedPath = Storage::disk('local')->path( $docxName);
    //     $this->workingDir = pathinfo($this->uploadedPath, PATHINFO_DIRNAME);
    //     $this->fileWithoutExt = pathinfo($docxName, PATHINFO_FILENAME);
    // }

    // public function get_html_without_headers(): string
    // {
    //     $newFileName = $this->fileWithoutExt . self::NO_HEADERS;

    //     $result = Process::path($this->workingDir)->run('p4s remove-headers' . ' ' . $this->fileWithoutExt . ' ' . $newFileName);
    //     $result2 = Process::path($this->workingDir)->run("libreoffice --headless --convert-to html --infilter='MS Word 2007 XML'" . ' ' . $newFileName . self::DOCX_EXT);

    //     unlink($this->workingDir . '/' . $this->fileWithoutExt . self::NO_HEADERS . self::DOCX_EXT);

    //     return file_get_contents($this->workingDir . '/' . $newFileName . self::HTML_EXT);
    // }

    // public function create_placeholder_json($html): string
    // {
    //     preg_match_all('/{{([^}]+)}}/', $html, $out);
    //     $data = [];
    //     foreach ($out[0] as $placeholder) {
    //         array_push($data, $placeholder);
    //     }
    //     return json_encode($data);
    // }

    // public function save_file_and_update_template($html): array
    // {
    //     $newFileName = $this->fileWithoutExt . self::NO_HEADERS;
    //     $pathNew = $this->workingDir . '/' . $newFileName;
    //     $pathOld = $this->workingDir . '/' . $this->fileWithoutExt;

    //     $file = fopen($pathNew . self::HTML_EXT, 'w') or exit("Couldn't open!");
    //     fwrite($file, $html);
    //     fclose($file);

    //     // No need to convert to docx & update original with template placeholders
    //     // at this point. Will do this as a final step, when user wants to view
    //     // the full & completed document

    //     // $result = Process::path($this->workingDir)->run("libreoffice --headless --convert-to docx:'MS Word 2007 XML' --infilter='HTML Document'" . ' ' . $newFileName . '.html');
    //     // $result2 = Process::path($this->workingDir)->run('p4s set-template-fields' . ' ' . $this->fileWithoutExt . self::DOCX_EXT . ' ' . $newFileName . self::DOCX_EXT);

    //     // unlink($pathNew . self::DOCX_EXT);

    //     return [$pathOld, $pathNew];
    // }
}
