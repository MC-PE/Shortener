<?php
namespace BoxOfDevs\Shortener ; 
use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\Server;
 use pocketmine\Player;


class Main extends PluginBase{
public function onEnable(){
// $this->getServer()->getPluginManager()->registerEvents($this, $this);
 }
public function onLoad(){
}
 public function onCommand(CommandSender $issuer, Command $cmd, $label, array $params){
switch($cmd->getName()){
}
return false;
 }
}