# PHP Google Data Structures

[![Code Climate](https://codeclimate.com/github/markenwerk/php-google-datastructures/badges/gpa.svg)](https://codeclimate.com/github/markenwerk/php-google-datastructures)
[![Latest Stable Version](https://poser.pugx.org/markenwerk/google-datastructures/v/stable)](https://packagist.org/packages/markenwerk/google-datastructures)
[![Total Downloads](https://poser.pugx.org/markenwerk/google-datastructures/downloads)](https://packagist.org/packages/markenwerk/google-datastructures)
[![License](https://poser.pugx.org/markenwerk/google-datastructures/license)](https://packagist.org/packages/markenwerk/google-datastructures)

A PHP library to query Google's Places service for querying locations and addresses and getting details by Places ID.

## Installation

```{json}
{
   	"require": {
        "markenwerk/google-datastructures": "*"
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

See [PHP Google Places Suite](https://github.com/markenwerk/php-google-places-suite) or [PHP Google Geocoder](https://github.com/markenwerk/php-google-geocoder) for example libraries using these datastructures.

**Attention:** Plaese note that all getter methods on the `GeoLocationAddress` return a `GeoLocationAddressComponent` instance or `null`. For preventing calls on non-objects the `GeoLocationAddress` class provides methods to check whether the address components exists. 

```{php}
// Retrieving a query result as Markenwerk\GooglePlacesSuite\GooglePlacesDetailResult instance
$googlePlacesDetailQuery = new GooglePlacesDetailQuery();
$googlePlacesDetailQuery
	->setApiKey($this->googlePlacesApiKey)
	->query('GOOGLE_PLACES_ID');
$queryResult = $googlePlacesDetailQuery->getResult();

// Retieving address information as Markenwerk\GoogleDataStructure\GeoLocation\GeoLocationAddress
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

// Retieving address information as Markenwerk\GoogleDataStructure\GeoLocation\GeoLocationGeometry
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
**But: please follow the contribution guidelines written down in the [CONTRIBUTING.md](https://github.com/markenwerk/php-google-datastructures/blob/master/CONTRIBUTING.md) document.**

## License

PHP Google Places Suite is under the MIT license.
