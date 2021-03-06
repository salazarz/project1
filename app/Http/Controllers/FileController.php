<?php

namespace App\Http\Controllers;

use App\File;
use Illuminate\Http\Request;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->has('file')) {
            $file = $request->file('file');
            $name = "_" . time();
            $fileName = $name . "." . $file->getClientOriginalExtension();
            $folder = '/public/storage/uploads';
            $filePath = $file->storeAs($folder, $fileName, 'public');

            $params = [
                'berkas' => $filePath,
                'no_berkas'=>$request->no_berkas,
                'nama_berkas'=>$request->nama_berkas,
                'status_berkas'=>1,
            ];
            File::create($params);
        }
    }
    
    
    
    /**
     * Display the specified resource.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function show(File $file)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function edit(File $file)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, File $file)
    {
        if ($request->has('file')) {
            $file = $request->file('file');
            $name = "_" . time();
            $fileName = $name . "." . $file->getClientOriginalExtension();
            $folder = '/public/storage/uploads';
            $filePath = $file->storeAs($folder, $fileName, 'public');
            $params = [
                'berkas' => $filePath,
                'status_berkas'=> Auth::user()->bidang->id,
            ];
            $file->update($params);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function destroy(File $file)
    {
        //
    }
}