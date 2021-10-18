<?php
namespace api\models\response;


class NewsResponse
{
    public
        $id,
        $title,
        $status,
        $description,
        $title_ge,
        $description_ge,
        $metakeyword,
        $metakeyword_ge;



    public function __construct($row) {
        $this->id = $row['id'];
        $this->title = $row['tile'];
        $this->category_id = $row['category_id'];
        $this->status = $row['staus'];
        $this->description = $row['description'];
        $this->description_ge = $row['description_ge'];
        $this->metakeyword = $row["metakeyword"];
        $this->metakeyword_ge = $row["metakeyword_ge"];
    }


}