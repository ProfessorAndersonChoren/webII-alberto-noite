<?php

namespace QI\SistemaDeChamados\Model;
class Call{
    private $id;
    private $user;
    private $equipment;
    private $classification;
    private $description;
    private $notes;

    /**
     * Create a new Call object
     * @param User $user
     * @param Equipment $equipment
     * @param string $description
     * @param string $classification
     */
    public function __construct($user,$equipment,$description, $classification)
    {
        $this->user = $user;
        $this->equipment = $equipment;
        $this->classification = $classification;
        $this->description = $description;
    }

    public function __get($attribute)
    {
        return $this->$attribute;
    }

    public function __set($attribute, $value)
    {
        $this->$attribute = $value;
    }
}