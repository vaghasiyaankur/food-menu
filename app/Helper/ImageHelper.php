<?php
namespace App\Helper;
use Illuminate\Support\Facades\File;

class ImageHelper{

    /* Use Store Every Image (Using Helper) */
    public static function storeImage($image, $path)
    {
        $image_name = $path.'/'.rand(10000000,99999999).".".$image->GetClientOriginalExtension();
        $image->move(public_path('storage/'.$path.'/'),$image_name);
        return $image_name;
    }
        
    /* Remove Image (Using Helper) */
    public static function removeImage($path)
    {
        $path_check = public_path()."/storage/$path";
        $result = File::exists($path_check);

        if($result)  File::delete($path_check);
        return true;
    }
}
?>