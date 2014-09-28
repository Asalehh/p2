<?php
error_reporting(0);
require('inc/words.php');
require('inc/logic.php');

if (isset($_POST['generate'])){
    
    $wordsCount = $_POST['wordsCount'];
    $wordsShape = $_POST['wordsShape'];
    $separator = $_POST['separator'];
    $insertNumber = $_POST['insertNumber'];
    $insertSymbol = $_POST['insertSymbol'];

}

# Call GeneratePassword Function
$password = generatePassword($wordsCount,$wordsShape,$separator,$insertNumber,$insertSymbol);
?>
<!DOCTYPE html>
<html>
    <head>
    
        <title>xkcd password generator</title>
        <meta name="description" content="xkcd password generator" />
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
        <link href="style/style.css" rel="stylesheet">
    
    </head>
    <body>
        <div style="margin: 0 auto; width:700px; text-align:center;">
        
           <h1>xkcd Password Generator</h1>
           
           <!-- Spacing -->
           <div class="separator"></div>
            
           <form action="" method="post" style="">
         
               <input type="text" name="password" placeholder="" size="60" value="<?=$password?>" style="text-align:center; min-height:40px; font-size:16pt;" onclick="select();" />
            
                <!-- Spacing -->
                <div class="separator"></div>
                
                <div class="row">
                    <div class="col-md-2">
                        # of Words<br />
                        <input type="text" maxlength="1" size="4" placeholder="2 to 8" name="wordsCount" />
                    </div>
                    
                    <div class="col-md-3">
                        Words Style<br />
                        <select name="wordsShape">
                            <option value="ALLLOWER">All Lower case</option> 
                            <option value="ALLUP">All Upper case</option>
                            <option value="UCFIRST">First Letter Upper case</option>
                        </select>
                    </div>
                    
                    
                    <div class="col-md-3">Words Separator<br />
                    
                        <select name="separator">
                            <option value="-">-</option> 
                            <option value="_">_</option>
                            <option value="space">space</option>
                        </select>    
                        
                    </div>
                    
                    
                    <div class="col-md-2">Numbers?<br />
                
                        <select name="insertNumber">
                            <option value="0">No</option> 
                            <option value="1">1 Number</option> 
                            <option value="2">2 Numbers</option> 
                            <option value="3">3 Numbers</option> 
                            <option value="4">4 Numbers</option> 
                        </select>  
                            
                    </div>
                    
                    
                    <div class="col-md-2">Symbols?<br />
                
                        <select name="insertSymbol">
                            <option value="0">No</option> 
                            <option value="1">1 Symbol</option> 
                            <option value="2">2 Symbols</option> 
                            <option value="3">3 Symbols</option> 
                            <option value="4">4 Symbols</option> 
                        </select>  
                            
                    </div>
                    
                </div>
                
                <!-- Spacing -->
                <div class="separator"></div>
                
                <input type="submit" class="btn btn-primary generateButton" name="generate" value="Generate Another Password"/>
                
           </form>
           
        
        
            <div class="xkcdPassword">

                	Know more about <a href="http://xkcd.com/936/">xkcd password strength</a><br>
                
                	<a href="http://xkcd.com/936/">
                		<img class="xkcdimage" src="http://imgs.xkcd.com/comics/password_strength.png" alt="xkcd style passwords">
                	</a>
                
            </div>
            
            
        </div>    
    </body>
</html>