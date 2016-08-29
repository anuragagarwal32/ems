<?php
	function getBody($imap, $uid){
		$body = get_part($imap, $uid, "TEXT/HTML");
		if($body == ""){
			$body = get_part($imap, $uid, "TEXT/PLAIN");
		}
		return $body;
	}

	function get_part($imap, $uid, $mimeType, $structure=false,$partNumber = false){
		if(!$structure){
			$structure = imap_fetchstructure($imap, $uid, FT_UID);
		}
		if($structure){
			if($mimeType == get_mime_type($structure)){
				if(!$partNumber){
					$partNumber = 1;
				}
				$text = imap_fetchbody($imap, $uid, $partNumber, FT_UID);
				switch ($structure->encoding) {
					case 3:
						return imap_base64($text);
						break;
					case 4:
						return imap_qprint($text);
					default:
						return $text;
						break;
				}
			}
			// multipart
			
			if($structure->type == 1){
				foreach ($structure->parts as $index => $subStruct) {
					$prefix = '';
					if($partNumber){
						$prefix = $partNumber.".";
					}
					$data = get_part($imap, $uid, $mimeType, $subStruct, $prefix.($index + 1));
					if($data){
						return $data;
					}
				}
			}
		}
		return false;
	}

	function get_mime_type($structure){
		$primaryMimetype = array('TEXT', 'MULTIPART', 'MESSAGE', 'APPLICATION', 'AUDIO', 'IMAGE', 'VIDEO', 'OTHER');
		if($structure->subtype){
			return $primaryMimetype[(int) $structure->type].'/'.$structure->subtype;
		}
		return 'TEXT/PLAIN';
	}
?>