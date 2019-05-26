<?php
namespace App\Model;

class Category{

    private $id;
    private $slug;
    private $name;

    public function getId(): ?int // un entier on null (?int)
    {
        return $this->id;
    }
    public function getSlug(): ?string // une chaine de caractère ou null
    {
        return $this->slug;
    }
    public function getName(): ?string
    {
        return $this->name;
    }
}