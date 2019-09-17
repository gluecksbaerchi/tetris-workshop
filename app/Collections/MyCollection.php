<?php


namespace App\Collections;


use Exception;

class MyCollection
{
    /**
     * @var Collectable[]
     */
    protected $items;

    /**
     * @param Collectable $item
     */
    public function addOrReplaceItem(Collectable $item): void
    {
        $this->items[$item->getIdentifier()] = $item;
    }

    /**
     * @return Collectable[]
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * @param $identifier
     * @return Collectable
     * @throws Exception
     */
    public function getItem($identifier): Collectable
    {
        if (!isset($this->items[$identifier])) {
            throw new Exception("Item existiert nicht!");
        }
        return $this->items[$identifier];
    }
}
