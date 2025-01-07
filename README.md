copiar y pegar el codigo en un Listener de PocketMine.MP en version api 5 y listo ya tienes cartelitos al morir con datos basicos

![Foto del resultado](https://media.discordapp.net/attachments/1299573962459578430/1326256481334464593/Screenshot_20250107_131737_Minecraft.png?ex=677ec419&is=677d7299&hm=3aeb8065297ea321d3c8a5f46523c07c8e6521ab78801f150cf5bf67f9f79edf&=&format=webp&quality=lossless&width=1025&height=461)

```php
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
```
