<?php

namespace App\Traits;

use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

trait FileUpload{

    public function storeImages($images,string $path){

        if(is_array($images)){

            $path = array();

            foreach ($images as $image){
                $fileName = Carbon::now()->format('YmdHis').'_'.$image->getClientOriginalExtension();

                $directoryPath = $image->storeAs($path,$fileName);

                $path[] = $directoryPath;
            }

            return $path;

        }else{
            $extension = $images->getClientOriginalExtension();

            if(!in_array($extension,['jpg','png','jpeg','bmp'])){
                throw new \Exception('Invalid Type Of File');
            }

            $directoryPath = Storage::disk('public')->put($path, $images);

            $path = $directoryPath;

            return Storage::disk('public')->url($path);
        }

    }

    public function storePDF($file){
        $directoryPath = Storage::disk('local')->put('book/file', $file);
        $name = pathinfo($directoryPath)['filename'];
        $path = '/drive/'.$name.'/view';

        return config('app.url').$path;
    }

    public function storeFile($file){
        $extension = $file->getClientOriginalExtension();

        if(in_array($extension,['php','exe','sh','js','html'])){
            throw new \Exception('Invalid Type Of File');
        }

        $directoryPath = Storage::disk('public')->put('chat', $file);

        $path = $directoryPath;

        return Storage::disk('public')->url($path);
    }

}