<?php
// test/upload.php

// read raw PUT/POST data
$data = file_get_contents('php://input');

// ensure uploads folder exists
if (!is_dir(__DIR__.'/uploads')) {
  mkdir(__DIR__.'/uploads', 0755, true);
}

// save it
$fname = __DIR__.'/uploads/'.time().'.bin';
file_put_contents($fname, $data);

// respond
header('Content-Type: application/json');
echo json_encode([
  'status' => 'ok',
  'size'   => strlen($data),
  'file'   => basename($fname)
]);
?>
