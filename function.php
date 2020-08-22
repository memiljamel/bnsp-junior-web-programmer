<?php

$conn = mysqli_connect("localhost", "root", "", "db_property");

function read($query) {
    global $conn;

    $result = mysqli_query($conn, $query);
    $rows = [];

    while($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

function create($data) {
    global $conn;

    $avatar = upload();

    if (!$avatar) {
        return false;
    }

    $name = htmlspecialchars($data["name"]);
    $job = htmlspecialchars($data["job"]);
    $testimonial = htmlspecialchars($data["testimonial"]);

    $query = "INSERT INTO tbl_testimonial VALUES (null, '$avatar', '$name', '$job', '$testimonial')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function delete($id) {
    global $conn;

    $query = "DELETE FROM tbl_testimonial WHERE id = $id";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function update($data) {
    global $conn;

    $id = $data["id"];
    $avatar = htmlspecialchars($data["avatar"]);
    $oldAvatar = htmlspecialchars($data['old-avatar']);

    if ($_FILES["avatar"]["error"] === 4) {
        $avatar = $oldAvatar;
    } else {
        $avatar = upload();
    }

    $name = htmlspecialchars($data["name"]);
    $job = htmlspecialchars($data["job"]);
    $testimonial = htmlspecialchars($data["testimonial"]);

    $query = "UPDATE tbl_testimonial SET avatar = '$avatar', name = '$name', job = '$job', testimonial = '$testimonial' WHERE id = $id";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function search($keyword) {
    $query = "SELECT * FROM tbl_property WHERE place LIKE '%$keyword%'";

    return read($query);
}

function upload() {
    $fileName = $_FILES["avatar"]["name"];
    $fileSize = $_FILES["avatar"]["size"];
    $tmpName = $_FILES["avatar"]["tmp_name"];
    $extension = ["jpg", "jpeg", "png", "webp"];
    $pictureExt = explode('.', $fileName);
    $pictureExt = strtolower(end($pictureExt));

    // Cek jika extensi file tidak didukung
    if (!in_array($pictureExt, $extension)) {
        echo "
            <script>
                alert('Invalid image extension!');
            </script>
        ";

        return false;
    }

    // Cek jika ukuran file terlalu besar
    if ($fileSize > 10000000) {
        echo "
            <script>
                alert('Image size is too large!');
            </script>
        ";

        return false;
    }

    // Ambil nama file dan simpang kedalama folder files
    $newFileName = uniqid();
    $newFileName .= ".";
    $newFileName .= $pictureExt;
    move_uploaded_file($tmpName, './files/' . $newFileName);

    return $newFileName;
}