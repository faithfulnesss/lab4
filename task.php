<?php 
    
    $a = "hello";
    $b = "world";
    $c = $a.$b;
    $d = 5;
    $e = 15;

    print "$c\n";
    print "$e";
    print "\n";
    print $d + $e;

    $e += 5;
    
    print "\n";
    print "$e\n";
    print strlen($c)."\n";
    print strtoupper($c)."\n";

    if ($a == "hello") {
        print "yes\n";
    } else {
        print "no\n";
    }

    $arr = [1, 2, 3, 4, 5];
    
    print $arr[1]."\n";

    $arr[0] = 99;
    
    print $arr[0]."\n";

    print implode(", ", $arr)."\n";

    $arr_str = implode(", ", $arr);

    print_r(explode(", ", $arr_str))."\n";

    for($index = 0; $index < count($arr); $index++) {
        print $arr[$index]."\n";
    }

    print "\n";

    foreach($arr as $element) {
        print "$element"."\n";
    }

    $dictionary = ["name" => "ryan", "surname" => "gosling"];
    
    print $dictionary["name"]."\n";

    $dictionary["surname"] = "bateman";

    print $dictionary["surname"]."\n";

    foreach ($dictionary as $key => $value) {
        print "$key => $value"."\n";
    }

    function add($a, $b) {
        return $a + $b;
    }

    function sum_elements_of_array($array) {
        $count = 0;

        foreach($array as $element) {
            $count = add($count, $element);
        }
        
        return $count;
    }

    print "sum of array elements :".sum_elements_of_array($arr); 
    
?>