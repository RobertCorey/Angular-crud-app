<?php
header('Content-Type: application/json');
$customerObjs = scandir('../customers');
$arr = [];
$jsonObj = "[";
for ($i=2; $i < count($customerObjs); $i++) { 
    $str = "../customers/" . $customerObjs[$i];
    $jsonObj .= file_get_contents($str);
    if ($i !== count($customerObjs) - 1) {
        $jsonObj .= ",";
    }
}
$jsonObj .= "]";
echo $jsonObj;
?>