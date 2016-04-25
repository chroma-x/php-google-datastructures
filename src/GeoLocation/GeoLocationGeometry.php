<?php

namespace GoogleDataStructure\GeoLocation;

/**
 * Class GeoLocationGeometry
 *
 * @package GoogleDataStructure\GeoLocation
 */
class GeoLocationGeometry
{

	/**
	 * @var GeoLocation
	 */
	private $location = null;

	/**
	 * @var GeoLocationViewport
	 */
	private $viewport = null;

	/**
	 * @param array $geometryData
	 * @return $this
	 */
	public function setFromServiceResult(array $geometryData)
	{
		$this->location = new GeoLocation($geometryData['location']['lat'], $geometryData['location']['lng']);
		$this->viewport = new GeoLocationViewport(
			new GeoLocation(
				$geometryData['viewport']['northeast']['lat'],
				$geometryData['viewport']['northeast']['lng']
			),
			new GeoLocation(
				$geometryData['viewport']['southwest']['lat'],
				$geometryData['viewport']['southwest']['lng']
			)
		);
		return $this;
	}

	/**
	 * @return GeoLocation
	 */
	public function getLocation()
	{
		return $this->location;
	}

	/**
	 * @return GeoLocationViewport
	 */
	public function getViewport()
	{
		return $this->viewport;
	}

	/**
	 * @param GeoLocation $location
	 * @return $this
	 */
	public function setLocation($location)
	{
		$this->location = $location;
		return $this;
	}

	/**
	 * @param GeoLocationViewport $viewport
	 * @return $this
	 */
	public function setViewport($viewport)
	{
		$this->viewport = $viewport;
		return $this;
	}

	/**
	 * @return bool
	 */
	public function hasLocation()
	{
		return !is_null($this->location);
	}

	/**
	 * @return bool
	 */
	public function hasViewport()
	{
		return !is_null($this->viewport);
	}

}
