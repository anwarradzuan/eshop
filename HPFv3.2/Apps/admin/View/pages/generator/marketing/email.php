<?php

$emailAddress = 'hery@intelhost.com.my';
$emailPassword = '#mastermastermaster#';
$domainURL = 'intelhost.com.my';
$useHTTPS = true;                       

$mail = imap_open('{'.$domainURL.':143/notls}INBOX.Inbox',$emailAddress,$emailPassword);

if(!$mail){
    new Alert("error", "Sorry, connection failed. ");
}

$results = imap_search($mail, 'ALL');

foreach($results as $r){
    $detail = imap_fetch_overview($mail, $r, 0);
    $body = imap_fetchbody($mail, $r, 0);
    echo $r . ". " . $detail[0]->subject . " at " . $detail[0]->date . "<br ./>";
    echo imap_qprint(imap_body($mail, $r)) . "<br />";
}

imap_errors();
imap_alerts();
imap_close($mail);