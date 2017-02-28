<?php

if (!function_exists('human_file_size')) {
    /**
     * 对人类友好的文件大小
     *
     * @param  int $size
     *
     * @return string
     */
    function human_file_size($size)
    {
        if ($size >= 1 << 30) {
            return number_format($size / (1 << 30), 2) . "GiB";
        }
        if ($size >= 1 << 20) {
            return number_format($size / (1 << 20), 2) . "MiB";
        }
        if ($size >= 1 << 10) {
            return number_format($size / (1 << 10), 2) . "KiB";
        }
        return number_format($size) . " B";
    }
}

if (!function_exists('get_pdf_pages')) {
    /**
     * 获取PDF页数
     *
     * @param string $path
     *
     * @return string
     */
    function get_pdf_pages($path)
    {
        $pdfinfo = env('BIN_PDFINFO');
        if (!$pdfinfo) {
            return false;
        }
        exec($pdfinfo . ' ' . escapeshellarg($path), $output);
        foreach ($output as $op) {
            if (1 === preg_match('/Pages:\s*(\d+)/i', $op, $matches)) {
                return (int)($matches[1]);
            }
        }
        return false;
    }
}
