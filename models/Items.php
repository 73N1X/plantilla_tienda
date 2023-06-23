<?php
namespace Model;

class Items extends ActiveRecord{
    protected static $table = 'items';
    protected static $columnsdb = ['id', 'itemname', 'itemnumber', 'description', 'img', 'price', 'category'];

    public $id;
    public $itemname;
    public $itemnumber;
    public $description;
    public $img;
    public $price;
    public $category;

    public function __construct($args = []){
        $this->id = $args['id'] ?? null;
        $this->itemname = $args['itemname'] ?? '';
        $this->itemnumber = $args['itemnumber'] ?? '';
        $this->description = $args['description'] ?? '';
        $this->img = $args['img'] ?? '';
        $this->price = ['price'] ?? 0;
        $this->category = $args['category'] ?? '';
    }
}