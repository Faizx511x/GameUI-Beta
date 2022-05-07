<?php

namespace GameUI;

use pocketmine\Server;
use pocketmine\player\Player;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;

use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;

class GameUI extends PluginBase implements Listener {
	
	public function onCommand(CommandSender $sender, Command $cmd, String $label, Array $args) : bool {

		switch ($cmd->getName()) {
			case "gameui":
				if($sender instanceof Player){
					$this->openMyForm($sender);
				} else {
					$sender->sendMessage("Use this command in-game");
				}
		    }
		return true;    
	}

	public function openMyForm($player){
	    $form = new SimpleForm(function (Player $player, int $data = null){
	    	$result = $data;
	    	if($result === null){
	    		return true;
	    	}
	    	switch($result){
	    		case 0:
					
				break;
					
				case 1:
					
				break;
				
				case 2:
					
				break;
				
				case 3:
					
				break;
				
				case 4:
					
				break;
				
				case 5:
					
				break;
				
				case 6:
					
				break;
	    	}
	    });
	    $form->setTitle("§l§bGamesUI");
		$form->setContent("Please Select Game");
		$form->addButton("");
		$form->addButton("");
		$form->addButton("");
		$form->addButton("");
		$form->addButton("");
		$form->addButton("§cEXIT");
		$player->sendForm($form);
		return $form;
	}
}
