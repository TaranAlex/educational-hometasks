<?php 
require('./Request.php');
$request = new Request;
$errors = [];
if($request->isPost()) {
    $request->required('title');
    $request->min('title', 3);
    $request->max('title', 255);
    $request->max('annotation', 500);
    $request->max('content', 30000);
    $request->isValidEmail('email');
    $request->required('email');
    $request->isUnsignedInt('views');
    $request->required('date');
    $request->isValidDate('date');
    $request->required('category');
    $status = $request->isValid();
    $errors = $request->getErrors();
}
echo json_encode(compact(['status', 'errors']));

?>