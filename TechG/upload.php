<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Set the upload directory to your specific folder
    $uploadDirectory = "C:/xampp/htdocs/TechG/Upload/";
    $uploadStatus = true;
    $messages = [];

    // Upload PDF
    if (!empty($_FILES['pdfFile']['name'])) {
        $pdfFile = $uploadDirectory . basename($_FILES['pdfFile']['name']);
        $pdfFileType = strtolower(pathinfo($pdfFile, PATHINFO_EXTENSION));

        if ($pdfFileType != "pdf") {
            $messages[] = "Only PDF files are allowed.";
            $uploadStatus = false;
        } else {
            if (move_uploaded_file($_FILES['pdfFile']['tmp_name'], $pdfFile)) {
                $messages[] = "PDF file uploaded successfully.";
            } else {
                $messages[] = "Error uploading PDF file.";
                $uploadStatus = false;
            }
        }
    }

    // Handle Link
    if (!empty($_POST['link'])) {
        $link = $_POST['link'];
        $linkFile = $uploadDirectory . 'links.txt';
        $linkContent = "Link: $link\n";

        if (file_put_contents($linkFile, $linkContent, FILE_APPEND | LOCK_EX)) {
            $messages[] = "Link saved successfully.";
        } else {
            $messages[] = "Error saving link.";
            $uploadStatus = false;
        }
    }

    // Upload Video
    if (!empty($_FILES['videoFile']['name']) && !empty($_POST['videoFormat'])) {
        $videoFile = $uploadDirectory . basename($_FILES['videoFile']['name']);
        $videoFileType = strtolower(pathinfo($videoFile, PATHINFO_EXTENSION));
        $selectedFormat = $_POST['videoFormat'];

        if ($videoFileType != $selectedFormat) {
            $messages[] = "Video format does not match the selected format.";
            $uploadStatus = false;
        } else {
            if (move_uploaded_file($_FILES['videoFile']['tmp_name'], $videoFile)) {
                $messages[] = "Video file uploaded successfully.";
            } else {
                $messages[] = "Error uploading video file.";
                $uploadStatus = false;
            }
        }
    }

    if ($uploadStatus) {
        $messages[] = "Submission successful.";
    } else {
        $messages[] = "Submission failed.";
    }

    $_SESSION['messages'] = $messages;
    header("Location: index.html");
    exit;
}
?>
