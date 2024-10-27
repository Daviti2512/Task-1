<?php
    if(isset($_POST['folder'])){
        $n_folder = $_POST['folder'];
        mkdir("MyDrive/".$n_folder);
    }

    if(isset($_POST['file'])){
        $n_file = $_POST['file'];
        fopen("MyDrive/".$n_file.".txt", "w");
    }

    if(isset($_POST['new_name'])){
        $new_name = $_POST['new_name'];
        $old_name = $_POST['old_name'];
        if(!is_file("MyDrive/".$old_name)){
            if(!is_dir("MyDrive/".$new_name)){
                rename("MyDrive/".$old_name, "MyDrive/".$new_name);
            }else{
                echo "<script>alert('The folder exists.')</script>";
            }
        }else{
            if(!file_exists("MyDrive/".$new_name)){
                rename("MyDrive/".$old_name, "MyDrive/".$new_name.".txt");
            }else{
                echo "<script>alert('The File exists.')</script>";
            }
        }
    }

    // ფაილის ან საქაღალდის წაშლა
if (isset($_POST['delete'])) {
    $item_to_delete = $_POST['delete'];
    $item_path = "MyDrive/" . $item_to_delete;

    if (is_file($item_path)) {
        unlink($item_path); // ფაილის წაშლა
    } elseif (is_dir($item_path)) {
        rmdir($item_path); // საქაღალდის წაშლა
    } else {
        echo "<script>alert('Item does not exist.')</script>";
    }
}


    $scan = scandir("MyDrive");
    // echo "<pre>";
    // print_r($scan);
    // echo "</pre>";
?>
