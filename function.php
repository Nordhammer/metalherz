<?php

// sprache laden
function getCurrentLanguage($alias) {
    if (isset($_SESSION['langID'])) {
		$lang = $_SESSION['langID'];
	} else {
		$lang = getCurrentConfig('MOTHER_TONGUE');
    }
    $db = DB::exe("SELECT * FROM cms_language WHERE langID = :id AND alias = :alias",array('id'=>$lang,'alias'=>$alias));
    if (isset($db)) {
        foreach ($db as $r) {
            return $r['value'];
        }
    } else {
        return null;
    }
}

// einstellungen aus der db laden
function getCurrentConfig($alias) {
    $db = DB::exe("SELECT * FROM wcp_config WHERE alias = :alias",array('alias'=>$alias));
    if (isset($db)) {
        foreach ($db as $row) {
            return $row['value'];
        }
    } else {
        return null;
    }
}

// prüft den url_pfad auf richtigkeit
function params($params) {
    if (isset($params) && (int)$params > 0) {
        return $params = (int)$params;
    } else {
        return $params = '';
    }
}

// erzeugt zeilenumbrüche
function makeUp($str) {
    return nl2br($str);
  }

  // entfernt unerwünschte einträge wie scriptcodes
  function clearContent($str) {
    return htmlspecialchars($str);
  }

// wandelt den pfad um
function removeUglyChars4url($phrase) {
    // ersetzen durch
      $phrase = str_replace(array(' ', ':', '.', ';', ',', '(', ')', '[', ']', '?', '!', '`', '*', '§', ' - ', "'", '+', '!', ',', '#', '€', '@', '`'), "-",
      str_replace(array('&', '²', '³', 'ü', 'ä', 'ö', 'á', 'é'),
      array('und', '2', '3', 'ue', 'ae', 'oe', 'a', 'e'),$phrase));
    // ersetze alle Zeichen durch ...
    while (strpos($phrase, "__") !== false) $phrase = str_replace("__", "-", $phrase);
    while (strpos($phrase, "_-_") !== false) $phrase = str_replace("_-_", "-", $phrase);
    while (strpos($phrase, "--") !== false) $phrase = str_replace("--", "-", $phrase);
    $phrase = strtolower($phrase);
    return trim($phrase);
}

//
function removeUglyChars4Img($str) {
    $phrase = str_replace(array('*', '+', '!', '#', '€', '@', '}', '{', "`", "'", ':', '.', ';', ',', '(', ')', '[', ']', '?', '!', '&', '²', '³'),"_",strtolower($str));
    // ersetze alle Zeichen durch ...
    while (strpos($phrase, "__") !== false) $phrase = str_replace("__", "-", $phrase);
    while (strpos($phrase, "_-_") !== false) $phrase = str_replace("_-_", "-", $phrase);
    while (strpos($phrase, "--") !== false) $phrase = str_replace("--", "-", $phrase);
    return trim($phrase);
}

// keywords in den metadaten
function getMetaKeywords($id) {
    $p = pathinfo($_SERVER['PATH_INFO']);
    if (!isset($p['dirname']) || empty($p['dirname']) || $p['dirname'] == '/') {
        return getCurrentConfig('KEYWORDS');
    } else {
        $db = DB::exe("SELECT * FROM cms_keywords WHERE keyID = :id ORDER BY keyID DESC LIMIT 10",array('id'=>$id));
        if (isset($db)) {
            foreach ($db as $r) {
                return $str .= $r['value'].', ';
            }
        } else {
            return null;
        }
    }
}

// beschreibung in den metadaten
function getMetaDescription($id) {
    $p = pathinfo($_SERVER['PATH_INFO']);
    if (!isset($p['dirname']) || empty($p['dirname']) || $p['dirname'] == '/') {
        return getCurrentConfig('DESCRIPTION');
    } else {
        $db = DB::exe("SELECT blogID,descript FROM cms_blog WHERE blogID = :id",array('id'=>$id));
        if (isset($db)) {
            foreach ($db as $r) {
                return $r['descript'];
            }
        } else {
            return null;
        }
    }
}

// titel in den metadaten
function getMetaTitle($id) {
    $p = pathinfo($_SERVER['PATH_INFO']);
    switch($p['dirname']) {
        case '/suchergebnis':
        return getCurrentLanguage('CRUMB_SEARCH_RESULT');
        break;
        case '/blog':
        $db = DB::exe("SELECT blogID,topic FROM cms_blog WHERE blogID = :id",array('id'=>$id));
        if (isset($db)) {
            foreach ($db as $r) {
                return $r['topic'].' - '.getCurrentConfig('DOMAIN_TOPIC');
            }
        }
        break;
        case '/profil':
        $db = DB::exe("SELECT * FROM cms_user WHERE userID = :id",array('id'=>$id));
        if (isset($db)) {
            foreach ($db as $r) {
                return $r['username'].' - '.getCurrentConfig('DOMAIN_TOPIC');
            }
        }
        break;
        case '/kategorie':
        $db = DB::exe("SELECT * FROM cms_category WHERE catID = :id",array('id'=>$id));
        if (isset($db)) {
            foreach ($db as $r) {
                return $r['cat'].' - '.getCurrentConfig('DOMAIN_TOPIC');
            }
        }
        break;
        default:
        return getCurrentLanguage('HEADER_TITLE_HOME').' - '.getCurrentConfig('DOMAIN_TOPIC');
        break;
    }
}

// gibt die tags des jeweiligen blogs aus
function getBlogTags($id) {
    $p = pathinfo($_SERVER['PATH_INFO']);
    if (!isset($p['dirname']) || empty($p['dirname']) || $p['dirname'] == '/') {
        return getCurrentConfig('KEYWORDS');
    } else {
        $db = DB::exe("SELECT * FROM cms_tags WHERE tagID = :id ORDER BY tagID",array('id'=>$id));
        if (isset($db)) {
            foreach ($db as $r) {
                return $str .= $r['value'].', ';
            }
        } else {
            return null;
        }
    }
}

// user avatar laden
function getUserAvatar($id) {
    $db = DB::exe("SELECT * FROM cms_user_avatar WHERE userID = :id",array('id'=>$id));
    if (isset($db)) {
        foreach ($db as $r) {
            return $r['avatar'];
        }
    } else {
        return $str = "noAvatar.png";
    }
}

function getUserRank($id) {
    $db = DB::exe("SELECT 
        cms_user.userID,
        cms_user.userrank,
        cms_user_rank.id,
        cms_user_rank.value 
    FROM cms_user
    LEFT JOIN cms_user_rank
    ON cms_user.userrank = cms_user_rank.id
    WHERE cms_user.userID = :id",array('id'=>$id));
    if (isset($db)) {
        foreach ($db as $r) {
            return $r['value'];
        }
    } else {
        return null;
    }
}



/* bearbeitet das datum */
function editDateFromDB($created) {
    $months = array(1=>getCurrentLanguage('MONTH_JANUAR'),
                    2=>getCurrentLanguage('MONTH_FEBRUAR'),
                    3=>getCurrentLanguage('MONTH_MARCH'),
                    4=>getCurrentLanguage('MONTH_APRIL'),
                    5=>getCurrentLanguage('MONTH_MAY'),
                    6=>getCurrentLanguage('MONTH_JUNE'),
                    7=>getCurrentLanguage('MONTH_JULY'),
                    8=>getCurrentLanguage('MONTH_AUGUST'),
                    9=>getCurrentLanguage('MONTH_SEPTEMBER'),
                    10=>getCurrentLanguage('MONTH_OCTOBER'),
                    11=>getCurrentLanguage('MONTH_NOVEMBER'),
                    12=>getCurrentLanguage('MONTH_DECEMBER')
    );
    return date('d',$created).". ".$months[date('n',$created)]." ".date('Y',$created);
}

/* bearbeitet das zeitformat */
function editTimeFromDB($created) {
    return date('H:i',$created);
}

// string kürzen
// $str => der zu lürzende string
// $start => ab welchem zeichen gezählt wird,zB. 0
// $length => wieviele zeichen am ende abgezogen werden, zB. -2 = (, )
// strCutter($str,0,-2);
function strCutter($str,$sta,$len) {
    return substr($str,$sta, $len);
}

// kleinschreibung erzwingen
function lowercase($str) {
    return strtolower($str);
}

// leerzeichen vor- und hinter dem string entfernen
function inputTrim($str) {
    return trim(rtrim($str));
}

// 
function contentCuts($str,$sta,$len) {
    if (strlen($str) > $len) {
      return substr($str,(int)$sta,(int)$len).' ...';
    } else {
        return null;
    }
}

// gibt nur den ersten absatz aus
function first_paragraph($data,$str) {
    $array = explode("\n",$data,2); 
    switch ($str) {
        case '0':
        return $array[0]."<br />\n";
        break;
        case '1':
        return $array[0]."<br />\n";
        break;
    }
}

// anzahl aller aufrufe ermitteln
function getAllVisits($table,$col,$id) {
    $db = DB::exe("SELECT * FROM $table WHERE $col = :id",array('id'=>$id));
    if (isset($db)) {
        foreach ($db as $r) {
            if ($r['visits'] == '1') {
                $all = "1 Aufruf";
            } else {
                $all = $r['visits'].' Aufrufe';
            }
            return $all;
        }
    } else {
        return null;
    }
}

// gibt die anzahl aller kommentare aus
function getAllComments($table,$row,$id) {
    // anzahl aller kommentare ermitteln
    $c = DB::countID($table,$row,$id);
    if ($c == '1') {
        $all_comments = "1 Kommentar";
    } else {
        $all_comments = $c.' Kommentare';
    }
    return $all_comments;
}

// anzahl aller kommentare des users ermitteln
function getUserComments($table,$row,$id) {
    return DB::countID($table,$row,$id);
}

// ip sperre
function setVisits($table,$row,$id) {
    date_default_timezone_set('Europe/Berlin');
    $update = false;
    $insert = false;
    // prüfen ob eintrag älter als 30 min., wenn ja => löschen
    DB::exe("DELETE FROM cms_ip_barrier WHERE created < :created",array('created'=>(time()-1000)));
    // prüfen ob ip in der liste
    $c = DB::countName('cms_ip_barrier','userIP',$_SERVER['REMOTE_ADDR']);
    if ($c > 0) {
        // prüfen ob id zur ip passt
        $db = DB::exe("SELECT value,userIP FROM cms_ip_barrier WHERE userIP = :ip",array('ip'=>$_SERVER['REMOTE_ADDR']));
        if (isset($db)) {
            foreach ($db as $r) {
                if ($r['value'] == $id) {
                    // UPDATE (ip sperre)
                    $update = true;
                } else {
                    // INSERT (ip sperre, counter)
                    $insert = true;
                }
            }
        }
    } else {
        // INSERT (ip sperre, counter)
        $insert = true;
    }
    if ($update === true) {
        // update
        DB::exe("UPDATE cms_ip_barrier SET value = :id WHERE value = :id AND userIP = :ip",array('id'=>$id,'ip'=>$_SERVER['REMOTE_ADDR']));
    }
    if ($insert === true) {
        DB::exe("INSERT INTO `cms_ip_barrier` (`value`,`created`,`userIP`)
        VALUES (:value,:created,:userIP)",array('value'=>$id,'created'=>time(),'userIP'=>$_SERVER['REMOTE_ADDR']));
        $vis = $r['visits']+1;
        DB::exe("UPDATE $table SET $row = :$row WHERE blogID = :id",array('id'=>$id,$row=>$vis));
    }

}


// passwort erstellen ganz  einfach.
function generatePassword($length = 8) {
    $aChr = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z'];
  $aOChr = ['@', 'µ', '$', '§', ':', '0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '{', '}', '(', ')', '*'];
  $password = '';
  for ($i = 0; $i < $length; $i++) {
        $rand = array_rand([true, false]);
    if ($rand == true) {
      if (array_rand([true, false]) == true) {
        $password .= strtoupper($aChr[rand(0, count($aChr) - 1)]);
      } else {
        $password .= $aChr[rand(0, count($aChr) - 1)];
      }
    } else {
      $password .= $aOChr[rand(0, count($aOChr) - 1)];
    }
  }
  return $password;
}