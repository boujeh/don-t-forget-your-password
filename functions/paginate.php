<?php
// How many adjacent pages should be shown on each side?
$adjacents = 3;

// total number of rows in data table.
$count_query = "SELECT COUNT(*) FROM $tb_name";
$count_result = $db->query($count_query);
$total_items = $count_result->fetch_row();

// Setup vars for query.
$targetpage = "list.php";   // destination file
$limit = 10;                // items per page
if(isset($_GET['page'])) {
  $page = $_GET['page'];
  $start = ($page - 1) * $limit;      //first item to display on this page
} else {
  $page = 0;
  $start = 0;               //if no page var is given, set start to 0
}

/* Setup page vars for display. */
if ($page == 0) $page = 1;          //if no page var is given, default to 1.
$prev = $page - 1;              //previous page is page - 1
$next = $page + 1;              //next page is page + 1
$lastpage = ceil($total_items[0]/$limit);    //lastpage is = total pages / items per page, rounded up.
$lpm1 = $lastpage - 1;            //last page minus 1

// Now we apply our rules and draw the pagination object. 
$pagination = "";
if($lastpage > 1)
{ 
  $pagination .= "<div class=\"text-center\"><ul class=\"pagination\">";
  //previous button
  if ($page > 1) 
    $pagination.= "<li><a href=\"$targetpage?page=$prev\">&laquo;</a></li>";
  else
    $pagination.= "<li class=\"disabled\"><a href=\"#\">&laquo;</a></li>"; 

  //pages 
  if ($lastpage < 7 + ($adjacents * 2)) //not enough pages to bother breaking it up
  { 
    for ($counter = 1; $counter <= $lastpage; $counter++)
    {
      if ($counter == $page)
        $pagination.= "<li class=\"active\"><a href=\"#\">$counter</a></li>";
      else
        $pagination.= "<li><a href=\"$targetpage?page=$counter\">$counter</a></li>";         
    }
  }
  elseif($lastpage > 5 + ($adjacents * 2))  //enough pages to hide some
  {
    //close to beginning; only hide later pages
    if($page < 1 + ($adjacents * 2))    
    {
      for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
      {
        if ($counter == $page)
          $pagination.= "<li class=\"active\"><a href=\"#\">$counter</a></li>";
        else
          $pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";         
      }
      $pagination.= "<a href=\"#\">...</a>";
      $pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
      $pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";   
    }
    //in middle; hide some front and some back
    elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
    {
      $pagination.= "<a href=\"$targetpage?page=1\">1</a>";
      $pagination.= "<a href=\"$targetpage?page=2\">2</a>";
      $pagination.= "<a href=\"#\">...</a>";
      for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
      {
        if ($counter == $page)
          $pagination.= "<li class=\"active\"><a href=\"#\">$counter</a></li>";
        else
          $pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";         
      }
      $pagination.= "<a href=\"#\">...</a>";
      $pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
      $pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";   
    }
    //close to end; only hide early pages
    else
    {
      $pagination.= "<a href=\"$targetpage?page=1\">1</a>";
      $pagination.= "<a href=\"$targetpage?page=2\">2</a>";
      $pagination.= "<a href=\"#\">...</a>";
      for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
      {
        if ($counter == $page)
          $pagination.= "<li class=\"active\"><a href=\"#\">$counter</a></li>";
        else
          $pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";         
      }
    }
  }

  //next button
  if ($page < $counter - 1) 
    $pagination.= "<li><a href=\"$targetpage?page=$next\">&raquo;</a></li>";
  else
    $pagination.= "<li class=\"disabled\"><a href=\"#\">&raquo;</a></li>";
  $pagination.= "</ul></div>\n";   
}
?>
