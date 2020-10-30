<?php


namespace FontLib\Table\Type;
use FontLib\Table\Table;
use Exception;

/**
 * `cff` font table.
 *
 * @package php-font-lib
 */
class cff extends Table {
    private static $header_format = array(
        "formatMajor"        => self::uint8,
        "formatMinor"        => self::uint8,
        "headerSize"         => self::uint8,
        "absoluteOffset"     => self::uint8
    );

    private static $index_header_format = array(
        "count"              => self::uint16,
        "offsetSize"         => self::uint8,

    );

    private static $index_offests_format = array(
        "offset"             => self::uint8
    );

    private $font;

    protected function _parse() {
        $this->font = $this->getFont();

        $cff_offset = $this->font->pos();

        $this->data["header"] = $this->font->unpack(self::$header_format);

        $this->data["nameIndex"] = $this->getIndex();
        $this->data["TopDICTIndex"] = $this->getIndex();
//        $data["nameIndex"] = $this->getIndex();
//        var_dump($this->data);die;
    }

    private function getIndex() {

        $header = $this->font->unpack(self::$index_header_format);
        $offsets = array();
        $objects = array();

        for ($i = 0; $i < $header["count"] + 1; $i++) {
            $offsets[] = $this->font->unpack(self::$index_offests_format);
        }

        for ($i = 1; $i < $header["count"] + 1; $i++) {

            $objects[] = $this->font->read($offsets[$i]["offset"]-1);
        }
        return array(
            "count" => $header["count"],
            "offsetSize" => $header["offsetSize"],
            "offsets" => $offsets,
            "objects" => $objects
        );
    }
}