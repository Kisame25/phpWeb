<?php    
    $cmd = "";
    //before fix code

    if( isset( $_POST[ 'message' ] ) ) {

        $target = $_REQUEST[ 'message' ];

        // Determine OS and execute the ping command.
        if (stristr(php_uname('s'), 'Windows NT')) { 
        
            $cmd = shell_exec('echo '.$target );
            //echo '<pre>'.$cmd.'</pre>';
            
        } else {
            $cmd = shell_exec( 'echo '.$target );
            //echo '<pre>'.$cmd.'</pre>';
            
        }

    }


    //to fix this OS command injection
    // uncommand this code below

    /* if( isset( $_POST[ 'message'] ) ) {
    
        $target = $_REQUEST[ 'message' ];
    
        // Remove any of the charactars in the array (blacklist).
        $substitutions = array(
            '&&' => '',
            '&' => '',
            ';' => '',
        );
    
        $target = str_replace( array_keys( $substitutions ), $substitutions, $target );
        
        // Determine OS and execute the ping command.
        if (stristr(php_uname('s'), 'Windows NT')) { 
        
            $cmd = shell_exec( 'echo  ' . $target );
            
        } else { 
        
            $cmd = shell_exec( 'echo' . $target );
            
        }
    } */
    
    
$title = "Support page";
require './views/support.php';



