<?php

namespace GameUI\command;

use pocketmine\Server;
use pocketmine\player\Player;
use pocketmine\plugin\Plugin;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\plugin\PluginOwned;

use GameUI\GameUI;

class GameUICommand extends Command implements PluginOwned{
    
    private $plugin;

    public function __construct(GameUI $plugin){
        $this->plugin = $plugin;
        
        parent::__construct("games", "§r§fGameUI/Menu", "§cUse: /games", ["gamesui"]);
        $this->setAliases(["gui"]);
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args){
        if(count($args) == 0){
            if($sender instanceof Player) {
                $this->plugin->openMyForm($sender);
            } else {
                $sender->sendMessage("Use this command in-game");
            }
        }
        return true;
    }
    
    public function getPlugin(): Plugin{
        return $this->plugin;
    }

    public function getOwningPlugin(): GameUI{
        return $this->plugin;
    }
}
