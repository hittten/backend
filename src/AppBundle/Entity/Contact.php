<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Contact
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Contact
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     *
     * @Assert\NotBlank(message="The name should not be blank.")
     * @Assert\Length(
     *      min = 2,
     *      max = 50,
     *      minMessage = "The name should be at least {{ limit }} characters.",
     *      maxMessage = "The name can not have more than {{ limit }} characters."
     * )
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     *
     * @Assert\NotBlank(message="The email should not be blank.")
     * @Assert\Email(
     *     message = "The email '{{ value }}' is not a valid email address.",
     *     checkMX = true
     * )
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="mobile", type="string", length=255)
     *
     * @Assert\NotBlank(message="The mobile should not be blank.")
     * @Assert\Length(
     *      min = 9,
     *      max = 30,
     *      minMessage = "The mobile should be at least {{ limit }} numbers.",
     *      maxMessage = "Mobile can not have more than {{ limit }} numbers."
     * )
     * @Assert\Type(
     *     type="integer",
     *     message="Mobile should be a valid number."
     * )
     */
    private $mobile;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Contact
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Contact
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set mobile
     *
     * @param string $mobile
     * @return Contact
     */
    public function setMobile($mobile)
    {
        $this->mobile = $mobile;

        return $this;
    }

    /**
     * Get mobile
     *
     * @return string 
     */
    public function getMobile()
    {
        return $this->mobile;
    }
}
