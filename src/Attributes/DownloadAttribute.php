<?php

declare(strict_types=1);

namespace RedSky\Html\Attributes;

/**
 * Represents an HTML download attribute.
 *
 * Indicates that the target resource should be downloaded instead
 * of navigated to. Optionally specifies the downloaded file name.
 *
 * Examples:
 *
 * - download
 * - download="report.pdf"
 */
class DownloadAttribute extends Attribute
{
    /**
     * Creates a new download attribute instance.
     *
     * @param string|bool|null $value The download file name or boolean flag.
     */
    public function __construct(string|bool|null $value = true)
    {
        parent::__construct('download', $value);
    }

    /**
     * Returns the download value.
     *
     * @return string|bool|null
     */
    public function getDownload(): string|bool|null
    {
        return $this->getValue();
    }

    /**
     * Sets the download value.
     *
     * @param string|bool|null $value The download file name or boolean flag.
     *
     * @return static
     */
    public function setDownload(string|bool|null $value): static
    {
        $this->setValue($value);

        return $this;
    }
}