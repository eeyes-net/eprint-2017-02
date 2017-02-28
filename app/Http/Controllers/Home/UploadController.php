<?php

namespace App\Http\Controllers\Home;

use App\Upload;

class UploadController extends Controller
{
    public function index()
    {
        $uploads = auth()->user()->uploads()->latest()->paginate();
        return view('home.uploads.index', compact('uploads'));
    }

    public function create()
    {
        return view('home.uploads.create');
    }

    public function store()
    {
        if (!request()->hasFile('file')) {
            return back()->withErrors(['请选择上传的文件']);
        }
        $file = request()->file('file');
        $extension = strtolower($file->getClientOriginalExtension());
        if (!in_array($extension, config('upload.extensions'))) {
            return back()->withErrors(['不支持' . $extension . '，仅支持：' . implode(' ', config('upload.extensions'))]);
        }

        $upload = Upload::createFromUpload($file);
        auth()->user()->uploads()->save($upload);

        $pages = get_pdf_pages(config('filesystems.disks.uploads.root') . '/' . $upload->rel_path);
        if ($pages) {
            $upload->setMeta('pages', $pages);
        }

        return redirect(action('Home\UploadController@index'));
    }
}
