<?php

namespace Mercy\FixPots;

use pocketmine\plugin\PluginBase;

use pocketmine\Player;
use pocketmine\Server;
use pocketmine\level\{Position, Level};
use pocketmine\math\Vector3;
use pocketmine\entity\projectile\SplashPotion;
use pocketmine\event\Listener;
use pocketmine\event\entity\ProjectileHitBlockEvent;

class Main extends PluginBase implements Listener{
	
	public function onEnable(){
     $this->getServer()->getPluginManager()->registerEvents($this, $this);
  }
  
  public function onInteract(ProjectileHitBlockEvent $event)
  {
      $pot = $event->getEntity();
      $player = $pot->getOwningEntity();
      $distance = $pot->distance($player);
      if ($player instanceof Player && $distance < 3 && $pot instanceof SplashPotion) {
          $player->setHealth($player->getHealth() + 2);
      }
  }
}