<?php

namespace Fi\ApiBundle\Entity;

use FOS\OAuthServerBundle\Entity\AccessToken as BaseAccessToken;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table("oauth2_access_tokens")
 * @ORM\Entity
 */
class AccessToken extends BaseAccessToken
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="Fi\ApiBundle\Entity\Client")
     * @ORM\JoinColumn(nullable=false)
     */
    protected $client;

    /**
     * @ORM\ManyToOne(targetEntity="Fi\ApiBundle\Entity\User")
     */
    protected $user;
}
