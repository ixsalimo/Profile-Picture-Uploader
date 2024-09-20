<?php
if ( $_SERVER["REQUEST_METHOD"] === "POST" ) {
    if ( ! empty( $_FILES ) ) {
        $file = $_FILES["file"];

        // Save document root path for clean-code
        $DOCROOT = $_SERVER["DOCUMENT_ROOT"];

        $destinationDirectory = "$DOCROOT/Uploads";

        // Create an uploads directory if it doesn't exist
        if ( ! file_exists( $destinationDirectory ) ) mkdir( $destinationDirectory );

        // Generate a random file name
        $newFileName = uniqid() . "_" . time();

        // Extract file extension
        $explodedFileName = explode( '.' , $file["name"] );
        $fileExtension = end( $explodedFileName );

        $finalPath = "$destinationDirectory/$newFileName.$fileExtension";

        // Move the file from the temporary path to the destination
        if ( move_uploaded_file( $file["tmp_name"] , $finalPath ) ) {
            echo "<mark>Profile uploaded successfully ✔️</mark>";
        } else {
            echo "<mark>Profile does not uploaded ❌</mark>";
        }
        die( "<hr><a href='/'>Upload new profile</a>" );
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Profile Picture</title>
    <link rel="stylesheet" href="CSS/style.css">
    <script src="JS/script.js" defer></script>
</head>
<body>
    <form action="<?php $_SERVER["PHP_SELF"] ?>" method="POST" enctype="multipart/form-data">
        <label for="file">
            <img src="Pic/default.jpg" alt="users profile" id="profile">
        </label>
        <p id="file-name">- Choose Your Profile -</p>
        <input type="file" hidden name="file" id="file" accept="image/jpeg , image/png , image/webp">
        <div class="wrapper">
            <button type="reset" class="css-button-sliding-to-left--red">CLEAR</button>
            <button type="submit" class="css-button-sliding-to-left--green">UPLOAD</button>
        </div>
    </form>
</body>
</html>
