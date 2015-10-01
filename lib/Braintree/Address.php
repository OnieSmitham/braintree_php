<?php
namespace Braintree;

/**
 * Braintree Address module
 * PHP Version 5
 * Creates and manages Braintree Addresses
 *
 * An Address belongs to a Customer. It can be associated to a
 * CreditCard as the billing address. It can also be used
 * as the shipping address when creating a Transaction.
 *
 * @package   Braintree
 * @copyright 2014 Braintree, a division of PayPal, Inc.
 *
 * @property-read string $company
 * @property-read string $countryName
 * @property-read string $createdAt
 * @property-read string $customerId
 * @property-read string $extendedAddress
 * @property-read string $firstName
 * @property-read string $id
 * @property-read string $lastName
 * @property-read string $locality
 * @property-read string $postalCode
 * @property-read string $region
 * @property-read string $streetAddress
 * @property-read string $updatedAt
 */
class Address extends Braintree
{
    /**
     * returns false if comparing object is not a Address,
     * or is a Address with a different id
     *
     * @param object $other address to compare against
     * @return boolean
     */
    public function isEqual($other)
    {
        return !($other instanceof self) ?
            false :
            ($this->id === $other->id && $this->customerId === $other->customerId);
    }

    /**
     * create a printable representation of the object as:
     * ClassName[property=value, property=value]
     *
     * @ignore
     *
     * @return var
     */
    public function  __toString()
    {
        return __CLASS__ . '[' .
                Util::attributesToString($this->_attributes).']';
    }

    /**
     * sets instance properties from an array of values
     *
     * @ignore
     * @access protected
     * @param array $addressAttribs array of address data
     * @return none
     */
    protected function _initialize($addressAttribs)
    {
        // set the attributes
        $this->_attributes = $addressAttribs;
    }

    /**
     *  factory method: returns an instance of Address
     *  to the requesting method, with populated properties
     * @ignore
     * @return object instance of Address
     */
    public static function factory($attributes)
    {
        $instance = new self();
        $instance->_initialize($attributes);
        return $instance;

    }


    // static methods redirecting to gateway

    /**
     *
     * @param array $attribs
     * @return Braintree\Address
     */
    public static function create($attribs)
    {
        return Configuration::gateway()->address()->create($attribs);
    }

    /**
     *
     * @param array $attribs
     * @return Braintree\Address
     */
    public static function createNoValidate($attribs)
    {
        return Configuration::gateway()->address()->createNoValidate($attribs);
    }

    /**
     *
     * @param Braintree\Customer|int $customerOrId
     * @param int $addressId
     * @throws InvalidArgumentException
     * @return Braintree\Result_Successful
     */
    public static function delete($customerOrId = null, $addressId = null)
    {
        return Configuration::gateway()->address()->delete($customerOrId, $addressId);
    }

    /**
     *
     * @param Braintree\Customer|int $customerOrId
     * @param int $addressId
     * @throws Braintree\Exception\NotFound
     * @return Braintree\Address
     */
    public static function find($customerOrId, $addressId)
    {
        return Configuration::gateway()->address()->find($customerOrId, $addressId);
    }

    /**
     *
     * @param Braintree\Customer|int $customerOrId
     * @param int $addressId
     * @param array $attributes
     * @throws Braintree\Exception\Unexpected
     * @return Braintree\Result_Successful|Braintree\Result_Error
     */
    public static function update($customerOrId, $addressId, $attributes)
    {
        return Configuration::gateway()->address()->update($customerOrId, $addressId, $attributes);
    }

    public static function updateNoValidate($customerOrId, $addressId, $attributes)
    {
        return Configuration::gateway()->address()->updateNoValidate($customerOrId, $addressId, $attributes);
    }
}
