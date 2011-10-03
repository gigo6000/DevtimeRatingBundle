<?php
namespace Devtime\RatingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 *  Devtime\RatingBundle\Entity\Rating
 *
 *  @ORM\Table(name="rating")
 */
class Rating 
{

    /** 
     * @var int $rating
     * @ORM\Column(name="rating", type="string", length=255)
     */
    private $rating;

    /** 
     * @var string $message
     *
     * @ORM\Column(name="message", type="string", length=255)
     */
    private $message;


}

