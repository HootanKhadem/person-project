<?php

class Status implements JsonSerializable
{

    // 1xx Informational response
     const CONTINUE = ["code" => 100, "title" => "Continue", "desc" => null];
     const SWITCHING_PROTOCOLS = ["code" => 101, "title" => "Switching Protocols", "desc" => null];
     const PROCESSING = ["code" => 102, "title" => "Processing", "desc" => "(WebDAV; RFC 2518)"];
     const EARLY_HINTS = ["code" => 103, "title" => "Early Hints", "desc" => "(RFC 8297)"];

    // 2xx Success
     const OK = ["code" => 200, "title" => "OK", "desc" => null];
     const CREATED = ["code" => 201, "title" => "Created", "desc" => null];
     const ACCEPTED = ["code" => 202, "title" => "Accepted", "desc" => null];
     const NON_AUTHORITATIVE_INFORMATION = ["code" => 203, "title" => "Non-Authoritative Information", "desc" => "(since HTTP/1.1)"];
     const NO_CONTENT = ["code" => 204, "title" => "No Content", "desc" => null];
     const RESET_CONTENT = ["code" => 205, "title" => "Reset Content", "desc" => null];
     const PARTIAL_CONTENT = ["code" => 206, "title" => "Partial Content", "desc" => "(RFC 7233)"];
     const MULTI_STATUS = ["code" => 207, "title" => "Multi-Status", "desc" => "(WebDAV; RFC 4918)"];
     const ALREADY_REPORTED = ["code" => 208, "title" => "Already Reported", "desc" => "(WebDAV; RFC 5842)"];
     const IM_USED = ["code" => 226, "title" => "IM Used", "desc" => "(RFC 3229)"];

    // 3xx Redirection
     const MULTIPLE_CHOICES = ["code" => 300, "title" => "Multiple Choices", "desc" => null];
     const MOVED_PERMANENTLY = ["code" => 301, "title" => "Moved Permanently", "desc" => null];
     const FOUND = ["code" => 302, "title" => "Found", "desc" => "(Previously \"Moved temporarily\")"];
     const SEE_OTHER = ["code" => 303, "title" => "See Other", "desc" => "(since HTTP/1.1)"];
     const NOT_MODIFIED = ["code" => 304, "title" => "Not Modified", "desc" => "(RFC 7232)"];
     const USE_PROXY = ["code" => 305, "title" => "Use Proxy", "desc" => "(since HTTP/1.1)"];
     const SWITCH_PROXY = ["code" => 306, "title" => "Switch Proxy", "desc" => null];
     const TEMPORARY_REDIRECT = ["code" => 307, "title" => "Temporary Redirect", "desc" => "(since HTTP/1.1)"];
     const PERMANENT_REDIRECT = ["code" => 308, "title" => "Permanent Redirect", "desc" => "(RFC 7538)"];

    // 4xx Client errors
     const BAD_REQUEST = ["code" => 400, "title" => "Bad Request", "desc" => null];
     const UNAUTHORIZED = ["code" => 401, "title" => "Unauthorized", "desc" => "(RFC 7235)"];
     const PAYMENT_REQUIRED = ["code" => 402, "title" => "Payment Required", "desc" => null];
     const FORBIDDEN = ["code" => 403, "title" => "Forbidden", "desc" => null];
     const NOT_FOUND = ["code" => 404, "title" => "Not Found", "desc" => null];
     const METHOD_NOT_ALLOWED = ["code" => 405, "title" => "Method Not Allowed", "desc" => null];
     const NOT_ACCEPTABLE = ["code" => 406, "title" => "Not Acceptable", "desc" => null];
     const PROXY_AUTHENTICATION_REQUIRED = ["code" => 407, "title" => "Proxy Authentication Required", "desc" => "(RFC 7235)"];
     const REQUEST_TIMEOUT = ["code" => 408, "title" => "Request Timeout", "desc" => null];
     const CONFLICT = ["code" => 409, "title" => "Conflict", "desc" => null];
     const GONE = ["code" => 410, "title" => "Gone", "desc" => null];
     const LENGTH_REQUIRED = ["code" => 411, "title" => "Length Required", "desc" => null];
     const PRECONDITION_FAILED = ["code" => 412, "title" => "Precondition Failed", "desc" => "(RFC 7232)"];
     const PAYLOAD_TOO_LARGE = ["code" => 413, "title" => "Payload Too Large", "desc" => "(RFC 7231)"];
     const URI_TOO_LONG = ["code" => 414, "title" => "URI Too Long", "desc" => "(RFC 7231)"];
     const UNSUPPORTED_MEDIA_TYPE = ["code" => 415, "title" => "Unsupported Media Type", "desc" => null];
     const RANGE_NOT_SATISFIABLE = ["code" => 416, "title" => "Range Not Satisfiable", "desc" => "(RFC 7233)"];
     const EXPECTATION_FAILED = ["code" => 417, "title" => "Expectation Failed", "desc" => null];
     const IM_A_TEAPOT = ["code" => 418, "title" => "I'm a teapot", "desc" => "(RFC 2324, RFC 7168)"];
     const MISDIRECTED_REQUEST = ["code" => 421, "title" => "Misdirected Request", "desc" => "(RFC 7540)"];
     const UNPROCESSABLE_ENTITY = ["code" => 422, "title" => "Unprocessable Entity", "desc" => "(WebDAV; RFC 4918)"];
     const LOCKED = ["code" => 423, "title" => "Locked", "desc" => "(WebDAV; RFC 4918)"];
     const FAILED_DEPENDENCY = ["code" => 424, "title" => "Failed Dependency", "desc" => "(WebDAV; RFC 4918)"];
     const UPGRADE_REQUIRED = ["code" => 426, "title" => "Upgrade Required", "desc" => null];
     const PRECONDITION_REQUIRED = ["code" => 428, "title" => "Precondition Required", "desc" => "(RFC 6585)"];
     const TOO_MANY_REQUESTS = ["code" => 429, "title" => "Too Many Requests", "desc" => "(RFC 6585)"];
     const REQUEST_HEADER_FIELDS_TOO_LARGE = ["code" => 431, "title" => "Request Header Fields Too Large", "desc" => "(RFC 6585)"];
     const UNAVAILABLE_FOR_LEGAL_REASONS = ["code" => 451, "title" => "Unavailable For Legal Reasons", "desc" => "(RFC 7725)"];

    // 5xx Server errors
     const INTERNAL_SERVER_ERROR = ["code" => 500, "title" => "Internal Server Error", "desc" => null];
     const NOT_IMPLEMENTED = ["code" => 501, "title" => "Not Implemented", "desc" => null];
     const BAD_GATEWAY = ["code" => 502, "title" => "Bad Gateway", "desc" => null];
     const SERVICE_UNAVAILABLE = ["code" => 503, "title" => "Service Unavailable", "desc" => null];
     const GATEWAY_TIMEOUT = ["code" => 504, "title" => "Gateway Timeout", "desc" => null];
     const HTTP_VERSION_NOT_SUPPORTED = ["code" => 505, "title" => "HTTP Version Not Supported", "desc" => null];
     const VARIANT_ALSO_NEGOTIATES = ["code" => 506, "title" => "Variant Also Negotiates", "desc" => "(RFC 2295)"];
     const INSUFFICIENT_STORAGE = ["code" => 507, "title" => "Insufficient Storage", "desc" => "(WebDAV; RFC 4918)"];
     const LOOP_DETECTED = ["code" => 508, "title" => "Loop Detected", "desc" => "(WebDAV; RFC 5842)"];
     const NOT_EXTENDED = ["code" => 510, "title" => "Not Extended", "desc" => "(RFC 2774)"];
     const NETWORK_AUTHENTICATION_REQUIRED = ["code" => 511, "title" => "Network Authentication Required", "desc" => "(RFC 6585)"];

    /**
     * @var integer
     */
    private $code;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $desc;

    /**
     * Status constructor.
     * @param int $code
     * @param string $title
     * @param string $desc
     */
     function __construct(int $code, string $title, string $desc = null)
    {
        $this->code = $code;
        settype($this->code, 'integer');
        $this->title = $title;
        settype($this->title, 'string');
        $this->desc = $desc;
        settype($this->desc, 'string');
    }

    /**
     * Creates Status object from array
     * @param array $arr
     * @return mixed
     */
     static function create(array $arr)
    {
        return new Status($arr['code'], $arr['title'], $arr['desc']);
    }

    /**
     * Converts object to array
     * @return array
     */
     function toArray(): array
    {
        return [
            'code' => $this->code,
            'title' => $this->title,
            'desc' => $this->desc,
        ];
    }

    /**
     * Specify data which should be serialized to JSON
     * @link https://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4.0
     */
     function jsonSerialize()
    {
        return $this->toArray();
    }
    
}
