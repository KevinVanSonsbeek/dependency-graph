<?php

declare(strict_types=1);

namespace Nusje2000\DependencyGraph\Validator;

use Aeviiq\Collection\ObjectCollection;
use Aeviiq\Collection\StringCollection;
use ArrayIterator;

/**
 * @phpstan-extends ObjectCollection<int|string, ViolationInterface>
 * @psalm-extends   ObjectCollection<int|string, ViolationInterface>
 *
 * @method ArrayIterator|ViolationInterface[] getIterator()
 * @method ViolationInterface|null first()
 * @method ViolationInterface|null last()
 */
final class ViolationCollection extends ObjectCollection
{
    public function getMessages(): StringCollection
    {
        /** @var array<string> $messages */
        $messages = $this->map(static function (ViolationInterface $violation) {
            return $violation->getMessage();
        });

        return new StringCollection($messages);
    }

    protected function allowedInstance(): string
    {
        return ViolationInterface::class;
    }
}