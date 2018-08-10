<?php

require __DIR__ . '/../../JsonHelper.php';

class JsonHelperTest extends MediaWikiTestCase
{
	protected function setUp()
	{
		parent::setUp();
	}

	public function testExtractValue()
	{
		$json_array = array(
			"user" => array(
				"username" => "username",
				"email" => "localhost@email.com"
			)
		);
		self::assertEquals("localhost@email.com", JsonHelper::extractValue($json_array, "user.email"));
		self::assertEquals("username", JsonHelper::extractValue($json_array, "user.username"));
		self::assertEquals("username", JsonHelper::extractValue($json_array, "user")["username"]);
		self::assertNull(JsonHelper::extractValue($json_array, "user.emails"));
		self::assertNull(JsonHelper::extractValue($json_array, "$.user.email"));
	}

	protected function tearDown()
	{
		parent::tearDown();
	}
}
