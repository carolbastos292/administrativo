function updateAPK($id){

   $name = $id.".apk";
   $temp = $_FILES["application"]["tmp_name"];
   $extension = array("application/octet-stream","application/vnd.android.package-archive");
   $DIR = "android/";

   

    // apk format validation
    if(in_array($_FILES["application"]["type"],$extension )){

        //create directory if not exist
        if(!dirExist($DIR)){
            createDir($DIR);
        }

        if(move_uploaded_file($temp,$DIR."\\{$name}")){
            return true;
        }
    }
    return false;
}