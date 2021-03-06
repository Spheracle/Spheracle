<?php

use Spheracle\Domain\Value;
use Spheracle\Exceptions\IllegalArgumentException;

require_once(__DIR__ . "/AgeSpecification.php");

class Age extends Value
{
	private $value;

	public function __construct(int $v)
	{
		$ageSpec = new AgeSpecification();

		if ($ageSpec->isSatisfiedBy($v))
		{
			$this->value = $v;
		}
		else
		{
			throw new IllegalArgumentException("Age Invalid");
		}
	}

	public function value()
	{
		return $this->value;
	}

	public function equals($target): bool
	{
		$status = false;
		if ($target instanceof self)
		{
			$status = $this->value == $target->value(); 
		}
		else
		{
			$status = $this->value == $target;
		}

		return $status;
	}
}

?>