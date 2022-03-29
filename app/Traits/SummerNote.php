<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

trait SummerNote{

    public function GenerateSummerNote($content,$model=null,$id=null){

        $dom = new \DomDocument();
	$a = ["&eth;&#159;&curren;&#151;", "&iuml;&raquo;&iquest;", "&Atilde;&cent;&acirc;&#130;&not;", "&Euml;&#156;", "&not;&acirc;&#132;&cent;", "&acirc;&#132;&cent;", "&eth;&#159;&#152;&#135;", "&acirc;&#128;&#157;", "&acirc;&#128;&#156;", "&iexcl;", "&cent;", "&pound;", "&curren;", "&yen;", "&brvbar;", "&sect;", "&uml;", "&ordf;", "&laquo;", "&not;", "&macr;", "&plusmn;", "&micro;", "&para;", "&cedil;", "&raquo;", "&iquest;", "&Euml;", "&acirc;", "&eth;" ];
	$b = ["", "", '"', " ", " ", " ", " ", '"', '"', "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];

	if(!$this->isHtml($content)){
	   return str_replace($a,$b,$content);
	}

        $dom->loadHtml($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

        $images = $dom->getElementsByTagName('img');

        foreach($images as $k => $img){

            $data = $img->getAttribute('src');

            if(filter_var($data,FILTER_VALIDATE_URL)){
                continue;
            }

            list($type, $data) = explode(';', $data);

            list(, $data)      = explode(',', $data);

            $data = base64_decode($data);

            $image_name= "/storage/summernote/" ."$model-$id". time().$k.'.png';

            $path = public_path() . $image_name;

            file_put_contents($path, $data);

            $img->removeAttribute('src');

            $img->setAttribute('src', url($image_name));

        }

        $content = $dom->saveHTML();
	
	//$content = substr($content,3,-5);

	$content = str_replace($a,$b,$content);
	$content = preg_replace("/&#[0-9]+;/", "", $content);
        return str_replace("/&Atilde;/g", '"', $content);
    }

    private function isHtml($text){
  	return preg_match("/<[^<]+>/",$text,$m) != 0;
    }

}