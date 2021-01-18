<?php

namespace ChromaX\GoogleDataStructure\GeoLocation;

/**
 * Class GeoLocationGeometry
 *
 * @package ChromaX\GoogleDataStructure\GeoLocation
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
	 * @var GeoLocation[]
	 */
	private $accessPoints = array();

	/**
	 * @param array $geometryData
	 * @return $this
	 */
	public function setFromServiceResult(array $geometryData)
	{
		if (isset($geometryData['location'])) {
			$this->location = new GeoLocation($geometryData['location']['lat'], $geometryData['location']['lng']);
		}
		if (isset($geometryData['viewport'])) {
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
		}
		if (isset($geometryData['access_points'])) {
			$accessPointCount = count($geometryData['access_points']);
			for ($i = 0; $i < $accessPointCount; $i++) {
				$this->addAccessPoint(new GeoLocation(
					$geometryData['access_points'][$i]['location']['lat'],
					$geometryData['access_points'][$i]['location']['lng']
				));
			}
		}
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
	 * @param GeoLocation $location
	 * @return $this
	 */
	public function setLocation($location)
	{
		$this->location = $location;
		return $this;
	}

	/**
	 * @return GeoLocationViewport
	 */
	public function getViewport()
	{
		return $this->viewport;
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
	 * @return GeoLocation[]
	 */
	public function getAccessPoints()
	{
		return $this->accessPoints;
	}

	/**
	 * @param int $index
	 * @return GeoLocation
	 */
	public function getAccessPointAt($index)
	{
		if (!isset($this->accessPoints[$index])) {
			return null;
		}
		return $this->accessPoints[$index];
	}

	/**
	 * @param GeoLocation[] $accessPoints
	 * @return $this
	 */
	public function setAccessPoints(array $accessPoints)
	{
		$this->accessPoints = $accessPoints;
		return $this;
	}

	/**
	 * @param GeoLocation $accessPoint
	 * @return $this
	 */
	public function addAccessPoint(GeoLocation $accessPoint)
	{
		$this->accessPoints[] = $accessPoint;
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

	/**
	 * @return bool
	 */
	public function hasAccessPoints()
	{
		return count($this->accessPoints) > 0;
	}

	/**
	 * @return int
	 */
	public function countAccessPoints()
	{
		return count($this->accessPoints);
	}

}
