<?php
namespace App\Model;

use App\helpers\Text;
use \DateTime;


class Post{

    private $id;
    private $picture;
    private $name;
    private $slug;
    private $content;
    private $created_at;
    private $likes;
    private $isLiked;
    private $categories = []; // liste des catégories

    public function getId(): ?int
    {
        return $this->id;
    }
    public function getPicture(): ?string
    {
        return $this->picture;
    }
    public function getName(): ?string
    {
        return htmlentities($this->name);
    }
    public function getSlug(): ?string
    {
        return $this->slug;
    }
    public function getContent(): ?string
    {
        return nl2br(htmlentities($this->content));
    }
    public function getCreatedAt(): DateTime
    {
        return new DateTime($this->created_at);
    }
    public function getLike(): ?int
    {
        return $this->likes;
    }
    public function getIsLiked(): ?bool
    {
        return $this->isLiked;
    }

    // Retourne l'extrait de text
    public function getExcerpt(): ?string
    {
        if($this->content === null){
            return null;
        }
        return nl2br(htmlentities(Text::excerpt($this->content, 110)));
    }


}