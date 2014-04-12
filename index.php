<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php include_once 'emailReder.php'; ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            $reader = new Email_reader;
            $in = $reader->get(1);
            $toMail = $in['header']->to[0]->mailbox."@".$in['header']->to[0]->host;
            $fromMail = $in['header']->from[0]->mailbox."@".$in['header']->from[0]->host;
            
            $string = $in['body'];
            $pattern = '/From:\s*.*<(.*)>/i';
            preg_match($pattern, $string, $matches);

            $forwardedFrom = $matches[1];

            
            echo "<br>$toMail<br>$fromMail<br>$forwardedFrom<br> body: ".$in['body']. '<br>';
            
            
            //echo '<br>message: '. imap_fetchheader($reader->conn, 1). '\n';
            
            
            
        
        
        ?>
    </body>
</html>
