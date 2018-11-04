<?php

namespace InternalApi\PhoneNumberServiceApi\Models;

use InternalApi\Common\Model;

class DIDPhoneNumber extends Model
{
    /**
     * @var string
     */
    protected $id;
    /**
     * @var string
     */
    protected $phoneNumber;
    /**
     * @var string
     */
    protected $status;
    /**
     * @var string|null
     */
    protected $companyId;
    /**
     * @var string|null
     */
    protected $pbxId;

    public function __construct(?array $data = null)
    {
        if ($data !== null) {
            $this->fill($data);
        }
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getPhoneNumber(): string
    {
        return $this->phoneNumber;
    }

    /**
     * @param string $phoneNumber
     */
    public function setPhoneNumber(string $phoneNumber): void
    {
        $this->phoneNumber = $phoneNumber;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    /**
     * @return null|string
     */
    public function getCompanyId(): ?string
    {
        return $this->companyId;
    }

    /**
     * @param null|string $companyId
     */
    public function setCompanyId(?string $companyId): void
    {
        $this->companyId = $companyId;
    }

    /**
     * @return null|string
     */
    public function getPbxId(): ?string
    {
        return $this->pbxId;
    }

    /**
     * @param null|string $pbxId
     */
    public function setPbxId(?string $pbxId): void
    {
        $this->pbxId = $pbxId;
    }


}