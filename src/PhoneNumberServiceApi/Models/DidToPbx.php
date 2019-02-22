<?php


namespace InternalApi\PhoneNumberServiceApi\Models;

use Illuminate\Support\Carbon;
use InternalApi\Common\Model\Model;

class DidToPbx extends Model
{
    /**
     * @var string
     */
    private $pbx_id;
    /**
     * @var string
     */
    private $did_phone_number_id;
    /**
     * @var Carbon
     */
    private $created_at;

    /**
     * @return string
     */
    public function getPbxId(): string
    {
        return $this->pbx_id;
    }

    /**
     * @param string $pbx_id
     *
     * @return DidToPbx
     */
    public function setPbxId(string $pbx_id): DidToPbx
    {
        $this->pbx_id = $pbx_id;

        return $this;
    }

    /**
     * @return string
     */
    public function getDidPhoneNumberId(): string
    {
        return $this->did_phone_number_id;
    }

    /**
     * @param string $did_phone_number_id
     *
     * @return DidToPbx
     */
    public function setDidPhoneNumberId(string $did_phone_number_id): DidToPbx
    {
        $this->did_phone_number_id = $did_phone_number_id;

        return $this;
    }
}