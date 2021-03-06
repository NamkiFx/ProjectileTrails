<?php

/**
 * Copyright 2020 Fadhel
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

declare(strict_types=1);

namespace Fadhel\ProjectileTrails\entity;

use Fadhel\ProjectileTrails\Main;
use pocketmine\entity\projectile\Snowball as ISnowball;
use pocketmine\Player;

class Snowball extends ISnowball
{
    /**
     * @var Main
     */
    public $plugin;

    /**
     * @var Player
     */
    public $owner;

    public function entityBaseTick(int $tickDiff = 1): bool
    {
        if ($this->owner instanceof Player and $this->owner->isOnline() and !$this->isCollided) {
            $this->plugin->spawnParticle($this->owner, $this);
        } else {
            $this->owner = null;
        }
        return parent::entityBaseTick($tickDiff);
    }
}
