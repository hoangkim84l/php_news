<?php
// $funcNum = $_GET['CKEditorFuncNum'];
// $url = '';
// $message = '';

// if (isset($_FILES['upload']) && $_FILES['upload']['error'] == UPLOAD_ERR_OK) {
//     $file = $_FILES['upload'];
//     $fileName = time() . '-' . $_FILES['upload']['name']; // Tránh trùng tên file
//     $fileTmpName = $_FILES['upload']['tmp_name'];
//     $fileType = $_FILES['upload']['type'];
//     $fileSize = $_FILES['upload']['size'];

//     if (strpos($fileType, 'image/') === 0 && $fileSize < 2000000) {
//         $destination = "posts/$fileName"; // Lưu vào storage/app/public/posts/
//         try {
//             $path = Storage::disk('public')->putFileAs('posts', $fileTmpName, $fileName);
//             $url = asset("storage/$destination"); // Đường dẫn để hiển thị hình ảnh
//         } catch (Exception $e) {
//             $message = 'Lỗi upload file: ' . $e->getMessage();
//         }
//     } else {
//         $message = 'File không hợp lệ hoặc quá lớn.';
//     }
// } else {
//     $message = 'Lỗi upload file.';
// }
// echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($funcNum, '$url', '$message');</script>";

// TODO
// php artisan storage:link
// chmod -R 775 storage bootstrap/cache
// chown -R www-data:www-data storage bootstrap/cache