<?php
class SUrl {
    public function __construct($url, $auth) {
        $this->url = $url;
        $this->auth = $auth;
        $this->iniUrl();
    }
    public function iniUrl() {
        $log = $this->auth;
        foreach(unserialize("login") as $logs) {
            if(sha1($log['username']) === $logs['username'] and sha1($log['password']) === $logs['password']) {
                $id = count(scandir(".")) - 7; // index.php, shortner.php, logins,  example.php
                mkdir($id);
                $contents = str_ireplace("€url", $url, file_get_contents("example.php")); // why € ? because $ was taken + random xD
                file_put_contents($id. DIRECTORY_SEPARATOR . "index.php", $contents);
                file_put_contents($id. DIRECTORY_SEPARATOR . "clicks", "0");
                $authed = true;
                $this->newurl = "http://mc-pe.ga/".$id."/";
            }
        }
        if(!isset($authed)) {
            $this->newurl = $this->url . "  (Invalid Shortener logins ! Please inform server owner about this ! )";
        }
    }
    public function getNewUrl() {
        return $this->newurl;
    }
}