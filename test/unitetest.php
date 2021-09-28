<?php

use PHPUnit\Framework\TestCase;

require_once("./model/DB.php");
class StackTest extends TestCase
{
    //TODO : drop et insert avant les tests
    public function testUpdate()
    {
        $res  = DB::execute("UPDATE roles set name = :name WHERE slug = :slug", ["slug" => "XXX", "name" => "Correcteur"]);
        $this->assertTrue($res);
    }

    public function testSelectOne()
    {
        $res = DB::selectOne("SELECT * FROM roles where slug = :slug", ["slug" => "MOD"]);

        $slugValue = $res[0]['slug'];

        $this->assertSame($slugValue, 'MOD');
    }
}
