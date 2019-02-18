<?php

namespace InternalApi\Common\Model;

use Carbon\Carbon;
use Illuminate\Support\Collection;
use JsonSerializable;
use Illuminate\Support\Str;

/**
 * Class Model
 *
 * @package FaMarket\Models
 */
class Model implements ModelContract, JsonSerializable
{
    /**
     * @var string
     */
    protected $createdAt;

    /**
     * @var string
     */
    protected $updatedAt;

    /**
     * setData
     *
     * @param $data
     * @return $this|boolean
     */
    public function setData($data)
    {
        if ($data) {
            foreach ($data as $key => $value) {
                if (is_array($value)) {
                    $value = collect($value);
                }

                $methodName = 'set' . Str::camel($key);
                if (method_exists($this, $methodName)) {
                    $this->{$methodName}($value);
                }
            }
        }

        return $this;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        $response = [];
        foreach ($this as $key => $value) {
            $keyMethod = 'get' . ucfirst($key);

            if ($value instanceof Carbon) {
                $value = $value->toIso8601String();
            }

            if ($value instanceof Collection) {
                $value = $value->toArray();
            }

            if (method_exists($this, $keyMethod)) {
                $value = $this->{$keyMethod}();
            }
            $response[$key] = $value;
        }
        return $response;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return json_encode($this);
    }

    /**
     * Specify data which should be serialized to JSON
     *
     * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4.0
     */
    public function jsonSerialize()
    {
        return $this->toArray();
    }

    /**
     * @param $date
     * @return $this
     */
    public function setCreatedAt($date)
    {
        $this->createdAt = Carbon::parse($date);
        return $this;
    }

    /**
     * @param $date
     * @return $this
     */
    public function setUpdatedAt($date)
    {
        $this->updatedAt = Carbon::parse($date);
        return $this;
    }

    /**
     * @return string
     */
    public function getCreatedAt(): string
    {
        if (property_exists($this,'createdAt')) {
            if ($this->createdAt instanceof Carbon) {
                return $this->createdAt->toIso8601String();
            }
        }

        return '';
    }

    /**
     * @return string
     */
    public function getUpdatedAt(): string
    {
        if (property_exists($this,'updatedAt')) {
            if ($this->updatedAt instanceof Carbon) {
                return $this->updatedAt->toIso8601String();
            }
        }

        return '';
    }
}