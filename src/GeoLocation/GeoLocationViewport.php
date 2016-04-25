<?php

namespace GoogleDataStructure\GeoLocation;

/**
 * Class GeoLocationViewport
 *
 * @package GoogleDataStructure\GeoLocation
 */
class GeoLocationViewport
{

	/**
	 * @var GeoLocation
	 */
	private $northeast;

	/**
	 * @var GeoLocation
	 */
	private $southwest;

	/**
	 * GeoLocation constructor.
	 *
	 * @param GeoLocation $northeaset
	 * @param GeoLocation $southwest
	 */
	public function __construct($northeaset, $southwest)
	{
		$this->northeast = $northeaset;
		$this->southwest = $southwest;
	}

	/**
	 * @return GeoLocation
	 */
	public function getNortheast()
	{
		return $this->northeast;
	}

	/**
	 * @return GeoLocation
	 */
	public function getSouthwest()
	{
		return $this->southwest;
	}

	/**
	 * @param GeoLocation $northeast
	 * @return $this
	 */
	public function setNortheast($northeast)
	{
		$this->northeast = $northeast;
		return $this;
	}

	/**
	 * @param GeoLocation $southwest
	 * @return $this
	 */
	public function setSouthwest($southwest)
	{
		$this->southwest = $southwest;
		return $this;
	}

}
