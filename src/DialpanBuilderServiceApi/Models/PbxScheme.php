<?php
namespace InternalApi\DialplanBuilderService\Models;

use InternalApi\Common\Model\Model;

class PbxScheme extends Model
{
    /**
     * @var int
     */
    private $id;
    /**
     * @var string
     */
    private $pbxSchemeId;
    /**
     * @var string
     */
    private $startExten;
    /**
     * @var string
     */
    private $companyId;
    /**
     * @var string
     */
    private $pbxId;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     *
     * @return PbxScheme
     */
    public function setId(int $id): PbxScheme
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getPbxSchemeId(): string
    {
        return $this->pbxSchemeId;
    }

    /**
     * @param string $pbxSchemeId
     *
     * @return PbxScheme
     */
    public function setPbxSchemeId(string $pbxSchemeId): PbxScheme
    {
        $this->pbxSchemeId = $pbxSchemeId;

        return $this;
    }

    /**
     * @return string
     */
    public function getStartExten(): string
    {
        return $this->startExten;
    }

    /**
     * @param string $startExten
     *
     * @return PbxScheme
     */
    public function setStartExten(string $startExten): PbxScheme
    {
        $this->startExten = $startExten;

        return $this;
    }

    /**
     * @return string
     */
    public function getCompanyId(): string
    {
        return $this->companyId;
    }

    /**
     * @param string $companyId
     *
     * @return PbxScheme
     */
    public function setCompanyId(string $companyId): PbxScheme
    {
        $this->companyId = $companyId;

        return $this;
    }

    /**
     * @return string
     */
    public function getPbxId(): string
    {
        return $this->pbxId;
    }

    /**
     * @param string $pbxId
     *
     * @return PbxScheme
     */
    public function setPbxId(string $pbxId): PbxScheme
    {
        $this->pbxId = $pbxId;

        return $this;
    }
}