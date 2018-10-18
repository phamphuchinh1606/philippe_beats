<?php
namespace App\Common;

class Utils{

    //path image
    public static $PATH__IMAGE = "images/upload";
    //path default image
    public static $PATH__DEFAULT__IMAGE = "images/no_image_available.jpg";
    //path default avatar
    public static $PATH__DEFAULT__AVATAR = "images/no_image_available.jpg";

    public static $API_NAME_TWITTER = 'twitter';
    public static $API_NAME_FACEBOOK = 'facebook';
    public static $API_NAME_INSTAGRAM = 'instagram';

    public static $EVENT_STATUS_PUBLIC = "Public";
    public static $EVENT_STATUS_UN_PUBLIC = "Un Public";

    public static $ACTION_NAME_IM_GOING = "I’m going";
    public static $ACTION_NAME_SHARE_FB = "Share";
    public static $ACTION_NAME_SHARE_INSTAGRAM = "Share Instagram";
    public static $ACTION_NAME_POST_VIDEO_INSTAGRAM = "Post video Instagram";
    public static $ACTION_NAME_POST_VIDEO_BEATS_CITY = "Post video Beats City";

    public static $IS_DELETE_ON = "1";
    public static $IS_DELETE_OFF = "0";


    public static function pathUploadImage($foderName){
        $pathUploadImage = config('app.path_upload_image');
        if(!isset($pathUploadImage)){
            $pathUploadImage = public_path();
        }
        return $pathUploadImage.'/'.$foderName;
    }

}
