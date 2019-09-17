<?php


namespace App;


class ReverseConfig
{
    /** @var ReverseConfig */
    protected static $instance = null;

    /** @var bool */
    protected $reverse = false;

    /**
     * @return ReverseConfig
     */
    public static function getInstance()
    {
        if (null === self::$instance)
        {
            self::$instance = new self;
        }
        return self::$instance;
    }

    /**
     * @param $isReverseMode
     */
    public function setReverseMode($isReverseMode): void
    {
        $this->reverse = $isReverseMode;
    }

    /**
     * @return bool
     */
    public function isReverseMode()
    {
        return $this->reverse;
    }

    /**
     * clone
     *
     * Kopieren der Instanz von aussen ebenfalls verbieten
     */
    protected function __clone() {}

    /**
     * constructor
     *
     * externe Instanzierung verbieten
     */
    protected function __construct() {}
}
