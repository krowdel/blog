<?php

class ImageTools extends Blog{
    
    private $fileUrl;

    public function __construct() {
        parent::__construct();
        $this->fileUrl=$this->config->coverUrl.'cover-';
    }

    private function proportions (array $dimensions=[1, 1]) {
        $confWidth=$this->config->coverSize[0];
        $confHeight=$this->config->coverSize[1];
        $aspectConfig=$confWidth/$confHeight;
        if ($confWidth >= $confHeight) { 
            $maxsize=$confWidth;
            $minsize=$confHeight; // echo ' - panorma kwadrat- ';
        } else { 
            $minsize=$confWidth; // echo ' - horyzont - ';
            $maxsize=$confHeight; // echo ' - horyzont - ';
        }
        $newSize=[];
        $newWidth=$dimensions[0];
        $newHeight=$dimensions[1];
        $aspect=$newWidth/$newHeight;
        if ($aspect==1) {
           $newSize['width']=$maxsize;
           $newSize['height']=$maxsize;
           if ($aspectConfig==1) {
                $crop[]=0;
                $crop[]=0;
            } elseif ($aspectConfig>1) { // '--- panorama z kwadratu ---';
                $crop[]=0;
                $crop[]=(int)($newSize['height']-$confHeight)/2;
            } elseif ($aspectConfig<1) { // '--- pion z kwadratu ---';
                $crop[]=(int)($newSize['width']-$confWidth)/2;
                $crop[]=0;    
            }
        }
        if ($aspect>1)  { // panorama
            $newSize['width']=(int)($aspect*$maxsize);
            $newSize['height']=$maxsize;
            if ($aspectConfig==1) {  // '--- kwadrat z panoramy ---';
                $crop[]=(int)($newSize['width']-$confWidth)/2;
                $crop[]=0;
            } elseif ($aspectConfig>1) {  // '--- panorama z panoramy ---';
                if ($aspectConfig>$aspect) {
                    $newSize['width']=$confWidth;
                    $newSize['height']=(int)($confWidth/$aspect);
                    $crop[]=0;
                    $crop[]=(int)(($newSize['height']-$confHeight)/2);
                } else {
                    $newSize['width']=(int)($aspect*$confHeight);
                    $newSize['height']=$confHeight;
                    $crop[]=($newSize['width']-$confWidth)/2;
                    $crop[]=0;
                }
            } elseif ($aspectConfig<1) { // pion
                $crop[]=(int)(($newSize['width']-$confWidth)/2);
                $crop[]=0;
            }
        }
        if ($aspect<1) { // pion
            $newSize['width']=$maxsize;
            $newSize['height']=(int)($maxsize/$aspect);
            if ($aspectConfig==1) {
                $crop[]=0;
                $crop[]=($newSize['height']-$confHeight)/2;
            } elseif ($aspectConfig>1) { // panorama // echo '--- panorama z pionu ---<br>';
                $crop[]=0;
                $crop[]=(int)($newSize['height']-$confHeight)/2;
            } elseif ($aspectConfig<1) { // '--- pion z pionu -------------------<br>';

                if ($aspectConfig>$aspect) {
                    $newSize['width']=$confHeight;
                    $newSize['height']=(int)($confHeight/$aspect);
                    $crop[]=(int)(($newSize['width']-$confWidth)/2);
                    $crop[]=0;
                } else {
                    $crop[]=0;
                    $crop[]=($newSize['height']-$confHeight)/2;
                }

            }
        }
        $crop[2]=$confWidth;
        $crop[3]=$confHeight;
        $newSize['crop']=$crop;
        return $newSize;
    }

    private function createImg($obraz) {
        switch($obraz['type']) {
            case 'image/jpeg': $loadCover = ImageCreateFromJpeg($obraz['tmp_name']); break;
            case 'image/jpg':  $loadCover = ImageCreateFromJpeg($obraz['tmp_name']); break;
            case 'image/png':  $loadCover = ImageCreateFromPng($obraz['tmp_name']); break;
            case 'image/gif':  $loadCover = ImageCreateFromGif($obraz['tmp_name']); break;
            case 'image/bmp':  $loadCover = ImageCreateFromBmp($obraz['tmp_name']); break;
            default: $loadCover=null;
        }
        // $exif = exif_read_data($obraz);
        // var_dump($exif);
        // if (isset($efix['IFD0']['Orientation']) && ($efix['IFD0']['Orientation']==8 || $efix['IFD0']['Orientation']==3 || $efix['IFD0']['Orientation']==6)){ 
        //     $orient=$efix['IFD0']['Orientation']; 
        // } else { 
        //     $orient=0; 
        // }
        // switch($orient) {
        //     case 8: $loadCover = imagerotate($loadCover,90,0); break;
        //     case 3: $loadCover = imagerotate($loadCover,180,0); break;
        //     case 6: $loadCover = imagerotate($loadCover,-90,0); break;
        // }  
        return $loadCover;
    }


    public function addCover(int $id) {

        $fileUrl=$this->fileUrl.$id.'.jpg';
        $obraz=$_FILES['cover']['tmp_name'];
        $loadCover = $this->createImg($_FILES['cover']);

        if ($loadCover) {

            $width=imagesx($loadCover);
            $height=imagesy($loadCover);
            $scaleSize=$this->proportions([$width, $height]);
            $crop=$scaleSize['crop'];
    
            $scale=imagecreatetruecolor($scaleSize['width'], $scaleSize['height']);
            $white = imagecolorallocate($scale, 255, 255, 255);
            imagefill($scale, 0, 0, $white);

            imagecopyresampled($scale, $loadCover, 0, 0, 0, 0, $scaleSize['width'], $scaleSize['height'], $width, $height);
    
            $cover=imagecreatetruecolor($this->config->coverSize[0], $this->config->coverSize[1]);
            imagecopyresampled($cover, $scale, 0, 0, $crop[0], $crop[1], $this->config->coverSize[0], $this->config->coverSize[1], $crop[2], $crop[3]);
    
            
            if (file_exists($fileUrl)) { unlink($fileUrl); }
            imagejpeg($cover, $fileUrl, 82);
            ImageDestroy($loadCover);
            ImageDestroy($scale);
            ImageDestroy($cover);
        } else {
            echo 'Obraz nie został dodany: Plik nie właściwego formatu';
        }       
    }

    public function deletCover(int $id) {
        $fileUrl=$this->fileUrl.$id.'.jpg';
        if (file_exists($fileUrl)) { unlink($fileUrl); }
    }
}