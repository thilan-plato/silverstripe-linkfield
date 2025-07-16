<?php

namespace gorriecoe\LinkField\Tests;

use gorriecoe\LinkField\LinkField;
use SilverStripe\Dev\SapphireTest;
use SilverStripe\Forms\Form;
use SilverStripe\ORM\DataObject;

class LinkFieldTest extends SapphireTest
{
    protected static $fixture_file = false;

    public function testLinkFieldCreation()
    {
        $mockParent = $this->createMock(DataObject::class);
        $mockParent->method('exists')->willReturn(true);
        $mockParent->method('getRelationType')->willReturn('has_one');
        $mockParent->method('Form')->willReturn(new Form());

        $field = LinkField::create(
            'TestLink',
            'Test Link',
            $mockParent,
            [
                'types' => ['URL', 'Email'],
                'title_display' => true
            ]
        );

        $this->assertInstanceOf(LinkField::class, $field);
        $this->assertEquals('TestLink', $field->getName());
        $this->assertEquals('Test Link', $field->getTitle());
    }

    public function testLinkFieldConfiguration()
    {
        $mockParent = $this->createMock(DataObject::class);
        $mockParent->method('exists')->willReturn(true);
        $mockParent->method('getRelationType')->willReturn('has_one');
        $mockParent->method('Form')->willReturn(new Form());

        $field = LinkField::create('TestLink', 'Test Link', $mockParent);
        
        $config = [
            'types' => ['URL', 'Email'],
            'title_display' => false
        ];
        
        $field->setLinkConfig($config);
        
        $this->assertEquals($config, $field->getLinkConfig());
    }

    public function testSortColumnConfiguration()
    {
        $mockParent = $this->createMock(DataObject::class);
        $mockParent->method('exists')->willReturn(true);
        $mockParent->method('getRelationType')->willReturn('has_one');
        $mockParent->method('Form')->willReturn(new Form());

        $field = LinkField::create('TestLink', 'Test Link', $mockParent);
        
        $field->setSortColumn('SortOrder');
        
        $this->assertEquals('SortOrder', $field->getSortColumn());
    }
} 