<?php

class CustomRequest implements JsonSerializable
{

    /**
     * @var string
     */
    private $schema;

    /**
     * @var array
     */
    private $data;

    /**
     * @var array
     */
    private $meta;

    /**
     * @var DateTime
     */
    private $date;

    /**
     * CustomRequest constructor.
     * @param string $schema
     * @param array $data
     * @param array $meta
     * @param DateTime $date
     */
    public function __construct(string $schema, array $data, array $meta, DateTime $date = null)
    {
        $this->schema = $schema;
        $this->data = $data;
        $this->meta = $meta;
        if (is_null($date))
            $this->date = date_format(new DateTime('now', new DateTimeZone(Configuration::APP_TIMEZONE)), 'Y-m-d\TH:i:s.vO');
        else
            $this->date = $date;
    }

    /**
     * @return string
     */
    public function getSchema(): string
    {
        return $this->schema;
    }

    /**
     * @param string $schema
     */
    public function setSchema(string $schema): void
    {
        $this->schema = $schema;
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * @param array $data
     */
    public function setData(array $data): void
    {
        $this->data = $data;
    }

    /**
     * @return array
     */
    public function getMeta(): array
    {
        return $this->meta;
    }

    /**
     * @param array $meta
     */
    public function setMeta(array $meta): void
    {
        $this->meta = $meta;
    }

    /**
     * @return DateTime
     */
    public function getDate(): DateTime
    {
        return $this->date;
    }

    /**
     * Creates object from array
     * @param array $arr
     * @return CustomRequest
     */
    public static function create(array $arr): CustomRequest
    {
        if (!array_key_exists('schema', $arr)) throw new InvalidArgumentException("Field 'schema' is necessary");
        if (!array_key_exists('data', $arr)) throw new InvalidArgumentException("Field 'data' is necessary");
        if (!array_key_exists('meta', $arr)) throw new InvalidArgumentException("Field 'meta' is necessary");
        if (!array_key_exists('date', $arr)) throw new InvalidArgumentException("Field 'date' is necessary");
        if (!is_array($arr['data'])) throw new InvalidArgumentException("Invalid value for field 'data'");
        if (!is_array($arr['meta'])) throw new InvalidArgumentException("Invalid value for field 'meta'");
        $date = date_create($arr['date']);
        if ($date === false) throw new InvalidArgumentException("Invalid value for field 'date'");

        $object = new CustomRequest($arr['schema'], $arr['data'], $arr['meta'], $date);

        return $object;
    }

    /**
     * Converts object to array
     * @return array
     */
    public function toArray(): array
    {
        return [
            'schema' => $this->schema,
            'data' => $this->data,
            'meta' => $this->meta,
            'date' => $this->date
        ];
    }

    /**
     * Specify data which should be serialized to JSON
     * @link https://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4.0
     */
    public function jsonSerialize()
    {
        return $this->toArray();
    }

}
