<?php

namespace Markenwerk\GoogleDataStructure\GeoLocation;

/**
 * Class GeoLocationAddressComponent
 *
 * @package Markenwerk\GoogleDataStructure\GeoLocation
 */
class GeoLocationAddressComponent
{

	/**
	 * @var string
	 */
	private $longName;

	/**
	 * @var string
	 */
	private $shortName;

	/**
	 * GeoLocationAddressComponent constructor.
	 *
	 * @param string $shortName
	 * @param string $longName
	 */
	public function __construct($shortName, $longName)
	{
		$this->shortName = $shortName;
		$this->longName = $longName;
	}

	/**
	 * @return string
	 */
	public function getLongName()
	{
		return $this->longName;
	}

	/**
	 * @return string
	 */
	public function getShortName()
	{
		return $this->shortName;
	}

	/**
	 * @param string $longName
	 * @return $this
	 */
	public function setLongName($longName)
	{
		$this->longName = $longName;
		return $this;
	}

	/**
	 * @param string $shortName
	 * @return $this
	 */
	public function setShortName($shortName)
	{
		$this->shortName = $shortName;
		return $this;
	}

}
