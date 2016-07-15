<?php

namespace Markenwerk\GoogleDataStructure\GeoLocation;

/**
 * Class GeoLocationAddress
 *
 * @package Markenwerk\GoogleDataStructure\GeoLocation
 */
class GeoLocationAddress
{

	const TYPE_STREET_NUMBER = 'street_number';
	const TYPE_STREET_NAME = 'route';
	const TYPE_POSTAL_CODE = 'postal_code';
	const TYPE_CITY = 'locality';
	const TYPE_AREA = 'sublocality';
	const TYPE_PROVINCE = 'administrative_area';
	const TYPE_COUNTRY = 'country';

	/**
	 * @var GeoLocationAddressComponent
	 */
	private $streetNumber = null;

	/**
	 * @var GeoLocationAddressComponent
	 */
	private $streetName = null;

	/**
	 * @var GeoLocationAddressComponent
	 */
	private $city = null;

	/**
	 * @var GeoLocationAddressComponent
	 */
	private $postalCode = null;

	/**
	 * @var GeoLocationAddressComponent
	 */
	private $area = null;

	/**
	 * @var GeoLocationAddressComponent
	 */
	private $province = null;

	/**
	 * @var GeoLocationAddressComponent
	 */
	private $country = null;

	/**
	 * @param array $addressData
	 * @return $this
	 */
	public function setFromServiceResult(array $addressData)
	{
		$addressDataCount = count($addressData);
		$validComponentTypes = $this->getValidTypes();
		$validTypeCount = count($validComponentTypes);
		for ($i = 0; $i < $addressDataCount; $i++) {
			$typeCount = count($addressData[$i]['types']);
			for ($j = 0; $j < $typeCount; $j++) {
				$componentType = $addressData[$i]['types'][$j];
				for ($k = 0; $k < $validTypeCount; $k++) {
					if (strpos($componentType, $validComponentTypes[$k]) === 0) {
						$this->setResult(
							$validComponentTypes[$k],
							$addressData[$i]['short_name'],
							$addressData[$i]['long_name']
						);
						break 2;
					}
				}
			}
		}
		return $this;
	}

	/**
	 * @return GeoLocationAddressComponent
	 */
	public function getStreetNumber()
	{
		return $this->streetNumber;
	}

	/**
	 * @return GeoLocationAddressComponent
	 */
	public function getStreetName()
	{
		return $this->streetName;
	}

	/**
	 * @return GeoLocationAddressComponent
	 */
	public function getCity()
	{
		return $this->city;
	}

	/**
	 * @return GeoLocationAddressComponent
	 */
	public function getPostalCode()
	{
		return $this->postalCode;
	}

	/**
	 * @return GeoLocationAddressComponent
	 */
	public function getArea()
	{
		return $this->area;
	}

	/**
	 * @return GeoLocationAddressComponent
	 */
	public function getProvince()
	{
		return $this->province;
	}

	/**
	 * @return GeoLocationAddressComponent
	 */
	public function getCountry()
	{
		return $this->country;
	}

	/**
	 * @param GeoLocationAddressComponent $streetNumber
	 * @return $this
	 */
	public function setStreetNumber($streetNumber)
	{
		$this->streetNumber = $streetNumber;
		return $this;
	}

	/**
	 * @param GeoLocationAddressComponent $streetName
	 * @return $this
	 */
	public function setStreetName($streetName)
	{
		$this->streetName = $streetName;
		return $this;
	}

	/**
	 * @param GeoLocationAddressComponent $city
	 * @return $this
	 */
	public function setCity($city)
	{
		$this->city = $city;
		return $this;
	}

	/**
	 * @param GeoLocationAddressComponent $postalCode
	 * @return $this
	 */
	public function setPostalCode($postalCode)
	{
		$this->postalCode = $postalCode;
		return $this;
	}

	/**
	 * @param GeoLocationAddressComponent $area
	 * @return $this
	 */
	public function setArea($area)
	{
		$this->area = $area;
		return $this;
	}

	/**
	 * @param GeoLocationAddressComponent $province
	 * @return $this
	 */
	public function setProvince($province)
	{
		$this->province = $province;
		return $this;
	}

	/**
	 * @param GeoLocationAddressComponent $country
	 * @return $this
	 */
	public function setCountry($country)
	{
		$this->country = $country;
		return $this;
	}

	/**
	 * @return bool
	 */
	public function hasStreetNumber()
	{
		return !is_null($this->streetNumber);
	}

	/**
	 * @return bool
	 */
	public function hasStreetName()
	{
		return !is_null($this->streetName);
	}

	/**
	 * @return bool
	 */
	public function hasCity()
	{
		return !is_null($this->city);
	}

	/**
	 * @return bool
	 */
	public function hasPostalCode()
	{
		return !is_null($this->postalCode);
	}

	/**
	 * @return bool
	 */
	public function hasArea()
	{
		return !is_null($this->area);
	}

	/**
	 * @return bool
	 */
	public function hasProvince()
	{
		return !is_null($this->province);
	}

	/**
	 * @return bool
	 */
	public function hasCountry()
	{
		return !is_null($this->country);
	}

	/**
	 * @return array
	 */
	private function getValidTypes()
	{
		return array(
			self::TYPE_STREET_NUMBER,
			self::TYPE_STREET_NAME,
			self::TYPE_POSTAL_CODE,
			self::TYPE_CITY,
			self::TYPE_AREA,
			self::TYPE_PROVINCE,
			self::TYPE_COUNTRY,
		);
	}

	/**
	 * @param string $type
	 * @param string $shortName
	 * @param string $longName
	 */
	private function setResult($type, $shortName, $longName)
	{
		switch ($type) {
			case self::TYPE_STREET_NUMBER:
				$this->streetNumber = new GeoLocationAddressComponent($shortName, $longName);
				break;
			case self::TYPE_STREET_NAME:
				$this->streetName = new GeoLocationAddressComponent($shortName, $longName);
				break;
			case self::TYPE_POSTAL_CODE:
				$this->postalCode = new GeoLocationAddressComponent($shortName, $longName);
				break;
			case self::TYPE_CITY:
				$this->city = new GeoLocationAddressComponent($shortName, $longName);
				break;
			case self::TYPE_AREA:
				$this->area = new GeoLocationAddressComponent($shortName, $longName);
				break;
			case self::TYPE_PROVINCE:
				$this->province = new GeoLocationAddressComponent($shortName, $longName);
				break;
			case self::TYPE_COUNTRY:
				$this->country = new GeoLocationAddressComponent($shortName, $longName);
				break;
		}
	}

}
