# PHP Google Data Structures

[![SensioLabs Insight](https://img.shields.io/sensiolabs/i/ac6d58da-a89f-4785-b5c6-d6767ce7f8ca.svg)](https://insight.sensiolabs.com/projects/ac6d58da-a89f-4785-b5c6-d6767ce7f8ca)
[![Code Climate](https://codeclimate.com/github/chroma-x/php-google-datastructures/badges/gpa.svg)](https://codeclimate.com/github/chroma-x/php-google-datastructures)
[![Latest Stable Version](https://poser.pugx.org/chroma-x/google-datastructures/v/stable)](https://packagist.org/packages/chroma-x/google-datastructures)
[![Total Downloads](https://poser.pugx.org/chroma-x/google-datastructures/downloads)](https://packagist.org/packages/chroma-x/google-datastructures)
[![License](https://poser.pugx.org/chroma-x/google-datastructures/license)](https://packagist.org/packages/chroma-x/google-datastructures)

A PHP library to query Google's Places service for querying locations and addresses and getting details by Places ID.

## Installation

```{json}
{
   	"require": {
        "chroma-x/google-datastructures": "*"
    }
}
```

## Usage

### Autoloading and namesapce

```{php}  
require_once('path/to/vendor/autoload.php');
```

---

## GeoLocation data structures

### Reading a Google Places or Google Geocoder result

See [PHP Google Places Suite](https://github.com/chroma-x/php-google-places-suite) or [PHP Google Geocoder](https://github.com/chroma-x/php-google-geocoder) for example libraries using these datastructures.

**Attention:** Plaese note that all getter methods on the `GeoLocationAddress` return a `GeoLocationAddressComponent` instance or `null`. For preventing calls on non-objects the `GeoLocationAddress` class provides methods to check whether the address components exists. 

```{php}
// Retrieving a query result as ChromaX\GooglePlacesSuite\GooglePlacesDetailResult instance
$googlePlacesDetailQuery = new GooglePlacesDetailQuery();
$googlePlacesDetailQuery
	->setApiKey($this->googlePlacesApiKey)
	->query('GOOGLE_PLACES_ID');
$queryResult = $googlePlacesDetailQuery->getResult();

// Retieving address information as ChromaX\GoogleDataStructure\GeoLocation\GeoLocationAddress
if($queryResult->hasAddress()) {

	if ($queryResult->getAddress()->hasStreetName()) {
		// Returns 'Lornsenstraße'
		$addressStreetShort = $queryResult->getAddress()->getStreetName()->getShortName();
		// Returns 'Lornsenstraße'
		$addressStreetLong = $queryResult->getAddress()->getStreetName()->getLongName();
	}

	if ($queryResult->getAddress()->hasStreetNumber()) {
		// Returns '43'
		$addressStreetNumberShort = $queryResult->getAddress()->getStreetNumber()->getShortName();
		// Returns '43'
		$addressStreetNumberLong = $queryResult->getAddress()->getStreetNumber()->getLongName();
	}

	if ($queryResult->getAddress()->hasPostalCode()) {
		// Returns '24105'
		$addressPostalCodeShort = $queryResult->getAddress()->getPostalCode()->getShortName();
		// Returns '24105'
		$addressPostalCodeLong = $queryResult->getAddress()->getPostalCode()->getLongName();
	}

	if ($queryResult->getAddress()->hasCity()) {
		// Returns 'KI'
		$addressCityShort = $queryResult->getAddress()->getCity()->getShortName();
		// Returns 'Kiel'
		$addressCityLong = $queryResult->getAddress()->getCity()->getLongName();
	}

	if ($queryResult->getAddress()->hasArea()) {
		// Returns 'Ravensberg - Brunswik - Düsternbrook'
		$addressAreaShort = $queryResult->getAddress()->getArea()->getShortName();
		// Returns 'Ravensberg - Brunswik - Düsternbrook'
		$addressAreaLong = $queryResult->getAddress()->getArea()->getLongName();
	}

	if ($queryResult->getAddress()->hasProvince()) {
		// Returns 'SH'
		$addressProvinceShort = $queryResult->getAddress()->getProvince()->getShortName();
		// Returns 'Schleswig-Holstein'
		$addressProvinceLong = $queryResult->getAddress()->getProvince()->getLongName();
	}

	if ($queryResult->getAddress()->hasCountry()) {
		// Returns 'DE'
		$addressCountryShort = $queryResult->getAddress()->getCountry()->getShortName();
		// Returns 'Germany'
		$addressCountryLong = $queryResult->getAddress()->getCountry()->getLongName();
	}

}

// Retieving address information as ChromaX\GoogleDataStructure\GeoLocation\GeoLocationGeometry
if ($queryResult->hasGeometry()) {

	if ($queryResult->getGeometry()->hasLocation()) {
		// Returns 54.334123
		$geometryLocationLatitude = $queryResult->getGeometry()->getLocation()->getLatitude();
		// Returns 10.1364007
		$geometryLocationLatitude = $queryResult->getGeometry()->getLocation()->getLongitude();
	}

	if ($queryResult->getGeometry()->hasViewport()) {
		// Returns 54.335471980291
		$geometryLocationLatitude = $queryResult->getGeometry()->getViewport()->getNortheast()->getLatitude();
		// Returns 10.137749680292
		$geometryLocationLatitude = $queryResult->getGeometry()->getViewport()->getNortheast()->getLongitude();
		// Returns 54.332774019708
		$geometryLocationLatitude = $queryResult->getGeometry()->getViewport()->getSouthwest()->getLatitude();
		// Returns 10.135051719708
		$geometryLocationLatitude = $queryResult->getGeometry()->getViewport()->getSouthwest()->getLongitude();
	}

	if ($queryResult->getGeometry()->hasAccessPoints()) {
		for ($i = 0; $i < $queryResult->getGeometry()->countAccessPoints(); $i++) {
			// Returns 54.335471980291
			$geometryAccessPointLatitude = $queryResult->getGeometry()->getAccessPointAt($i)->getLatitude();
			// Returns 10.137749680292
			$geometryAccessPointLatitude = $queryResult->getGeometry()->getAccessPointAt($i)->getLongitude();
		}
	}

}

if ($queryResult->hasGooglePlacesId()) {
	// Retrieving the Google Places information from the query result
	// Returns 'ChIJ_zNzWmpWskcRP8DWT5eX5jQ'
	$googlePlacesId = $queryResult->getGooglePlacesId();
}
```

## Contribution

Contributing to our projects is always very appreciated.  
**But: please follow the contribution guidelines written down in the [CONTRIBUTING.md](https://github.com/chroma-x/php-google-datastructures/blob/master/CONTRIBUTING.md) document.**

## License

PHP Google Places Suite is under the MIT license.
