<!DOCTYPE html>
<html>
<body>

    <?php
    
    function hexchar2dec($upperhexchar)
    {
        $hexvalues = array(
            "0" => 0,
            "1" => 1,
            "2" => 2,
            "3" => 3,
            "4" => 4,
            "5" => 5,
            "6" => 6,
            "7" => 7,
            "8" => 8,
            "9" => 9,
            "A" => 10,
            "B" => 11,
            "C" => 12,
            "D" => 13,
            "E" => 14,
            "F" => 15
        );
        
        return $hexvalues[$upperhexchar];
    }
    
    function getposvals($length, $base)
    {
        $result = array();
        
        for($exp = 0; $exp < $length; $exp++) {
            $result[$exp] = pow($base, $exp);
        }
        
        return array_reverse($result);
    }
    
    function combine($arr)
    {
        $result = array();
        
        foreach($arr as $i => $position) {
            $result[$i] = 1;
            foreach($position as $val => $posval) {
                $result[$i] *= $posval;
            }
        }
        
        return $result;
    }
    
    function hex2int($hexnum)
    {
        $upperhexnum = strtoupper($hexnum);
        $hexnum_decvals = array_map(hexchar2dec, str_split($upperhexnum, 1));
        $posvals = getposvals(count($hexnum_decvals), 16);
        $zipped_vals = array_map(null, $hexnum_decvals, $posvals);
        // For some reason mapping a function to combine the two zipped values didn't work here.
        // Didn't have time to figure it out so I just wrote it imperatively.
        $unsummed_hexvals = combine($zipped_vals);
        $result = array_sum($unsummed_hexvals);
        return $result;
    }
    
    echo hexdec("1e") . "<br>";
    echo hexdec("a") . "<br>";
    echo hexdec("11ff") . "<br>";
    echo hexdec("cceeff") . "<br>";
    echo "<br>And now for something completely different.<br>" . "<br>";
    echo hex2int("1e") . "<br>";
    echo hex2int("a") . "<br>";
    echo hex2int("11ff") . "<br>";
    echo hex2int("cceeff") . "<br>";
    ?>

</body>
</html>