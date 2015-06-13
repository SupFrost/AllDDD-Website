<?php

$folder = $_GET['folder'];


$dir = "Bestanden/" . $folder;


// Run the recursive function 

$response = scan($dir);


// This function scans the Bestanden folder recursively, and builds a large array

function scan($dir)
{

    $files = array();

    // Is there actually such a folder/file?

    if (file_exists($dir)) {

        foreach (scandir($dir) as $f) {

            if (!$f || $f[0] == '.') {
                continue; // Ignore hidden Bestanden
            }

            if (is_dir($dir . '/' . $f)) {

                // The path is a folder

                $files[] = array(
                    "name" => $f,
                    "type" => "folder",
                    "path" => $dir . '/' . $f,
                    "items" => scan($dir . '/' . $f) // Recursively get the contents of the folder
                );

                foreach ($files as $key => $row) {
                    $name[$key] = $row['name'];
                    $type[$key] = $row['type'];
                    $path[$key] = $row['path'];
                    $items[$key] = $row['items'];

                }

                array_multisort($name, SORT_ASC, SORT_NATURAL, $type, SORT_ASC, SORT_NATURAL, $path, SORT_ASC, SORT_NATURAL, $items, SORT_ASC, SORT_NATURAL, $files);
            } else {

                // It is a file

                $files[] = array(
                    "name" => $f,
                    "type" => "file",
                    "path" => $dir . '/' . $f,
                    "size" => filesize($dir . '/' . $f) // Gets the size of this file
                );
            }
        }

    } else {
        echo "No folder!";
    }

    return $files;
}


// Output the directory listing as JSON

header('Content-type: application/json');

echo json_encode(array(
    "name" => "Bestanden",
    "type" => "folder",
    "path" => $dir,
    "items" => $response
));
?>