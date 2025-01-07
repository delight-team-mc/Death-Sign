public function tiezo(\pocketmine\event\player\PlayerDeathEvent $ev): void
  {
    $ev->setDrops(array_merge($ev->getDrops(), [(\pocketmine\block\VanillaBlocks::OAK_SIGN()->asItem()->setCustomBlockData(
      \pocketmine\nbt\tag\CompoundTag::create()
        ->setByte(\pocketmine\block\tile\Sign::TAG_WAXED, 1)
        ->setTag(
          \pocketmine\block\tile\Sign::TAG_FRONT_TEXT,
          \pocketmine\nbt\tag\CompoundTag::create()
            ->setString(\pocketmine\block\tile\Sign::TAG_TEXT_BLOB, implode("\n", [
              '§c' . $ev->getPlayer()->getName(),
              '§eSlain by',
              '§a' . match ($ev->getPlayer()->getLastDamageCause()?->getCause()) {
                \pocketmine\event\entity\EntityDamageEvent::CAUSE_CONTACT => 'Contacto',
                \pocketmine\event\entity\EntityDamageEvent::CAUSE_ENTITY_ATTACK => ($ev->getPlayer()->getLastDamageCause()->getDamager() instanceof \pocketmine\entity\Living ? $ev->getPlayer()->getLastDamageCause()->getDamager()->getName() : 'Desconocido'),
                \pocketmine\event\entity\EntityDamageEvent::CAUSE_PROJECTILE => 'Projectil',
                \pocketmine\event\entity\EntityDamageEvent::CAUSE_SUFFOCATION => 'Sofocacion',
                \pocketmine\event\entity\EntityDamageEvent::CAUSE_FALL => 'Caida',
                \pocketmine\event\entity\EntityDamageEvent::CAUSE_FIRE, \pocketmine\event\entity\EntityDamageEvent::CAUSE_FIRE_TICK => 'Fuego',
                \pocketmine\event\entity\EntityDamageEvent::CAUSE_LAVA => 'Lava',
                \pocketmine\event\entity\EntityDamageEvent::CAUSE_DROWNING => 'Ahogado',
                \pocketmine\event\entity\EntityDamageEvent::CAUSE_BLOCK_EXPLOSION => 'Explosion de Bloque',
                \pocketmine\event\entity\EntityDamageEvent::CAUSE_ENTITY_EXPLOSION => 'Explosion de Entidad',
                \pocketmine\event\entity\EntityDamageEvent::CAUSE_VOID => 'Vacio',
                \pocketmine\event\entity\EntityDamageEvent::CAUSE_SUICIDE => 'Suicidio',
                \pocketmine\event\entity\EntityDamageEvent::CAUSE_MAGIC => 'Magia',
                \pocketmine\event\entity\EntityDamageEvent::CAUSE_CUSTOM => 'Custom',
                \pocketmine\event\entity\EntityDamageEvent::CAUSE_STARVATION => 'Hambre',
                \pocketmine\event\entity\EntityDamageEvent::CAUSE_FALLING_BLOCK => 'Caida de Bloque',
                default => 'Desconocido'
              },
              '§b' . date('d/m H:i')
            ]))
            ->setByte(\pocketmine\block\tile\Sign::TAG_GLOWING_TEXT, 1)
            ->setByte(\pocketmine\block\tile\Sign::TAG_PERSIST_FORMATTING, 1)
        )
    ))]));
  }