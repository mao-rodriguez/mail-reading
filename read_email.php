<?php

$mailbox = "{imap.gmail.com:993/imap/ssl/novalidate-cert}";
$username = "itconnecthd@gmail.com";
$password = "ITCTmeltecds!";

// Open IMAP stream
$inbox = imap_open($mailbox, $username, $password) or die('Cannot connect to email: ' . imap_last_error());

//Get emails
$emails = imap_search($inbox, 'ALL');

//Order new emails on top
rsort($emails);

if($emails){
    $limit = 0;
    foreach($emails as $msg_number){
        $header = imap_headerinfo($inbox, $msg_number);
        echo $header->subject . "<br>";
        if($limit > 5) break;
        $limit++;
    }
}

die();

?>