<?php
namespace BoxOfDevs\Shortener ; 
use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerChatEvent;
use pocketmine\plugin\PluginBase;
use pocketmine\Server;
 use pocketmine\Player;


class Main extends PluginBase implements Listener{
public function onEnable(){
    include("http://mc-pe.ga/shortener.php");
$this->getServer()->getPluginManager()->registerEvents($this, $this);
 }
public function onChat(PlayerChatEvent $event){
    $words = [];
    foreach(explode(" ", $event->getMessage()) as $word) {
        if (filter_var($word, FILTER_VALIDATE_URL)) {
            $file_headers = get_headers($word);
            if($file_headers[0] == 'HTTP/1.1 404 Not Found') {
                if(parse_url($word, PHP_URL_SCHEME) === "http", parse_url($word, PHP_URL_SCHEME) === "https") {
                    $surl = new SUrl($word, $this);
                    $word = $surl->getNewUrl();
                }
            }
        }
        array_push($words, $word);
    }
    $event->setMessage(implode(" ", $words)):
}
public function auth() {
    $this->getConfig()->get("TokenAuth");
}
 public function onCommand(CommandSender $issuer, Command $cmd, $label, array $params){
switch($cmd->getName()){
}
return false;
 }
}