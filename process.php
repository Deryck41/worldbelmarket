<?php

// Comment if you don't want to allow posts from other domains
header('Access-Control-Allow-Origin: *');

// Allow the following methods to access this file
header('Access-Control-Allow-Methods: OPTIONS, GET, DELETE, POST, HEAD, PATCH');

// Allow the following headers in preflight
header('Access-Control-Allow-Headers: content-type, upload-length, upload-offset, upload-name');

// Allow the following headers in response
header('Access-Control-Expose-Headers: upload-offset');

// Load our configuration for this server
require_once('config.php');
require("./util/uploadmedia.php");
require("./util/read_write_functions.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Ensure that the filepond input name matches the actual file input name
    $files = $_FILES["filepond"];
    $imageName = null;
    $id = null;
    $errors = [];

    function saveImagesToTempLocation($uploadedFile) {
        global $imageName;
        global $id;
        global $errors;

        // Check that there were no errors while uploading the file
        if (isset($uploadedFile)) {
            $imageName = uploadImage($uploadedFile, UPLOAD_DIR);
            if (!$imageName){
                echo "BLYAD";
            }
            if ($imageName) {
                $filePointer = UPLOAD_DIR . $imageName;
                $arrayDBStore = readJsonFile();
                $id = uniqid();

                $newImageInfo = [
                    "id" => $id,
                    "name" => $imageName,
                    "date" => time()
                ];

                array_push($arrayDBStore, $newImageInfo);

                writeJsonFile($arrayDBStore);

                return $id;
            } else {
                $errors[] = 'Error: uploadImage function returned false.';
                return false;
            }
        } else {
            $errors[] = 'Error: Uploaded file error code ' . $uploadedFile['error'];
            return false;
        }
    }

    $structuredFiles = [];
    if (isset($files)) {
        print_r($files);
        foreach ($files["name"] as $index => $filename) {
            echo $index. " --- ".$filename;
            $structuredFiles[] = [
                "name" => $filename,
                "type" => $files["type"][$index],
                "tmp_name" => $files["tmp_name"][$index],
                "error" => $files["error"][$index],
                "size" => $files["size"][$index]
            ];
        }
        $structuredFiles = $files;
    } else {
        $errors[] = 'Error: No files found in the request.';
    }

    $uniqueImgID = null;
    if (count($structuredFiles)) {
        foreach ($structuredFiles as $structuredFile) {
            $uniqueImgID = saveImagesToTempLocation($structuredFile);
            echo "IMAGE SAVED";
            if (!$uniqueImgID) {
                break; // Stop if there's an error
            }
        }
    } else {
        $errors[] = 'Error: No structured files to process.';
    }

    $response = [];
    if ($uniqueImgID) {
        $response["status"] = "success";
        $response["key"] = $uniqueImgID;
        $response["msg"] = null;
        $response["files"] = json_encode($structuredFiles);
    } else {
        $response["status"] = "error";
        $response["key"] = null;
        $response["msg"] = "An error occurred while uploading image";
        $response["files"] = json_encode($structuredFiles);
        $response["errors"] = $errors;
    }

    header('Content-Type: application/json');
    echo json_encode($response);

    exit();
} else {
    $response = [
        "status" => "error",
        "msg" => "Invalid request method.",
    ];
    http_response_code(405); // Method Not Allowed
    header('Content-Type: application/json');
    echo json_encode($response);
    exit();
}

?>
