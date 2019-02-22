<?php

namespace InternalApi\PhoneNumberServiceApi\Models;

use Illuminate\Support\Collection;
use InternalApi\Common\Model\Model;

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
     * @var DidToPbx|null
     */
    protected $pbx;

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
     * @return DIDPhoneNumber
     */
    public function setId(string $id): DIDPhoneNumber
    {
        $this->id = $id;

        return $this;
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
     *
     * @return DIDPhoneNumber
     */
    public function setPhoneNumber(string $phoneNumber): DIDPhoneNumber
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
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
     *
     * @return DIDPhoneNumber
     */
    public function setStatus(string $status): DIDPhoneNumber
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return DidToPbx|null
     */
    public function getPbx(): ?DidToPbx
    {
        return $this->pbx;
    }

    /**
     * @param DidToPbx|null $pbx
     *
     * @return DIDPhoneNumber
     */
    public function setPbx(Collection $pbxData): DIDPhoneNumber
    {
        $this->pbx = (new DidToPbx())->setData($pbxData->toArray());

        return $this;
    }
}