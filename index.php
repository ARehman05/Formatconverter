<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Converter</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        body {
            padding: 20px;
        }

        #outputImage {
            max-width: 100%;
            margin-top: 20px;
        }
    </style>

</head>
<body>
    <div class="container">
        <h2 class="mt-4 mb-4">Image Converter</h2>
        <div class="form-group">
            <label for="imageInput">Select an Image:</label>
            <input type="file" id="imageInput" class="form-control" accept="image/png, image/jpeg">
        </div>
        <button class="btn btn-primary mb-4" onclick="convertImage('image/webp', 'converted_image.webp')">Convert to WebP</button>
        <button class="btn btn-success mb-4" onclick="convertImage('image/jpeg', 'converted_image.jpeg')">Convert to JPEG</button>
        <button class="btn btn-danger mb-4" onclick="convertImage('image/jpeg', 'converted_image.jpg')">Convert to JPG</button>
        <button class="btn btn-warning mb-4" onclick="convertImage('image/gif', 'converted_image.gif')">Convert to GIF</button>
        <button class="btn btn-info mb-4" onclick="convertImage('image/png', 'converted_image.png')">Convert to PNG</button>
        <br>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script> -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="converter.js"></script>
</body>
</html>
