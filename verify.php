<?php
//产生验证码
function generateVerify($type=2,$length=4,$width=100,$height=30) {
    //产生一个画布
    $image = imagecreatetruecolor($width, $height);
    //背景色
    $white = imagecolorallocate($image, 255, 255, 255);
    //填充图像
    imagefilledrectangle($image, 0, 0, $width, $height, $white);
    //随机颜色
    function randColor($image) {
        //mt_rand($min,$max) 从$min到$max随机一个整数
        return imagecolorallocate($image, mt_rand(0,255), mt_rand(0,255), mt_rand(0,255));
    }
    
    switch ($type) {
        case 0:
            //range($min,$max)从$min到$max默认加一，如下就是0，1，2，3，4，5，6，7，8，9
            //array_rand(array $array,$length)从第一个数组参数随机取得第二个参数个数的数，如3就随机取3个键名，记住是键名
            //join(第一个参数，第二个参数)把第二个参数的值按第一个参数分开组成的字符串，第一个参数默认为空格
            $str = join('', array_rand(range(0,9),$length));
            break;
        case 1:
            //array_merge(),把参数合并成一个
            //array_flip(),把数组的键名和键值对换
            $str = join('', array_rand(array_flip(array_merge(range('a','z'),range('A','Z'))),$length));
            break;
        case 2:
            $str = join('', array_rand(array_flip(array_merge(range(0,9),range('a','z'),range('A','Z'))),$length));
            break;
    }
    for ($i=0;$i<$length;$i++) {
        //imagettftext()把字符串写入图像中，有6个参数，第一个参数是指定图像，第二个是字体大小，第三个是字体的方向，第三个是x坐标，第四个是y坐标，第五个是字体类型的路径，第六个是要写入的字符串
        imagettftext($image, 16, mt_rand(-30,30), $i*($width/$length), mt_rand($height-15,25), randColor($image), 'msyh.ttf', $str[$i]);
    }
    for ($i=1;$i<=100;$i++) {
        //imagesetpixel() 画一个单一像素
        imagesetpixel($image, mt_rand(0,$width), mt_rand(0,$height), randColor($image));
    }
    header('Content-Type:image/png');
    //让图像以.png后缀显示出来
    imagepng($image);
    //销毁资源
    imagedestroy($image);
    return $str;
}
?>