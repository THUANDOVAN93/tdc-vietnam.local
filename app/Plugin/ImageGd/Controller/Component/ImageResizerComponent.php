<?php
/**
 * Image
 *
*/

class ImageResizerComponent extends Component {

    /**
     * 初期化
     *
     * @return 
     * @access public
     * @static
     */
    function init(){
    }


    /**
     * 縦幅横幅指定、枠内に収めるリサイズ
     *
     * @param string $dir       画像ディレクトリ
     * @param string $fromImg   リサイズ前画像名
     * @param string $toImg     リサイズ後画像名
     * @param string $width     横幅指定
     * @param string $height    横幅指定
     * @param bool   $bigResize 指定サイズが大きい場合に拡大リサイズを行うか true:行う false:行わない
     * 
     * @return boolean
     */
    function frame($dir, $fromImg, $toImg, $width, $height, $bigResize = true) {
        // 拡張子削除
        $spl = explode('.', $toImg);
        array_pop($spl);
        $toImg = implode('.', $spl);
        // リサイズ幅より大きい画像か
        $gis = getimagesize($dir . $fromImg);
        $wP = $width / $gis[0];
        $hP = $height / $gis[1];
        if ($wP <= $hP) {
            if ($bigResize || $gis[0] > $width) {
                // リサイズ
                $thumb = new ImageComponentProccess($dir . $fromImg);
                $thumb->name($toImg);
                $thumb->width($width);
                $thumb->save();
            } else {
                $ext = array_pop(explode('.', $fromImg));
                copy($dir . $fromImg, $dir . $toImg . '.' . $ext);
            }
        } else {
            if ($bigResize || $gis[1] > $height) {
                // リサイズ
                $thumb = new ImageComponentProccess($dir . $fromImg);
                $thumb->name($toImg);
                $thumb->height($height);
                $thumb->save();
            } else {
                $ext = array_pop(explode('.', $fromImg));
                copy($dir . $fromImg, $dir . $toImg . '.' . $ext);
            }
        }
    }

    /**
     * 横幅指定、縦なりゆきリサイズ
     *
     * @param string $dir       画像ディレクトリ
     * @param string $fromImg   リサイズ前画像名
     * @param string $toImg     リサイズ後画像名
     * @param string $width     横幅指定
     * @param bool   $bigResize 指定サイズが大きい場合に拡大リサイズを行うか true:行う false:行わない
     * 
     * @return boolean
     */
    function width($dir, $fromImg, $toImg, $width, $bigResize = true) {
        // 拡張子削除
        $spl = explode('.', $toImg);
        array_pop($spl);
        $toImg = implode('.', $spl);
        // リサイズ幅より大きい画像か
        $gis = getimagesize($dir . $fromImg);
        if ($bigResize || $gis[0] > $width) {
            // リサイズ
            $thumb = new ImageComponentProccess($dir . $fromImg);
            $thumb->name($toImg);
            $thumb->width($width);
            $thumb->save();
        }
    }

    /**
     * 縦幅指定、横なりゆきリサイズ
     *
     * @param string $dir       画像ディレクトリ
     * @param string $fromImg   リサイズ前画像名
     * @param string $toImg     リサイズ後画像名
     * @param string $height    縦幅指定
     * @param bool   $bigResize 指定サイズが大きい場合に拡大リサイズを行うか true:行う false:行わない
     * 
     * @return boolean
     */
    function height($dir, $fromImg, $toImg, $height, $bigResize = true) {
        // 拡張子削除
        $spl = explode('.', $toImg);
        array_pop($spl);
        $toImg = implode('.', $spl);
        // リサイズ幅より大きい画像か
        $gis = getimagesize($dir . $fromImg);
        if ($bigResize || $gis[1] > $height) {
            // リサイズ
            $thumb = new ImageComponentProccess($dir . $fromImg);
            $thumb->name($toImg);
            $thumb->height($height);
            $thumb->save();
        }
    }
    
    /**
     * リサイズ
     * 
     * @param string $dir     画像ディレクトリ
     * @param string $fromImg リサイズ前画像名
     * @param string $toImg   リサイズ後画像名
     * @param string $percent リサイズ倍率
     *
     * @return boolean
     * @access public
     * @static
     */
    function resize($dir, $fromImg, $toImg, $percent) {
        // 拡張子削除
        $spl = explode('.', $toImg);
        array_pop($spl);
        $toImg = implode('.', $spl);
        // リサイズ
        $thumb = new ImageComponentProccess($dir . $fromImg);
        $thumb->name($toImg);
        $thumb->resize($percent);
        $thumb->save();
    }
    
    /**
     * トリミング
     * 
     * @param string $dir     画像ディレクトリ
     * @param string $fromImg リサイズ前画像名
     * @param string $toImg   リサイズ後画像名
     * @param string $left    始点X
     * @param string $top     始点Y
     * @param string $width   切り取り横幅
     * @param string $height  切り取り縦幅
     *
     * @return 
     * @access public
     * @static
     */
    function crop($dir, $fromImg, $toImg, $left, $top, $width, $height) {
        // 拡張子削除
        $spl = explode('.', $toImg);
        array_pop($spl);
        $toImg = implode('.', $spl);
        $thumb = new ImageComponentProccess($dir . $fromImg);
        $thumb->name($toImg);
        $thumb->crop($left,$top);
        $thumb->width($width);
        $thumb->height($height);
        $thumb->save();
    }
    
    /**
     * 正方形になるように、縦か横をトリミングする
     * 
     * @param string $dir     画像ディレクトリ
     * @param string $fromImg リサイズ前画像名
     * @param string $toImg   リサイズ後画像名
     *
     * @return 
     * @access public
     * @static
     */
    function square($dir, $fromImg, $toImg) {
        if (!file_exists($dir . $fromImg)) {
            return false;
        }
        $gis = getimagesize($dir . $fromImg);
        if ($gis === false) {
            return false;
        }

        if ($gis[0] === $gis[1]) {
            return true;
        } elseif ($gis[0] > $gis[1]) {
            $sub = $gis[0] - $gis[1];
            $left = ceil($sub / 2);
            $this->crop($dir, $fromImg, $toImg, $left, 0, $gis[1], $gis[1]);
        } elseif ($gis[1] > $gis[0]) {
            $sub = $gis[1] - $gis[0];
            $top = ceil($sub / 2);
            $this->crop($dir, $fromImg, $toImg, 0, $top, $gis[0], $gis[0]);
        }
    }
    
    /**
     * 回転
     * 
     * @param string $dir     画像ディレクトリ
     * @param string $fromImg リサイズ前画像名
     * @param string $toImg   リサイズ後画像名
     * @param string $percent 回転角度
     *
     * @return boolean
     * @access public
     * @static
     */
    function rotate($dir, $fromImg, $toImg, $rotate) {
        // 拡張子削除
        $spl = explode('.', $toImg);
        array_pop($spl);
        $toImg = implode('.', $spl);
        // リサイズ
        $thumb = new ImageComponentProccess($dir . $fromImg);
        $thumb->name($toImg);
        $thumb->rotate($rotate);
        $thumb->rotateBlankColor(-1);
        $thumb->save();
    }
}

class ImageComponentProccess {
    
    var $file;
    var $image_width;
    var $image_height;
    var $width;
    var $height;
    var $ext;
    var $types = array('','gif','jpeg','png','swf');
    var $quality = 100;
    var $top = 0;
    var $left = 0;
    var $crop = false;
    var $type;
    var $rotate = 0;
    var $rotate_blank_color = -1;
    
    function ImageComponentProccess($name='') {
        $this->file               = $name;
        $info                     = getimagesize($name);
        $this->image_width        = $info[0];
        $this->image_height       = $info[1];
        $this->type               = $this->types[$info[2]];
        $info                     = pathinfo($name);
        $this->dir                = $info['dirname'];
        $this->name               = str_replace('.'.$info['extension'], '', $info['basename']);
        $this->ext                = $info['extension'];
        $this->rotate             = 0;
        $this->rotate_blank_color = 0;
    }
    
    function dir($dir='') {
        if(!$dir) return $this->dir;
        $this->dir = $dir;
    }
    
    function name($name='') {
        if(!$name) return $this->name;
        $this->name = $name;
    }
    
    function width($width='') {
        $this->width = $width;
    }
    
    function height($height='') {
        $this->height = $height;
    }
    
    function rotate($rotate='') {
        $this->rotate = $rotate;
    }
    
    function rotateBlankColor($color='') {
        $this->rotate_blank_color = $color;
    }
    
    function resize($percentage=50) {
        if($this->crop) {
            $this->crop = false;
            $this->width = round($this->width*($percentage/100));
            $this->height = round($this->height*($percentage/100));
            $this->image_width = round($this->width/($percentage/100));
            $this->image_height = round($this->height/($percentage/100));
        } else {
            $this->width = round($this->image_width*($percentage/100));
            $this->height = round($this->image_height*($percentage/100));
        }
        
    }
    
    function crop($top=0, $left=0) {
        $this->crop = true;
        $this->top = $top;
        $this->left = $left;
    }
    
    function quality($quality=80) {
        $this->quality = $quality;
    }
    
    function show() {
        $this->save(true);
    }
    
    function save($show=false) {

        if($show) @header('Content-Type: image/'.$this->type);
        
        if(!$this->width && !$this->height) {
            $this->width = $this->image_width;
            $this->height = $this->image_height;
        } elseif (is_numeric($this->width) && empty($this->height)) {
            $this->height = round($this->width/($this->image_width/$this->image_height));
        } elseif (is_numeric($this->height) && empty($this->width)) {
            $this->width = round($this->height/($this->image_height/$this->image_width));
        } else {
            if($this->width<=$this->height) {
                $height = round($this->width/($this->image_width/$this->image_height));
                if($height!=$this->height) {
                    $percentage = ($this->image_height*100)/$height;
                    $this->image_height = round($this->height*($percentage/100));
                }
            } else {
                $width = round($this->height/($this->image_height/$this->image_width));
                if($width!=$this->width) {
                    $percentage = ($this->image_width*100)/$width;
                    $this->image_width = round($this->width*($percentage/100));
                }
            }
        }
        
        if($this->crop) {
            $this->image_width = $this->width;
            $this->image_height = $this->height;
        }

        if($this->type=='jpeg') $image = imagecreatefromjpeg($this->file);
        if($this->type=='png') $image = imagecreatefrompng($this->file);
        if($this->type=='gif') $image = imagecreatefromgif($this->file);
        
        $new_image = imagecreatetruecolor($this->width, $this->height);
        imagecopyresampled($new_image, $image, 0, 0, $this->top, $this->left, $this->width, $this->height, $this->image_width, $this->image_height);

        if ($this->rotate > 0) {
            $new_image = imagerotate($new_image, $this->rotate, $this->rotate_blank_color);
        }

        $name = $show ? null: $this->dir.DIRECTORY_SEPARATOR.$this->name.'.'.$this->ext;
        if($this->type=='jpeg') imagejpeg($new_image, $name, $this->quality);
        if($this->type=='png') imagepng($new_image, $name);
        if($this->type=='gif') imagegif($new_image, $name);
        
        imagedestroy($image); 
        imagedestroy($new_image);
        
    }
    
}