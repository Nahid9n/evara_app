<?php


function demo(){

    return "Hello DEMO";

}

function imageUpload( $image, $directory ){


    $imageExtension = $image->getClientOriginalExtension();
    $imageName    = rand(10000,50000).'.'.$imageExtension;
    $image->move($directory, $imageName);

//    self::$image        = $request->file('image');
//    self::$extension    = self::$image->getClientOriginalExtension();
//    self::$imageName    = time().'.'.self::$extension;
//    self::$directory    = 'admin/img/ad-images/';
//    self::$image->move(self::$directory, self::$imageName);
//    return self::$directory.self::$imageName;

    return $directory.$imageName;

}


?>


