<?php

namespace GameUI;

use pocketmine\Server;
use pocketmine\player\Player;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;

use GameUI\command\GameUICommand;

use Vecnavium\FormsUI\SimpleForm;


class GameUI extends PluginBase implements Listener {
	
	private $config;
	
	public function onEnable(): void{
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
		$this->getServer()->getCommandMap()->register("gamesui", new GameUICommand($this));
		$this->config = new Config($this->getDataFolder() . "config.yml", Config::YAML);
		@mkdir($this->getDataFolder());
                $this->saveDefaultConfig();
		$this->getLogger()->info("GameUI Enabled");
	}

	public function openMyForm($player){
	    $form = new SimpleForm(function(Player $player, int $data = null){
	    	$result = $data;
	    	if($result === null){
	    		return true;
	    	}
	    	switch($result){
	    		case 0:
                            $this->getServer()->getCommandMap()->dispatch($player, $this->getConfig()->get("GameUi-1"));					
			break;
				
			case 1:
			    $this->getServer()->getCommandMap()->dispatch($player, $this->getConfig()->get("GameUi-2"));		
			break;
			
			case 2:
			     $this->getServer()->getCommandMap()->dispatch($player, $this->getConfig()->get("GameUi-3"));		
			break;
				
			case 3:
		            $this->getServer()->getCommandMap()->dispatch($player, $this->getConfig()->get("GameUi-4"));	
			break;
				
			case 4:
			    $this->getServer()->getCommandMap()->dispatch($player, $this->getConfig()->get("GameUi-5"));	
			break;
				
			case 5:
				
			break;
	    	}
	    });
	    $form->setTitle($this->config->get("UITitle"));
	    $form->setContent("Select MiniGame");
	    $form->addButton($this->config->get("Button-1"));
	    $form->addButton($this->config->get("Button-2"));
	    $form->addButton($this->config->get("Button-3"));
	    $form->addButton($this->config->get("Button-4"));
	    $form->addButton($this->config->get("Button-5"));
	    $form->addButton("§cEXIT");
	    $form->sendToPlayer($player);
		return $form;
	}
}
