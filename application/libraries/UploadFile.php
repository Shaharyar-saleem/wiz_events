<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UploadFile
{

    public function __construct()
    {
        $this->CI = &get_instance();
    }

    // Upload Multi Image
    public function uploadMultiFiles($file_name, $directoryPath, $allowedType, $maxSize)
    {
        if (!empty($_FILES[$file_name]["name"][0])) {
            // retrieve the number of images uploaded;
            $numberOfFiles = sizeof($_FILES[$file_name]['tmp_name']);
            $files = $_FILES[$file_name];

            $errors = array();
            $this->CI->load->library('upload');
            // next we pass the upload path for the images
            for ($i = 0; $i < $numberOfFiles; $i++) {
                $fileType = explode('.', $files['name'][$i]);
                $fileTypeTemp = explode('/', $files['type'][$i]);
                $newImageName = md5(time() . $files['name'][$i]);
                $corr_image_name[] =  $files['name'][$i];
                $image_type[] =  $files['type'][$i];
                $newImageName .= ".$fileType[1]";
                $_FILES['storeImage']['name'] = $newImageName;
                $_FILES['storeImage']['type'] = $files['type'][$i];
                $_FILES['storeImage']['tmp_name'] = $files['tmp_name'][$i];
                $_FILES['storeImage']['size'] = $files['size'][$i];
                $config['allowed_types'] = $allowedType;
                $config['upload_path'] = $directoryPath;
                $config['max_size'] = $maxSize;
                $imageNames[] = "$directoryPath" . $_FILES['storeImage']['name'];
                $this->CI->upload->initialize($config);
                if (!$this->CI->upload->do_upload("storeImage")) {
                    $error = array('error' => $this->CI->upload->display_errors());
                    $error = $error['error'];
                    $numItems = count($imageNames);
                    $i = 0;
                    // Delete Images If Error Occour
                    foreach ($imageNames as $key => $imgName) {
                        if (++$i !== $numItems) {
                            unlink($imgName);
                        }
                    }
                    return json_encode(array(
                        'status' => 0,
                        'status_message' => 'File Type Error',
                        'error' => $error,
                    ));
                }
            }
            return json_encode(array(
                'status' => 1,
                'status_message' => 'Successfully Image Upload',
                'file_path' => $imageNames,
                'file_name' => $corr_image_name,
                'file_type' => $image_type
            ));
        }
        return json_encode(array(
            'status' => 0,
            'status_message' => 'Empty File',
            'error' => "Please Select File",
        ));
    }

    public function uploadsingleimage($file_name, $directoryPath, $allowedType, $maxSize)
    {
        if (!empty($_FILES[$file_name]['name'])) {
            $new_name_upload_file = md5(time() . $_FILES[$file_name]['name']);
            $files = $_FILES[$file_name];
            $config['file_name'] = $new_name_upload_file;
            $config['upload_path'] = $directoryPath;
            $config['allowed_types'] = $allowedType;
            $config['max_size'] = $maxSize;
            $this->CI->load->library('upload', $config);
            if (!$this->CI->upload->do_upload($file_name)) {
                $error = array('error' => $this->CI->upload->display_errors());
                return json_encode(array(
                    'status' => 0,
                    'status_message' => 'File Type Erorr',
                    'error' => $error["error"],
                ));
            }
            $imageData = array('upload_data' => $this->CI->upload->data());
            $ImagePath = $directoryPath . "/";
            $corr_image_name =  $files['name'];
            $ImagePath .= $imageData["upload_data"]["orig_name"];
            $image_type =  $files['type'];
            return json_encode(array(
                'status' => 1,
                'status_message' => 'Successsfullt Upload File',
                'file_path' => $ImagePath,
                'file_type' => $image_type,
                'file_name' => $corr_image_name,
            ));
        }
        return json_encode(array(
            'status' => 0,
            'status_message' => 'Empty File',
            'error' => "Please Select Image",
        ));
    }
    public function imageCompress($imageName)
    {
        if (is_array($imageName)) {
            foreach ($imageName as $key => $img) {
                $info = getimagesize($img);
                $this->compressImg($info, $img);
            }
        } else {
            $info = getimagesize($imageName);
            $this->compressImg($info, $imageName);
        }
    }
    public function compressImg($info, $img)
    {
        if ($info['mime'] == 'image/jpeg') {
            $image = imagecreatefromjpeg($img);
        } elseif ($info['mime'] == 'image/gif') {
            $image = imagecreatefromgif($img);
        } elseif ($info['mime'] == 'image/png') {
            $image = imagecreatefrompng($img);
        }

        imagejpeg($image, $img);
    }

}
