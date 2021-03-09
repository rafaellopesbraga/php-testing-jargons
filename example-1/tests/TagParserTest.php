<?php

namespace Tests;

use App\TagParser;
use PHPUnit\Framework\TestCase;

class TagParserTest extends TestCase
{
    /** @test */
    public function it_parses_single_tag()
    {
        $parser = new TagParser;

        $result = $parser->parse('golang');
        $expected = ['golang'];

        $this->assertSame($expected, $result);
    }

    /** @test */
    public function it_parses_a_comma_separated_list_of_tags()
    {
        $parser = new TagParser;

        $result = $parser->parse('golang, javascript, php');
        $expected = ['golang', 'javascript', 'php'];

        $this->assertSame($expected, $result);
    }

    /** @test */
    public function it_parses_a_pipe_separated_list_of_tags()
    {
        $parser = new TagParser;

        $result = $parser->parse('golang | javascript | php');
        $expected = ['golang', 'javascript', 'php'];

        $this->assertSame($expected,$result);
    }

    /** @test */
    public function spaces_are_optional()
    {
        $parser = new TagParser;

        $result = $parser->parse('golang,javascript,php');
        $expected = ['golang', 'javascript', 'php'];
        $this->assertSame($expected, $result);

        $result = $parser->parse('golang|javascript|php');
        $expected = ['golang', 'javascript', 'php'];
        $this->assertSame($expected, $result);
    }
}
