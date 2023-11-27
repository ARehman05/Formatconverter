function convertImage(outputFormat, fileName) {
    var input = document.getElementById('imageInput');

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            var img = new Image();
            img.src = e.target.result;

            img.onload = function () {
                var canvas = document.createElement('canvas');
                canvas.width = img.width;
                canvas.height = img.height;

                var ctx = canvas.getContext('2d');
                ctx.drawImage(img, 0, 0);

                var imageURL = canvas.toDataURL(outputFormat);

                // Use jQuery AJAX to send the POST request
                jQuery.ajax({
                    type: 'POST',
                    url: 'convert.php',
                    data: {
                        imageData: imageURL,
                        outputFormat: outputFormat,
                        fileName: fileName
                    },
                    success: function (response) {
                        // Create a new image element for the converted image
                        var convertedImage = new Image();
                        convertedImage.src = 'data:image/' + outputFormat.replace('image/', '') + ';base64,' + response;

                        // Create a download link and trigger a click to initiate download
                        var downloadLink = document.createElement('a');
                        downloadLink.href = imageURL; // Use the original data URL for download
                        downloadLink.download = fileName;

                        // Append the download link to the body
                        document.body.appendChild(downloadLink);

                        // Trigger a click on the download link
                        downloadLink.click();

                        // Remove the download link from the DOM
                        document.body.removeChild(downloadLink);
                    },
                    error: function (error) {
                        console.error('Error:', error);
                        // Handle the error
                    }
                });
            };
        };

        reader.readAsDataURL(input.files[0]);
    }
}
