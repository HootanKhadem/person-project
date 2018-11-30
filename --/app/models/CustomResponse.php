<?php


class CustomResponse implements JsonSerializable
{

    /**
     * @var Status
     */
    private $status;

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
     * CustomResponse constructor.
     * @param Status $status
     * @param string $schema
     * @param array $data
     * @param array $meta
     */
    public function __construct(Status $status, string $schema, array $data, array $meta)
    {
        $this->status = $status;
        $this->schema = $schema;
        $this->data = $data;
        $this->meta = $meta;
        $this->date = date_format(new DateTime('now', new DateTimeZone(Configuration::APP_TIMEZONE)), 'Y-m-d\TH:i:s.vO');
    }

    /**
     * @return Status
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param Status $status
     */
    public function setStatus(Status $status)
    {
        $this->status = $status;
    }

    /**
     * @return string
     */
    public function getSchema()
    {
        return $this->schema;
    }

    /**
     * @param string $schema
     */
    public function setSchema(string $schema)
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
    public function setData(array $data)
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
    public function setMeta(array $meta)
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
     * @return CustomResponse
     */
    public static function create(array $arr): CustomResponse
    {
        if (!array_key_exists('status', $arr)) throw new InvalidArgumentException("Field 'status' is necessary");
        if (!array_key_exists('schema', $arr)) throw new InvalidArgumentException("Field 'schema' is necessary");
        if (!array_key_exists('data', $arr)) throw new InvalidArgumentException("Field 'data' is necessary");
        if (!array_key_exists('meta', $arr)) throw new InvalidArgumentException("Field 'meta' is necessary");

        $object = new CustomResponse(Status::create($arr['status']), $arr['schema'], $arr['data'], $arr['meta']);

        return $object;
    }

    /**
     * Converts object to array
     * @return array
     */
    public function toArray(): array
    {
        return [
            'status' => $this->status,
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
