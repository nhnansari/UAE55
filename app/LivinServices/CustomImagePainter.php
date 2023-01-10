<?php
namespace App\LivinServices;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Str;

class CustomImagePainter{
    public $emirates = "";
    public $letter = "";
    public $fontFile ="";
    public $picture="";
    public $fontSize = 120;
    public $letter_x=0;
    public $letter_y=0;
    public $license_x=0;
    public $license_y=0;
    public $contact_x=0;
    public $contact_y=0;
    private $font_path="";
    public $stamp = null;
    public $stamp_x = null;
    public $stamp_y = null;
    public $contact = "";
    public $contact_font_size = 50;
    public $letter_font_size = 100;
    public $contact_font_file = 'license_plate_usa.ttf';
    public $savePath=null;

    function __construct()
    {
        $this->fontFile= "LicensePlate-j9eO.ttf";//replace with your font
        $this->picture="newplate.png";//replace with your image
          $font_file = App::basePath('resources'.DIRECTORY_SEPARATOR.'fonts'.DIRECTORY_SEPARATOR.$this->fontFile);
        $this->font_path = $font_file;
    }

    public  function paint ($txt){
        $images_dir = App::basePath('resources'.DIRECTORY_SEPARATOR.'plates'.DIRECTORY_SEPARATOR.$this->picture);
        $font_file = App::basePath('resources'.DIRECTORY_SEPARATOR.'fonts'.DIRECTORY_SEPARATOR.$this->fontFile);
        $img= imagecreatefrompng($images_dir);
        $fontFile=  ($font_file);

        $fontColor = imagecolorallocate($img, 255, 255, 255);
        $black = imagecolorallocate($img, 0, 0, 0);
        $angle = 0;

        $iWidth = imagesx($img);
        $iHeight = imagesy($img);

        $tSize = imagettfbbox($this->fontSize, $angle, $fontFile, $txt);
        $tWidth = max([$tSize[2], $tSize[4]]) - min([$tSize[0], $tSize[6]]);
        $tHeight = max([$tSize[5], $tSize[7]]) - min([$tSize[1], $tSize[3]]);


        $image = $this->drawWithShadows($img,$txt,$this->license_x,$this->license_y);
        $image2=null;
        if($this->letter){
            $this->fontSize=80;
            $image2 = $this->drawWithShadows($image,$this->letter,$this->letter_x,$this->letter_y,$this->letter_font_size);
        }
        else{
            $image2=$image;
        }
       $image3 =null;
        if($this->contact!==""){
            $image3= $this->drawContact($image2,$this->contact,$this->contact_font_size,$black,$this->contact_x,$this->contact_y);
        }
        else{
            $image3 = $image2;
        }
        if($this->stamp){
            $image3=  $this->paintStamp($image3);
        }
        else{
            $image3=$image2;
        }

        if($this->savePath){
            imagepng($image3,$this->savePath); //save image
        }

        return $image3;
    }
    private function drawWithShadows($img,$txt,$x,$y,$font_size=null){
        //draw text shadows
        $fz = $font_size ?? $this->fontSize;
        $semiwhite = imagecolorallocatealpha($img, 155, 155, 155, 1);
        $img = $this->drawText($img,$txt,$fz,$semiwhite,$x+3,$y-2);

        $semiwhite = imagecolorallocatealpha($img, 255, 255, 255, 1);
        $img = $this->drawText($img,$txt,$fz,$semiwhite,$x-3,$y);

        $semiwhite = imagecolorallocatealpha($img, 255, 255, 255, 1);
        $img = $this->drawText($img,$txt,$fz,$semiwhite,$x-3,$y-3);

        $semiwhite = imagecolorallocatealpha($img, 255, 255, 255, 1);
        $img = $this->drawText($img,$txt,$fz,$semiwhite,$x,$y+3);

        $semiwhite = imagecolorallocatealpha($img, 255, 255, 255, 1);
        $img = $this->drawText($img,$txt,$fz,$semiwhite,$x+1,$y+1);

        $semiwhite = imagecolorallocatealpha($img, 150, 150, 150, 1);
        // $img = $this->drawText($img,$txt,$this->fontSize,$semiwhite,$x+1,$y+5);

        $black = imagecolorallocate($img, 0, 0, 0);
        //imagettftext($img, $fontSize, $angle, $centerX, $centerY, $black, $fontFile, $txt);
        $img = $this->drawText($img,$txt,$fz,$black,$x,$y);
        return $img;
    }
    private function drawText($image,$text,$fontSize,$color,$x,$y){
     //   $fontFile=  (__DIR__."/fonts/".$this->fontFile);
        $font_file = App::basePath('resources'.DIRECTORY_SEPARATOR.'fonts'.DIRECTORY_SEPARATOR.$this->fontFile);

        imagettftext($image, $fontSize, 0, $x, $y, $color, $font_file, $text);
        return $image;
    }
    private function drawContact($image,$text,$fontSize,$color,$x,$y){
         $font_file = App::basePath('resources'.DIRECTORY_SEPARATOR.'fonts'.DIRECTORY_SEPARATOR.$this->contact_font_file);

        imagettftext($image, $fontSize, 0, $x, $y, $color, $font_file, $text);
        return $image;
    }
    public function paintStamp($image){
        $stamp_dir = App::basePath('resources'.DIRECTORY_SEPARATOR.'stamps'.DIRECTORY_SEPARATOR.$this->stamp);

        $stamp= imagecreatefrompng($stamp_dir);
        //$stamp= imagecreatefrompng(__DIR__."/stamps/".$this->stamp);

        $width  = imagesx($image);
        $height = imagesy($image);

        $swidth  = imagesx($stamp);
        $sheight = imagesy($stamp);
        $diff = $width - $swidth;


        imagecopy($image, $stamp,  $this->stamp_x, $this->stamp_y, 0, 0, $swidth, $sheight);

        return $image;
    }

}
?>
