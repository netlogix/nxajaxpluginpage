<?php

namespace Netlogix\Nxajaxpluginpage\Service;

use TYPO3\CMS\Core\SingletonInterface;
use TYPO3\CMS\Frontend\Controller\TypoScriptFrontendController;

/**
 * Hook to add request Accept header to TYPO3 cache hash values. This ensures that for different values of the accept
 * header TYPO3 generates different cache entries.
 */
class AcceptContentToHashBaseService implements SingletonInterface
{
	/**
	 * @param array $params
	 * @param TypoScriptFrontendController $typoScriptFrontendController
	 */
	public function createHashBase(array &$params, TypoScriptFrontendController $typoScriptFrontendController)
	{
		$params['hashParameters'][AcceptContentToHashBaseService::class] = isset($_SERVER['HTTP_ACCEPT']) ? $_SERVER['HTTP_ACCEPT'] : '';
	}
}
