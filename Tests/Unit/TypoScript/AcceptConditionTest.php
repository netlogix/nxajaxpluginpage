<?php

namespace Netlogix\Nxajaxpluginpage\Test\Unit\TypoScript;

use Netlogix\Nxajaxpluginpage\TypoScript\AcceptCondition;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;

class AcceptConditionTest extends UnitTestCase
{
	/**
	 * @test
	 */
	public function recognizeLonelyAcceptHeader()
	{
		$_SERVER = ['HTTP_ACCEPT' => 'some/test'];

		GeneralUtility::flushInternalRuntimeCaches();
		$condition = new AcceptCondition();
		$this->assertTrue($condition->matchCondition(['some/test']));
	}

	/**
	 * @test
	 */
	public function recognizeFirstAcceptHeader()
	{
		$_SERVER = ['HTTP_ACCEPT' => 'some/test, some/other.test'];

		$condition = new AcceptCondition();
		$this->assertTrue($condition->matchCondition(['some/test']));
	}

	/**
	 * @test
	 */
	public function recognizeLastAcceptHeader()
	{
		$_SERVER = ['HTTP_ACCEPT' => 'some/test, some/other.test'];

		$condition = new AcceptCondition();
		$this->assertTrue($condition->matchCondition(['some/other.test']));
	}

	/**
	 * @test
	 */
	public function recognizeMiddleAcceptHeader()
	{
		$_SERVER = ['HTTP_ACCEPT' => 'some/test, some/other.test, and-some/other.test'];

		$condition = new AcceptCondition();
		$this->assertTrue($condition->matchCondition(['some/other.test']));
	}

	/**
	 * @test
	 */
	public function recognizeAcceptHeaderWithQualityValue()
	{
		$_SERVER = ['HTTP_ACCEPT' => 'some/test;q=0.5'];

		$condition = new AcceptCondition();
		$this->assertTrue($condition->matchCondition(['some/test']));
	}

	/**
	 * @test
	 */
	public function recognizeApplicationJson()
	{
		$_SERVER = ['HTTP_ACCEPT' => 'application/json'];

		$condition = new AcceptCondition();
		$this->assertTrue($condition->matchCondition(['application/json']));
	}

	/**
	 * @test
	 */
	public function recognizeApplicationJsonApiOrg()
	{
		$_SERVER = ['HTTP_ACCEPT' => 'application/vnd.api+json'];

		$condition = new AcceptCondition();
		$this->assertTrue($condition->matchCondition(['application/vnd.api+json']));
	}
}
