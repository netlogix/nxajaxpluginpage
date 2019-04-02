<?php

namespace Netlogix\Nxajaxpluginpage\Test\Unit\Service;

use Netlogix\Nxajaxpluginpage\Service\AcceptContentToHashBaseService;
use TYPO3\CMS\Frontend\Controller\TypoScriptFrontendController;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;

class AcceptContentToHashBaseServiceTest extends UnitTestCase
{
	/**
	 * @test
	 */
	public function acceptHeaderFromServerVarGetsPassedToHashBase()
	{
		$_SERVER = ['HTTP_ACCEPT' => 'some/test'];
		$hashBase = ['hashParameters' => ''];

		$service = new AcceptContentToHashBaseService();

		$this->assertNotContains('some/test', $hashBase['hashParameters']);

		$service->createHashBase(
			$hashBase,
			$this->createMock(TypoScriptFrontendController::class)
		);

		$this->assertEquals(['hashParameters' => [AcceptContentToHashBaseService::class => 'some/test']], $hashBase);
	}

	/**
	 * @test
	 */
	public function acceptHeaderFromServerVarCreatesEmptyHashBaseProperty()
	{
		$_SERVER = [];
		$hashBase = ['hashParameters' => ''];

		$service = new AcceptContentToHashBaseService();

		$service->createHashBase(
			$hashBase,
			$this->createMock(TypoScriptFrontendController::class)
		);

		$this->assertEquals(['hashParameters' => [AcceptContentToHashBaseService::class => '']], $hashBase);
	}
}
