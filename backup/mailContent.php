<?php
require_once '../imap/imap_connect.php';

function getBody($uid, $imap) {
    $body = get_part($imap, $uid, "TEXT/HTML");
    // $body = get_embedded_attachments($body);
    // if HTML body is empty, try getting text body
    if ($body == "") {
        $body = get_part($imap, $uid, "TEXT/PLAIN");
        
    }
    return $body;
}

function get_part($imap, $uid, $mimetype, $structure = false, $partNumber = false) {
    if (!$structure) {
           $structure = imap_fetchstructure($imap, $uid, FT_UID);
    }
    if ($structure) {
        if ($mimetype == get_mime_type($structure)) {
            if (!$partNumber) {
                $partNumber = 1;
            }
            $text = imap_fetchbody($imap, $uid, $partNumber, FT_UID);
            switch ($structure->encoding) {
                case 3: return imap_base64($text);
                case 4: return imap_qprint($text);
                default: return $text;
           }
       }

        // multipart
        // todo: Here for embedded image files
        if ($structure->type == 1) {
            foreach ($structure->parts as $index => $subStruct) {
                $prefix = "";
                if ($partNumber) {
                    $prefix = $partNumber . ".";
                }
                $data = get_part($imap, $uid, $mimetype, $subStruct, $prefix . ($index + 1));
                if ($data) {
                    return $data;
                }
            }
        }
    }
    return false;
}

function get_mime_type($structure) {
    $primaryMimetype = array("TEXT", "MULTIPART", "MESSAGE", "APPLICATION", "AUDIO", "IMAGE", "VIDEO", "OTHER");

    if ($structure->subtype) {
       return $primaryMimetype[(int)$structure->type] . "/" . $structure->subtype;
    }
    return "TEXT/PLAIN";
    /*
    
        Type of Email:
        0: TEXT/PLAIN
        1: TEXT/HTML

     */
}

// function get_embedded_attachments($body){
//     if(preg_match("/<[^<]+>/",$body,$m) != 0){
        
//         preg_match_all('/src="cid:(.*)"/Uims', $body, $matches);
//         if(count($matches)) {
        
//             $search = array();
//             $replace = array();
            
//             foreach($matches[1] as $match) {
//                 $uniqueFilename = generateRandomString().".extension";
//                 file_put_contents("/attachments/", $emailMessage->attachments[$match]['data']);
//                 $search[] = "src=\"cid:$match\"";
//                 $replace[] = "src=\"/attachments/$uniqueFilename\"";
//             }
            
//             $emailMessage->bodyHTML = str_replace($search, $replace, $emailMessage->bodyHTML);
            
//         }
//     }
//     // print_r($matches);
//     return $body;
// }

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
    
    // echo getBody(1, imapConnect('localhost', 'anurag@anurag.com', 'anurag', 'Sent'));
?>