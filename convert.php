<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $base64data = $_POST['imageData'];
    $outputFormat = $_POST['outputFormat'];
    $fileName = $_POST['fileName'];
    

    // Remove the data:image/png;base64 or similar prefix
    
    $base64data = preg_replace('/^data:image\/\w+;base64,/', '', $base64data);

    // Decode base64 data
    $imageData = base64_decode($base64data);

    // Determine the image format based on the output format
    $image = imagecreatefromstring($imageData);

    if ($outputFormat === 'image/webp') {
        // Convert to WebP
        imagewebp($image, $fileName);
    } elseif ($outputFormat === 'image/jpeg' || $outputFormat === 'image/jpg') {
        // Convert to JPEG
        imagejpeg($image, $fileName);
    } elseif ($outputFormat === 'image/png') {
        // Convert to PNG
        imagepng($image, $fileName);
    } elseif ($outputFormat === 'image/gif') {
        // Convert to GIF
        imagegif($image, $fileName);
    }

    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="' . $fileName . '"');
    echo $imageData;

    // Free up memory
    imagedestroy($image);

    // Send a response back to the client
    // echo json_encode(['status' => 'success', 'message' => 'Image converted successfully.']); 
} else {
    // If the request method is not POST, return an error
    header('HTTP/1.1 400 Bad Request');
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
}
















// $base64data = $_POST['imageData'];

// // Remove the data:image/webp;base64 prefix
// $base64data = str_replace('data:image/webp;base64,', '', $base64data);

// // Decode base64 data
// $imageData = base64_decode($base64data);

// // Save the webp image
// file_put_contents('converted_image.webp', $imageData);
?>
