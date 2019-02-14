<?php

namespace Netlogix\Nxajaxpluginpage\TypoScript;

use TYPO3\CMS\Core\Configuration\TypoScript\ConditionMatching\AbstractCondition;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * TypoScript condition matcher to check if a given accept header is set on the current request
 */
class AcceptCondition extends AbstractCondition
{
	/**
	 * @param array $conditionParameters
	 * @return bool
	 */
	public function matchCondition(array $conditionParameters)
	{
		$requestedHeaders = array_map(function ($header) {
			$header = GeneralUtility::trimExplode(';', $header);
			return current($header);
		}, GeneralUtility::trimExplode(',', $_SERVER['HTTP_ACCEPT']));

		$allowedHeaders = preg_split('%[^a-z0-9/]%i', join(',', $conditionParameters));

		return count(array_intersect($requestedHeaders, $allowedHeaders));
	}
}
