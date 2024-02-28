<?php
	function group_numerals($int)
	{
       	switch (strlen($int))
       	{
	   		case '4': $price = substr($int,0,1).' '.substr($int,1,4); break;
	    	case '5': $price = substr($int,0,2).' '.substr($int,2,5); break;
			case '6': $price = substr($int,0,3).' '.substr($int,3,6); break;
			case '7': $price = substr($int,0,1).' '.substr($int,1,3).' '.substr($int,4,7); break;
        	default: $price = $int; break;
		}
    	return $price; 
	}

	// $form1 Единственная форма: 1 секунда
	// $form2 Двойственная форма: 2 секунды
	// $form5 Множественная форма: 5 секунд
	function pluralForm($n, $form1, $form2, $form5)
	{
	    $n = abs($n) % 100;
	    $n1 = $n % 10;
	    if ($n > 10 && $n < 20) return $form5;
	    if ($n1 > 1 && $n1 < 5) return $form2;
	    if ($n1 == 1) return $form1;
	    return $form5;
	}

	function random_str($length, $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ')
	{
	    $pieces = [];
	    $max = mb_strlen($keyspace, '8bit') - 1;
	    for ($i = 0; $i < $length; ++$i) {
	        $pieces []= $keyspace[random_int(0, $max)];
	    }
	    return implode('', $pieces);
	}
?>