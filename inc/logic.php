<?php


function generatePassword ($wordsCount , $wordsShape, $separator, $insertNumber, $insertSymbol)   { 
    global $words, $symbols;
    
    ## Security Assurance ##
    
    //  $wordsCount
    if ($wordsCount < 2){ #Min is 4
        $wordsCount = 2;
    }else if ($wordsCount > 8){ #Max is 9
        $wordsCount = 8;
    }else{
        if (is_numeric($wordsCount)){
            $wordsCount = $wordsCount;
        }else{
            $wordsCount = 2;
        }
        
    }
    
    
    //  $insertNumber
    if ($insertNumber < 0){
        $insertNumber = 0;
    }else if ($insertNumber > 4){ #Max is 4
        $insertNumber = 4;
    }else{
        $insertNumber = $insertNumber;
    }
    
    
    //  $insertSymbol
    if ($insertSymbol < 0){
        $insertSymbol = 0;
    }else if ($insertSymbol > 4){#Max is 4
        $insertSymbol = 4;
    }else{
        $insertSymbol = $insertSymbol;
    }   
    
    
    //  $separator
    switch ($separator) {
    case '-':
        $separator = '-';
        break;
        
    case '_':
        $separator = '_';
        break;
        
    case 'space':
        $separator = ' ';
        break;
      
    default:
        $separator = '-';
    
    }
    
    //  $result
    $result = '';
    #####################
    
    
    
    ## Foor loop x number of words required
    for ($x=1; $x<=$wordsCount; $x++){
        
        # Get the word # from the array $words[] randomly
        $wordNumber = rand(0, count($words)-1);
        
        ## Words Shape ## // strtoupper, strtolower, ucfirst
        if ($wordsShape == 'ALLUP'){ #Set to upper case
        
            $result .= strtoupper($words[$wordNumber]);
            
        }else if ($wordsShape == 'ALLLOWER'){ #set to lowercase
        
            $result .= strtolower($words[$wordNumber]);
            
        }else if ($wordsShape == 'UCFIRST'){ #set to UpperCase first letter
        
            $result .= ucfirst($words[$wordNumber]);
            
        }else{ #Default is lowercase
            $result .= $words[$wordNumber];
        }
        
        if($x != $wordsCount){
            
            if(!empty($separator)){ # Separator
                
                $result .= "$separator";
                
            }
            
        }else{ # If last word, add numbers and special chars
        
            if ($insertNumber > 0){ #If insert symbol > 0, insert 1 symbol
                
                if ($insertNumber == 1){ #Insert 1 number
                    $lastNumber = rand(0,9);
                    $result .= $lastNumber;
                }else{ #Insert x numbers
                    for ($a=1; $a<=$insertNumber; $a++){
                        $lastNumber = rand(0,9);
                        $result .= $lastNumber;                    
                    }
                }
            }
            
            if (!empty($insertSymbol)){
                
                if ($insertSymbol == 1){
                    # Insert 1 symbol
                    $symbolNumber = rand(0, count($symbols) -1);
                    $result .= $symbols[$symbolNumber];     
                               
                }else{
                    # Insert x symbols
                    for ($a=1; $a<=$insertSymbol; $a++){
                        
                        $symbolNumber = rand(0, count($symbols) -1);
                        $result .= $symbols[$symbolNumber];                      
                    }
                    
                }
    
            }
            
        }
    }
    
    return $result;
    
}


?>