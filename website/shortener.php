<?php
class SUrl {
    public function __construct($url, $auth) {
        $this->url = $url;
        $this->auth = $auth;
        $this->iniUrl();
    }
    public function iniUrl() {
        $log = $this->auth;
        echo unserialize('logins');
        foreach(unserialize(file_get_contents("logins")) as $logs) {
            if(sha1($log['username']) === $logs['username'] and sha1($log['password']) === $logs['password']) {
                $this->id = count(scandir(".")) - 7; // index.php, shortner.php, logins,  example.php
                mkdir($this->id);
                $contents = str_ireplace("€url", $this->url, file_get_contents("example.php")); // why € ? because $ was taken + random xD
                file_put_contents($this->id . DIRECTORY_SEPARATOR . "index.php", $contents);
                file_put_contents($this->id . DIRECTORY_SEPARATOR . "clicks", "0");
                $authed = true;
                $this->newurl = $id;
            }
        }
        if(!isset($authed)) {
            $this->newurl = $this->url . "  (Invalid Shortener logins ! Please inform server owner about this ! )";
        }
    }
    public function getId() {
        return $this->newurl;
    }
}