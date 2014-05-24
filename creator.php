<?php
$str = '{
    "name": "Robert Corey",
    "email": "robertbcorey@gmail.com",
    "telephone": "401-533-1765",
    "address":
    {
        "street": "123 Sesame",
        "City": "New York",
        "State": "RI",
        "Zip": "02221"
    }
}';
$str1 = '{
    "name": "Clark Tillman",
    "email": "clarktillman@speedbolt.com",
    "telephone": "(876) 539-2190",
    "address": {
        "street": "589 Kane Street",
        "city": "Eureka",
        "state": "Wyoming",
        "zip": 07908
    }
}';

$str2 = '{
    "name": "Nielsen Burton",
    "email": "nielsenburton@speedbolt.com",
    "telephone": "(905) 513-3527",
    "address": {
        "street": "699 Locust Street",
        "city": "Oceola",
        "state": "Alabama",
        "zip": 01986
    }
}';

mkdir("customers");
file_put_contents("customers/rob.json",$str);
file_put_contents("customers/clark.json",$str1);
file_put_contents("customers/nielsen.json",$str2);
?>