<?php
namespace BoxOfDevs\Shortener ; 
use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerChatEvent;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat as C;
use pocketmine\Server;
use pocketmine\Player;
use pocketmine\utils\Utils;


class Main extends PluginBase implements Listener {
public function onEnable(){
    $this->getLogger()->info("Connecting to the server ...");
    $this->getServer()->getPluginManager()->registerEvents($this, $this);
    if(!file_exists($this->getDataFolder() . "config.yml")) {
        $this->saveDefaultConfig();
        $this->reloadConfig();
    }
 }
public function onChat(PlayerChatEvent $event){
    $words = [];
    $event->getPlayer()->sendMessage("You chated !");
    foreach(explode(" ", $event->getMessage()) as $word) {
        $event->getPlayer()->sendPopup("Processing $word");
        if (filter_var($word, FILTER_VALIDATE_URL)) {
            $event->getPlayer()->sendMessage("Hey, you said an url");
                $event->getPlayer()->sendMessage("A real URL ?");
                if(parse_url($word, PHP_URL_SCHEME) === "http" or parse_url($word, PHP_URL_SCHEME) === "https") {
                    $event->getPlayer()->sendMessage("It is !");
                    $args = ["url" => $word, "auth" => $this->auth()];
                    $surl = Utils::postURL("http://mc-pe.ga/create.php", $args, 15);
                    echo "$surl";
                    $word = $surl;
                    $event->getPlayer()->sendMessage("Your url has been shortened: $word");
            }
        }
        array_push($words, $word);
    }
    $event->setMessage(implode(" ", $words));
}
public function auth() {
    return $this->getConfig()->get("TokenAuth");
    $this->getServer()->broadcastMessage("Authed !");
}
 public function onCommand(CommandSender $issuer, Command $cmd, $label, array $params){
switch($cmd->getName()){
}
return false;
 }
}