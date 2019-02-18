<?php
namespace InternalApi\UserServiceApi\Models;

use InternalApi\Common\Model\Model;

class User extends Model
{
    /**
     * @var string
     */
    protected $id;
    /**
     * @var string
     */
    protected $companyId;
    /**
     * @var string
     */
    protected $name;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     *
     * @return User
     */
    public function setId(string $id): User
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getCompanyId(): ?string
    {
        return $this->companyId;
    }

    /**
     * @param string $companyId|null
     *
     * @return User
     */
    public function setCompanyId(?string $companyId): User
    {
        $this->companyId = $companyId;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return User
     */
    public function setName(?string $name): User
    {
        $this->name = $name;

        return $this;
    }
}